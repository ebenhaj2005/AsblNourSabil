<p align="center">
  <img src="https://ugc.production.linktr.ee/93b38c44-c418-4ea8-92e0-7c6dcd6e6e74_Screenshot-2024-05-08-20-40-55-98-7352322957d4404136654ef4adb64504.jpeg" 
       alt="ASBL Nour Al Andalous" />
</p>

# Asbl Nour Sabil Website

This is a Laravel-based project built to meet the requirements of a dynamic data-driven website. The website provides a platform for Asbl Nour Sabil, a non-profit organization creating water wells in Zanzibar, to showcase their projects and engage with their audience.

## Table of Contents

- [Project Description](#project-description)
- [Features](#features)
  - [Functional Requirements](#functional-requirements)
  - [Additional Features](#additional-features)
- [Technical Requirements](#technical-requirements)
- [Installation](#installation)
  - [Prerequisites](#prerequisites)
  - [Steps to Install Locally](#steps-to-install-locally)
  - [Running the Application](#running-the-application)
- [Usage](#usage)
- [License](#license)
- [Acknowledgements](#acknowledgements)

## Project Description

This project serves as a dynamic website designed for a non-profit organization. It allows users to:
- View news, FAQs, and contact information.
- Admins can manage content such as news, FAQs, and user roles.
- Implement a secure login system with multiple roles (Admin and User).
- Meet the technical and functional requirements outlined in the project guidelines.

## Features

### Functional Requirements

1. **Login System**
   - Users can register and log in.
   - Role-based access:
     - Admins can promote/demote users to/from admin roles.
     - Admins can create users manually.
   - "Remember Me" and password reset functionality included.

2. **Profile Page**
   - Publicly accessible profile pages for each user.
   - Editable user data for logged-in users.
   - Profile fields include:
     - Username
     - Birthday
     - Profile photo (stored on the server)
     - "About Me" text

3. **News Management**
   - Admins can create, edit, and delete news items.
   - Visitors can view a list of news items and their details.
   - Each news item includes:
     - Title
     - Image (stored on the server)
     - Content
     - Publication date

4. **FAQ Section**
   - FAQs grouped by category.
   - Admins can manage categories, questions, and answers.
   - Publicly viewable by all visitors.

5. **Contact Page**
   - Visitors can submit a contact form.
   - Admins receive emails with form details.

### Additional Features
- Admins can view and manage all submitted contact forms in an admin panel.
- Basic validation for all user inputs.

## Installation

### Prerequisites

Ensure the following software is installed on your system:
- **PHP** >= 8.1
- **Composer**
- **Node.js** (LTS version recommended)
- **NPM** or **Yarn**
- A web server such as Apache or Nginx
- A database server such as MySQL or PostgreSQL

### Steps to Install Locally
1. **Clone the repository:**

   git clone https://github.com/ebenhaj2005/AsblNourSabil.git
   cd AsblNourSabil

2.**Install PHP dependencies using Composer:**
  composer install
  
3.**Install JavaScript dependencies using NPM or Yarn:**

  npm install
  
4.**Copy the .env file:**

  cp .env.example .env
  
5.**Configure the .env file with your database credentials:**

Open the .env file and modify the following lines:

  DB_CONNECTION=mysql
  
  DB_HOST=127.0.0.1
  
  DB_PORT=3306
  
  DB_DATABASE=your_database_name
  
  DB_USERNAME=your_database_user
  
  DB_PASSWORD=your_database_password
  
6.**Generate the application key:**


php artisan key:generate

7.**Run database migrations and seed the database:**

php artisan migrate --seed

8.**Compile front-end assets:**


npm run dev

# Running the Application

1.**Start the development server:**


php artisan serve

2.**Access the application at http://localhost:8000.**

# Usage

Log in as the default admin using:

Email: **admin@ehb.be**

Password: **Password!321**

Explore the features, such as managing news, FAQs, and contact forms.

# License

This project is open-source and licensed under the MIT License. See the LICENSE file for details.

# Acknowledgements

Laravel documentation for framework usage.
Chatgpt

Online resources referenced in the code are credited within comments.


