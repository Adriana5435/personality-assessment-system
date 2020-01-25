# Personality Assessment System

Welcome to the Personality Assessment System project! This repository contains a web application designed to facilitate personality assessments based on questionnaires. The application allows users to submit their answers, receive a personality type assessment, and generate various types of reports, including the popular Myers-Briggs Type Indicator (MBTI) assessment.

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- - [MBTI Integration](#mbti-integration)
- - [Authentication and Security](#authentication-and-security)
- - [Database Structure](#database-structure)
- - [Middleware](#middleware)
- - [Webpack and Laravel Mix](#webpack-and-laravel-mix)
- - [Unit Testing](#unit-testing)
- [Getting Started](#getting-started)
- - [Installation](#installation)
- - [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

## Introduction

The Personality Assessment System is a web application built to streamline personality assessments and report generation based on user responses to questionnaires. The application is developed using the Laravel framework, showcasing my expertise in Laravel development and industry best practices.

## Features

### MBTI Integration

The core of this project is the integration of the Myers-Briggs Type Indicator (MBTI) assessment. Users can complete questionnaires and receive an MBTI personality type assessment, which provides insights into their preferences across four dichotomies: Extraversion/Introversion, Sensing/Intuition, Thinking/Feeling, and Judging/Perceiving.

### Authentication and Security

This project demonstrates my proficiency in implementing authentication and security features in Laravel:

- User registration and login with built-in Laravel authentication mechanisms.
- Authorization using custom middleware to ensure only authorized users can access specific routes.
- Utilization of Eloquent models and relationships to manage user data securely.

### Database Structure

The project showcases an organized database structure with various relationships:

- Migrations and schema designs that reflect the application's needs and relationships.
- One-to-many and many-to-many relationships between Questionnaires, Type Indicators, Pairs, and Submits.

### Middleware

Leveraging Laravel middleware to enhance the application:

- Custom middleware for roles, ensuring administrators and regular users have appropriate access.
- Middleware for authentication to restrict access to authenticated users only.

### Webpack and Laravel Mix

I have utilized Webpack and Laravel Mix to efficiently manage frontend assets and ensure optimal performance.

### Unit Testing

I have incorporated unit testing into this project to ensure functionality and maintain code quality.

## Getting Started

To get started with the Personality Assessment System, follow the steps below:

### Installation

1. Clone this repository to your local machine.
2. Navigate to the project directory: `cd personality-assessment-system`
3. Install the required dependencies: `composer install`
4. Configure your environment variables: Create a `.env` file based on `.env.example` and set your database and other configurations.
5. Generate the application key: `php artisan key:generate`
6. Migrate the database: `php artisan migrate`
7. Generate storage link " `php artisan storage:link`
8. Compile and optimize the frontend assets: `npm run development`

### Usage

1. Start the development server: `php artisan serve`
2. Access the application in your web browser: `http://localhost:8000`

## Contributing

Contributions are welcome! If you encounter issues or have ideas for improvements, feel free to open an issue or submit a pull request.

## License

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).
