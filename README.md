# Library Management System

This is a Library Management System built using **Laravel** and **Livewire**. It allows users to manage books, borrowers, loans, and book transactions. The system provides functionality for adding, editing, and deleting books and borrowers, as well as tracking book loans and returns.

## Features

- **Book Management**: 
  - Add, edit, and delete books.
  - View a list of books with details such as title, author, genre, and shelf code.
  
- **Borrower Management**:
  - Add, edit, and delete borrowers.
  - View a list of borrowers with details like name, email, membership type, and date joined.

- **Loan Management**:
  - Loan books to borrowers.
  - Track loan dates, return dates, and loan statuses.
  - Return books and update their status.

- **Book Transactions**:
  - Track book transactions (e.g., borrow, return).

- **Responsive UI**:
  - The application is fully responsive and works well on both desktop and mobile devices.

## Installation

### Requirements

- PHP >= 7.4
- Laravel >= 8.0
- Composer
- MySQL (or any other supported database)

### Steps to Install

1. **Clone the repository**:
   ```bash
   git clone https://github.com/yourusername/library-management-system.git
   cd library-management-system
Install dependencies:

bash
Copy code
composer install
Set up the environment: Copy .env.example to .env:

bash
Copy code
cp .env.example .env
Generate the application key:

bash
Copy code
php artisan key:generate
Set up the database: Update your .env file with your database credentials.

Run migrations:

bash
Copy code
php artisan migrate
Seed the database (optional): If you'd like to seed the database with sample data, you can run:

bash
Copy code
php artisan db:seed
Start the development server:

bash
Copy code
php artisan serve
The application should now be accessible at http://localhost:8000.

Usage
Navigate to the application in your browser.
You can add, view, edit, and delete books, borrowers, and loans.
You can manage book transactions and keep track of returned books.
Livewire Components
The following Livewire components are implemented in the project:

BookList: Manages the list of books and provides functionality to add, edit, and delete books.
BorrowerList: Manages the list of borrowers and provides functionality to add, edit, and delete borrowers.
LoanList: Manages book loans and allows users to view and manage loan information.
BookTransactionList: Displays the list of book transactions and allows tracking of borrow/return operations.
Technologies Used
Laravel: PHP framework used for building the backend.
Livewire: A full-stack framework for Laravel that makes building dynamic interfaces easy without leaving the comfort of Laravel.
Tailwind CSS: Used for styling the UI with a utility-first approach.
MySQL: Used for the database management.
Contributing
Fork the repository.
Create your feature branch: git checkout -b feature/your-feature.
Commit your changes: git commit -m 'Add some feature'.
Push to the branch: git push origin feature/your-feature.
Open a pull request.
License
This project is open-source and available under the MIT License.

Acknowledgments
Laravel and Livewire for providing the frameworks and tools.
Tailwind CSS for providing a sleek and responsive design.
