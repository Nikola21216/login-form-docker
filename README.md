# Dockerized PHP Login Form with MySQL

This project demonstrates a simple PHP login form containerized with Docker Compose.

## Project Structure

- `public/` - Contains PHP files (login.php, admin.php)
- `docker/mysql/` - Contains database initialization script
- `Dockerfile` - PHP/Apache container configuration
- `docker-compose.yml` - Defines the multi-container setup

## Components

1. **Web Service**:
   - PHP 8.2 with Apache
   - PDO MySQL extension installed
   - Serves the login form and admin page
   - Available on port 8080

2. **Database Service**:
   - MySQL 8.0
   - Pre-configured with a `login_form` database
   - Initialized with a sample user (username: `cat`, password: `1234`)

## How to Run

1. Clone the repository:
   ```bash
   git clone [repository-url]
   cd login-form-docker