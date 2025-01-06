require("dotenv").config();
const cors = require("cors");
const express = require("express");
const mongoose = require("mongoose");
const path = require("path");
const coursesRouter = require("./routes/courses");
const usersRouter = require("./routes/users");
const HTTPStatusText = require("./utils/HTTPStatusText");
const app = express();
const url = process.env.MONGO_URI;
// Serve static files from the "uploads" directory
app.use("/uploads", express.static(path.join(__dirname, "uploads")));
// Enable CORS for all routes
app.use(cors());
// Connect to MongoDB
mongoose.connect(url).then(() => console.log("Connected to MongoDB"));

// Enable JSON parsing for incoming requests
app.use(express.json());

// Route handling
app.use("/api/courses", coursesRouter);
app.use("/api/users", usersRouter);

// Middleware function to handle all requests that do not match any defined routes.

app.all("*", (req, res, next) => {
	res.status(404).json({
		status: HTTPStatusText.ERROR,
		message: "Resource not found",
		Code: 404,
		data: null,
	});
});

//This function catches and handles errors that occur during the request processing pipeline.
app.use((error, req, res, next) => {
	res.status(error.statusCode || 500).json({
		status: error.status || HTTPStatusText.FAILURE,
		message: error.message || err,
		code: error.statusCode,
		data: null,
	});
});

// Start the server
app.listen(process.env.PORT || 5000, () =>
	console.log("Server listening on port", process.env.PORT)
);
