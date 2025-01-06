const Blacklist = require("../../models/Blacklist");
const AppError = require("../../utils/AppError");
const jwt = require("jsonwebtoken");
const VerifyToken = async (req, res, next) => {
	const authHeader = req.headers.authorization || req.headers.Authorization;
	if (!authHeader?.startsWith("Bearer ")) {
		const error = AppError.create("Unauthorized", 401);
		return next(error);
	}

	const token = authHeader.split(" ")[1];
	const isBlacklisted = await Blacklist.findOne({ token });
	if (isBlacklisted) {
		const error = AppError.create("Unauthorized", 401);
		return next(error);
	}
	jwt.verify(token, process.env.JWT_SECRET_KEY, (err, decoded) => {
		if (err) {
			const error = AppError.create("Unauthorized", 401);
			return next(error);
		}
		req.user = decoded;
		next();
	});
};
module.exports = VerifyToken;
