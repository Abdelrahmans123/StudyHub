const Course = require("../models/Course");
const { validationResult } = require("express-validator");
const HTTPStatusText = require("../utils/HTTPStatusText");
const asyncWrapper = require("../middleware/Async Wrapper/asyncWrapper");
const AppError = require("../utils/AppError");
const index = asyncWrapper(async (req, res, next) => {
	const query = req.query;
	const limit = query.limit || 10;
	const page = query.page || 1;
	const skip = (page - 1) * limit;
	const courses = await Course.find({}, { __v: false }).limit(limit).skip(skip);
	res.json({
		status: HTTPStatusText.SUCCESS,
		data: { courses },
	});
});

const show = asyncWrapper(async (req, res, next) => {
	const course = await Course.findById(req.params.id, { __v: false });
	if (!course) {
		const error = AppError.create("Course not found", 404);
		return next(error); // Pass the error to the next middleware
	}
	res.json({
		status: HTTPStatusText.SUCCESS,
		data: { course },
	});
});

const store = asyncWrapper(async (req, res, next) => {
	const result = validationResult(req);
	if (!result.isEmpty()) {
		const error = AppError.create(result.array(), 400);
		return next(error);
	}
	const newCourse = new Course({
		name: req.body.name,
		price: req.body.price,
		level: req.body.level,
	});
	const course = await newCourse.save();

	res.status(201).json({
		status: HTTPStatusText.SUCCESS,
		data: { course },
	});
});

const update = asyncWrapper(async (req, res, next) => {
	const result = validationResult(req);
	if (!result.isEmpty()) {
		const error = AppError.create(result.array(), 400);
		return next(error);
	}
	const updatedCourse = await Course.findByIdAndUpdate(
		req.params.id,
		{
			$set: { ...req.body },
		},
		{ new: true }
	);
	return res.status(200).json({
		status: HTTPStatusText.SUCCESS,
		data: { updatedCourse },
	});
});

const destroy = asyncWrapper(async (req, res, next) => {
	const course = await Course.findByIdAndDelete(req.params.id);
	if (!course) {
		const error = AppError.create("Course not found", 404);
		return next(error);
	}
	res.status(200).send({ status: HTTPStatusText.SUCCESS, data: null });
});
module.exports = {
	index,
	show,
	store,
	update,
	destroy,
};
