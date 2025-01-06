const { validationResult } = require("express-validator");
const bcrypt = require("bcryptjs");
const asyncWrapper = require("../middleware/Async Wrapper/asyncWrapper");
const User = require("../models/User");
const HTTPStatusText = require("../utils/HTTPStatusText");
const AppError = require("../utils/AppError");
const GenerateJWT = require("../utils/GenerateJWT");
const Blacklist = require("../models/Blacklist");

const login = asyncWrapper(async (req, res, next) => {
	const { email, password } = req.body;
	const result = validationResult(req);
	if (!result.isEmpty()) {
		const error = AppError.create(result.array(), 400);
		return next(error);
	}
	const user = await User.findOne({ email });
	if (!user) {
		const error = AppError.create("User with this email does not exist", 400);
		return next(error);
	}
	const isMatch = await bcrypt.compare(password, user.password);
	if (!isMatch) {
		const error = AppError.create("Invalid credentials", 400);
		return next(error);
	}
	const token = await GenerateJWT({
		id: user._id,
		email: user.email,
		role: user.role,
		name: user.name,
	});

	res.status(200).json({
		status: HTTPStatusText.SUCCESS,
		data: { token },
	});
});
const register = asyncWrapper(async (req, res, next) => {
	const { name, email, password, role } = req.body;
	const avatar = req.file.path;
	console.log("🚀 ~ register ~ avatar:", avatar);

	const result = validationResult(req);
	if (!result.isEmpty()) {
		const error = AppError.create(result.array(), 400);
		return next(error);
	}
	const oldUser = await User.findOne({ email });
	if (oldUser) {
		const error = AppError.create("User with this email already exist", 400);
		return next(error);
	}
	const salt = await bcrypt.genSalt(10);
	const hashedPassword = await bcrypt.hash(password, salt);
	const user = await User.create({
		name,
		email,
		password: hashedPassword,
		role,
		avatar,
	});
	console.log("🚀 ~ register ~ user:", user);

	const token = await GenerateJWT({
		id: user._id,
		email: user.email,
		role: user.role,
		name: user.name,
	});
	const newUser = await User.findByIdAndUpdate(
		user._id,
		{
			$set: {
				token,
			},
		},
		{ new: true }
	);
	res.status(201).json({
		status: HTTPStatusText.SUCCESS,
		data: { newUser },
	});
});
const logout = asyncWrapper(async (req, res, next) => {
	const token = req.headers.authorization.split(" ")[1];
	const blacklist = await Blacklist.create({ token });
	res.status(200).json({
		status: HTTPStatusText.SUCCESS,
		data: { blacklist },
	});
});
module.exports = { login, register, logout };
