# RootHub Presentation Management System

The RootHub Presentation Management System is a web application developed in Laravel that facilitates the management of trainees, trainers, classes, courses, assignments, submissions, presentations, and scoring within the RootHub training platform. The system allows trainers to create assignments, trainees to submit their work as presentations, and trainers/judges to evaluate and score the submissions.

## Table of Contents

- [Features](#features)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Features

- User registration and authentication for trainees, trainers, and judges.
- Creation and management of classes and courses.
- Assignment creation by trainers and submission by trainees.
- Presentation URL upload by trainees.
- Judging and scoring of trainees' submissions by trainers/judges.
- Review and feedback submission by trainers/judges.
- Notification system for assignment deadlines and feedback.

## Getting Started

### Prerequisites

Before setting up the RootHub Presentation Management System, ensure you have the following installed:

- PHP (>= 7.4)
- Composer
- MySQL/MariaDB or any other supported database
- Web server (e.g., Apache, Nginx)

### Installation

1. Clone the repository:

``` git clone https://github.com/your-username/roothub-presentation-system.git ```

``` cd roothub-presentation-system ```

2. Install dependencies using Composer:

```composer install```
3. Set up the environment file:

 - Create a copy of the .env.example file and save it as .env.
 - Configure the database connection and other necessary settings in the .env file.
4. Generate the application key:

```php artisan key:generate```
5. Run the database migrations:
```php artisan migrate```
6. Serve the application:

```php artisan serve```
Now, the RootHub Presentation Management System should be accessible at http://localhost:8000 (or any other specified port).

## Usage
Access the application through your web browser, and you'll be directed to the ```login/register``` page.
Register as a trainee, trainer, or admin to access the relevant functionalities.
- Trainers can create classes, courses, and assignments.
- Trainees can submit assignments and upload presentation URLs.
- Judges can review and score the submissions.
- All users can view feedback and scores on their submissions.

## Contributing
Contributions to the RootHub Presentation Management System are welcome! If you find any issues or want to add new features, feel free to submit pull requests. Please ensure to follow the coding standards and provide appropriate test coverage for any changes.

## License
The RootHub Presentation Management System is open-source software licensed under the MIT License.