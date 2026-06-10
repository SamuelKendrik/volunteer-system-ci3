# Volunteer Management System

## Overview

Volunteer Management System is a web-based application designed to manage volunteer registration, profiles, and related administrative activities. The system provides an interface for volunteers and administrators to efficiently manage volunteer information through a centralized platform.

This project is built using:

### Backend
- PHP
- CodeIgniter
- MySQL

### Frontend
- HTML
- CSS
- JavaScript

---

## Features

### Volunteer Features
- Register volunteer information
- View volunteer profile
- Update volunteer data
- Access volunteer-related information

### Administrator Features
- Manage volunteer records
- View volunteer data
- Edit volunteer information
- Monitor volunteer activities

---

## Project Structure

```text
volunteer-management-system/
│
├── backend/
│   ├── application/
│   ├── system/
│   ├── assets/
│   └── ...
│
├── frontend/
│   ├── assets/
│   ├── pages/
│   └── ...
│
├── webpage.sql
│
└── README.md
```

---

## Requirements

Before running this project, make sure the following software is installed:

- XAMPP
- PHP 7.x or newer
- MySQL
- Web Browser (Chrome, Firefox, Edge, etc.)

Download XAMPP:

:contentReference[oaicite:0]{index=0}

---

## Installation Guide

### 1. Clone the Repository

```bash
git clone https://github.com/YOUR_USERNAME/volunteer-management-system.git
```

or download the ZIP file and extract it.

---

### 2. Move Project to XAMPP Directory

Copy the project folder into:

```text
C:\xampp\htdocs\
```

The final structure should look similar to:

```text
C:\xampp\htdocs\volunteer-management-system
```

---

### 3. Start XAMPP

Open XAMPP Control Panel and start:

- Apache
- MySQL

Both services should show a green status indicating they are running.

---

### 4. Create Database

Open phpMyAdmin:

```text
http://localhost/phpmyadmin
```

Create a new database.

Example:

```sql
CREATE DATABASE volunteer_management;
```

---

### 5. Import Database

1. Open phpMyAdmin.
2. Select the database you created.
3. Click **Import**.
4. Choose:

```text
webpage.sql
```

5. Click **Go** and wait until the import process is completed.

---

### 6. Configure Database Connection

Open the CodeIgniter database configuration file.

Example location:

```text
backend/application/config/database.php
```

Update the database configuration:

```php
$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'volunteer_management',
    'dbdriver' => 'mysqli'
);
```

Adjust the values according to your local database configuration.

---

### 7. Run the Application

After Apache and MySQL are running, open your browser and navigate to:

```text
http://localhost/volunteer-management-system/
```

If the application is stored inside another folder, adjust the URL accordingly.

Example:

```text
http://localhost/volunteer-management-system/frontend/
```

or

```text
http://localhost/volunteer-management-system/backend/
```

depending on the project's structure.

---

## Development Notes

This application follows a client-server architecture:

- Frontend handles user interfaces and interactions.
- Backend handles business logic and database operations.
- MySQL stores application data.
- Communication between frontend and backend is performed through HTTP requests and APIs.

---

## Troubleshooting

### Apache Does Not Start

Possible causes:
- Port 80 is already in use.
- Skype, IIS, or another web server is running.

Solution:
- Change Apache port in XAMPP.
- Stop conflicting services.

---

### Database Connection Error

Check:

- MySQL service is running.
- Database name is correct.
- Username and password are correct.
- `database.php` configuration matches your local environment.

---

### Page Not Found

Verify:

- Project is located inside:

```text
C:\xampp\htdocs\
```

- Apache service is running.
- URL path matches the project folder name.

---

## Contributors

### Samuel Kendrik
- Backend Development
- CodeIgniter Development
- Database Integration
- Frontend–Backend Integration

---

## License

This project is provided for educational, portfolio, and volunteer organization purposes.
