const mongoose = require("mongoose");
const validator = require("validator");
const UserRoles = require("../utils/UserRoles");
const Schema = mongoose.Schema;
const UserSchema = new Schema({
	name: {
		type: String,
		required: true,
	},
	email: {
		type: String,
		unique: true,
		validate: [validator.isEmail, "Please provide a valid email"],
		required: true,
	},
	password: {
		type: String,
		required: true,
		minlength: 8,
	},
	avatar: {
		type: String,
		default: "uploads/avatar.png",
	},
	date: {
		type: Date,
		default: Date.now,
	},
	token: {
		type: String,
	},
	role: {
		type: String,
		enum: [UserRoles.ADMIN, UserRoles.USER],
		default: UserRoles.USER,
	},
});
module.exports = User = mongoose.model("User", UserSchema);
