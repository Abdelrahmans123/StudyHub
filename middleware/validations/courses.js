const { body } = require("express-validator");

const validationSchema = () => {
	return [
		body("name")
			.notEmpty()
			.withMessage("Title is Required")
			.isLength({ min: 2 })
			.withMessage("Title must be at least 3 characters"),
		body("price")
			.notEmpty()
			.withMessage("Price is Required")
			.isInt({ min: 1000, max: 100000 })
			.withMessage("Price must be between 1000 and 100000"),
	];
};
module.exports = validationSchema;