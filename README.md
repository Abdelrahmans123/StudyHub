# StudyHub - Graduation Project

Welcome to StudyHub, a comprehensive platform built with Laravel. This project features Student and Instructor functionality, including course management and comprehensive feedback mechanisms.

## Features

- **Student Dashboard:** Access enrolled courses, submit assignments, and review feedback.
- **Instructor Dashboard:** Manage courses, review student submissions, and provide evaluations.
- **Interactive Environment:** A platform enabling a seamless learning experience between students and instructors.

## Getting Started

### Prerequisites

Ensure you have the following installed on your local development machine:
- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL or PostgreSQL

### Installation

1. **Clone the repository (if applicable):**
   ```bash
   git clone <repository-url>
   cd GraduationProject
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install frontend dependencies:**
   ```bash
   npm install
   npm run build
   ```

4. **Environment Setup:**
   Create a copy of your `.env` file and generate an application key.
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database Setup:**
   Configure your database credentials in the `.env` file, then run the migrations.
   ```bash
   php artisan migrate
   ```

6. **Serve the Application:**
   ```bash
   php artisan serve
   ```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
