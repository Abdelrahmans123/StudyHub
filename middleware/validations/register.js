const { body } = require("express-validator");

const validationSchema = () => {
	return [
		body("name")
			.notEmpty()
			.withMessage("Name is Required")
			.isLength({ min: 2 })
			.withMessage("Name must be at least 3 characters"),
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
