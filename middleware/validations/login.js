const { body } = require("express-validator");

const validationSchema = () => {
	return [
		body("email")
			.notEmpty()
			.withMessage("Email is Required")
			.isEmail()
			.withMessage("Email is not valid"),
		body("password")
			.notEmpty()
			.withMessage("Password is Required")
			.isLength({ min: 8 }),
	];
};
module.exports = validationSchema;
