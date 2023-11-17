## Collabmed Todo-List Application

Collabmed Todo-List is a full-fledged task management application, leveraging Laravel for the backend API resource with repositories, and Vue 3 Composition API for the frontend. The styling is done using Tailwind CSS, providing a clean and responsive user interface.

## Table of Contents

```
Requirements
Installation
Backend
Frontend
Configuration
Usage
License
```

## Requirements

Before getting started, ensure that your development environment meets the following requirements:

`PHP version 8.0 or above`
`Node.js version 12.0 or above`

## Installation

### Backend

1. Clone the project:
   `git clone https://github.com/Nanguti/collabmed.git`

2. Navigate to the project directory:
   `cd collabmed`

3. Install backend dependencies:
   `composer install`

4. Create a database:
   Set up a database for the project.
5. Configure environment variables:
   Copy .env.example to .env and adjust the parameters according to your setup.

6. Generate application key:
   `php artisan key:generate`

7. Run the migrations and seed the database:

`php artisan migrate`

7. Run the application:

`php artisan serve`

The project will be available at http://localhost:8000.

## Frontend

1. Navigate to the frontend folder:
   `cd frontend`
2. Install frontend dependencies:
   ``npm install`

3. Adjust environment variables:
   Modify the .env file to specify your API URL.

4. Start the frontend:
   `npm run dev`

## Configuration

Ensure that all configuration files, such as .env and others, are appropriately set up to match your development environment and preferences.

## Usage

The Collabmed Todo-List Application provides a user-friendly interface for managing your tasks efficiently. Explore the features and functionalities to streamline your workflow.

## License

The project is open-sourced software licensed under the MIT license. Feel free to contribute and share!
