const mongoose = require("mongoose");
const courseSchema = new mongoose.Schema({
	name: {
		type: String,
		required: true,
	},
	price: {
		type: Number,
		required: true,
	},
	level: {
		type: String,
		required: true,
	}
});
module.exports = mongoose.model("Course", courseSchema);
