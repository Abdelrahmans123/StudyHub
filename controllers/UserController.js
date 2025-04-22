const asyncWrapper = require("../middleware/Async Wrapper/asyncWrapper");
const User = require("../models/User");

const AppError = require("../utils/AppError");
const HTTPStatusText = require("../utils/HTTPStatusText");
const { validationResult } = require("express-validator");
const index = asyncWrapper(async (req, res, next) => {
	const query = req.query;
	const limit = query.limit || 10;
	const page = query.page || 1;
	const skip = (page - 1) * limit;
	const users = await User.find(
		{},
		{ __v: false, password: false, token: false }
	)
		.limit(limit)
		.skip(skip);
	res.json({
		status: HTTPStatusText.SUCCESS,
		data: { users },
	});
});
const show = asyncWrapper(async (req, res, next) => {
	const user = await User.findById(req.params.id, {
		__v: false,
		password: false,
		token: false,
	});
	if (!user) {
		const error = AppError.create("User not found", 404);
		return next(error); // Pass the error to the next middleware
	}
	res.json({
		status: HTTPStatusText.SUCCESS,
		data: { user },
	});
});
const update = asyncWrapper(async (req, res, next) => {
	const result = validationResult(req);
	if (!result.isEmpty()) {
		const error = AppError.create(result.array(), 400);
		return next(error);
	}
	const user = await User.findByIdAndUpdate(
		req.params.id,
		{
			name: req.body.name,
			email: req.body.email,
			password: req.body.password,
		},
		{ new: true, runValidators: true }
	);
	if (!user) {
		const error = AppError.create("User not found", 404);
		return next(error);
	}
	res.json({
		status: HTTPStatusText.SUCCESS,
		data: { user },
	});
});
const destroy = asyncWrapper(async (req, res, next) => {
	const user = await User.findByIdAndDelete(req.params.id);
	if (!user) {
		const error = AppError.create("User not found", 404);
		return next(error);
	}
	res.status(200).json({
		status: HTTPStatusText.SUCCESS,
		data: null,
	});
});

module.exports = { index, show, update, destroy };
