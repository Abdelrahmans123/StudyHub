const express = require("express");
const validationSchema = require("../middleware/validations/courses");
const {
	index,
	show,
	store,
	update,
	destroy,
} = require("../controllers/CourseController");
const VerifyToken = require("../middleware/Verify Token/VerifyToken");
const AllowedTo = require("../middleware/Roles/AllowedTo");
const UserRoles = require("../utils/UserRoles");
const router = express.Router();
router
	.route("/")
	.get(VerifyToken, AllowedTo(UserRoles.USER, UserRoles.ADMIN), index)
	.post(VerifyToken, AllowedTo(UserRoles.ADMIN), validationSchema(), store);
router
	.route("/:id")
	.get(VerifyToken, AllowedTo(UserRoles.USER, UserRoles.ADMIN), show)
	.put(VerifyToken, AllowedTo(UserRoles.ADMIN), validationSchema(), update)
	.delete(VerifyToken, AllowedTo(UserRoles.ADMIN), destroy);

module.exports = router;
