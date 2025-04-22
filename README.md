# Course Management RESTful API
## Overview
This project is a RESTful API built with Node.js, Express.js, and MongoDB for managing course and user data. It is designed for scalability and seamless integration with frontend applications, using secure JWT-based authentication and modular routing.
## Features
- **User & Course Management:** Create, read, update, and delete operations for users and courses.
- **RESTful Architecture:** Clean and consistent endpoints for easy frontend consumption.
- **JWT Authentication:** Secure user authentication using JSON Web Tokens.
- **Modular Routing:** Organized code structure for scalability and maintenance.
- **Optimized Queries:** Efficient MongoDB queries to improve performance.
- **Seamless Frontend Integration:** Built with data flow and usability in mind for frontend developers.
# Technologies Used
- **Backend:** Node.js, Express.js
- **Database:** MongoDB (with Mongoose ODM)
- **Authentication:** JWT (JSON Web Tokens)
- **API Format:** REST
# Installation
1. Clone the repository
```bash
git clone https://github.com/Abdelrahmans123/StudyHub.git
```
2. Install dependencies
```bash
npm install
```
3. Create a .env file in the root and add your configuration
```bash
PORT=5000
MONGO_URI=<your-mongodb-uri>
JWT_SECRET=<your-jwt-secret>
```
4. Run the server
```bash
npm run start
```
5. Access API at
```bash
http://localhost:5000/api
```
# API Endpoints
# Auth
- `POST /api/auth/register` – Register a new user
- `POST /api/auth/login` – Login and receive a JWT
# Users
- `GET /api/users/` – Get all users (admin only)
- `GET /api/users/:id` – Get user by ID
- `PUT /api/users/:id` – Update a user (protected)
- `DELETE /api/users/:id` – Delete a user (admin only)
# Courses
- `GET /api/courses` – List all courses (protected)
- `POST /api/courses` – Create a new course (protected)
- `GET /api/courses/:id` – Get course details (protected)
- `PUT /api/courses/:id` – Update a course (protected)
- `DELETE /api/courses/:id` – Delete a course (protected)
# Contributing
Contributions are welcome! Please fork the repository and submit a pull request with your changes.
# License
This project is licensed under the MIT License.
# Support
For support or inquiries, please contact [sabdelrahman110@gmail.com](mailto:sabdelrahman110@gmail.com).

