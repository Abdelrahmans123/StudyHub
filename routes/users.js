const express = require("express");
const AppError = require("../utils/AppError");
const multer = require("multer");
const diskStorage = multer.diskStorage({
	destination: (req, file, cb) => {
		cb(null, "uploads");
	},
	filename: (req, file, cb) => {
		const fileExtension = file.mimetype.split("/")[1];
		const fileName = `user-${Date.now()}.${fileExtension}`;
		cb(null, fileName);
	},
});
const fileFilter = (req, file, cb) => {
	if (file.mimetype.split("/")[0] === "image") {
		cb(null, true);
	} else {
		cb(AppError.create("Invalid file type", 400), false);
	}
};
const upload = multer({ storage: diskStorage, fileFilter });
const validationSchema = require("../middleware/validations/register");
const loginValidationSchema = require("../middleware/validations/login");
const router = express.Router();
const { register, login, logout } = require("../controllers/AuthController");
const {
	index,
	show,
	update,
	destroy,
} = require("../controllers/UserController");
const VerifyToken = require("../middleware/Verify Token/VerifyToken");
router.route("/").get(VerifyToken, AllowedTo(UserRoles.ADMIN), index);
router
	.route("/:id")
	.get(VerifyToken, show)
	.put(VerifyToken, validationSchema(), update)
	.delete(VerifyToken, AllowedTo(UserRoles.ADMIN), destroy);
router.post("/register", upload.single("avatar"), validationSchema(), register);
router.post("/login", loginValidationSchema(), login);
router.post("/logout", VerifyToken, logout);
module.exports = router;
