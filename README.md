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
   git clone https://github.com/yourusername/libms-web.git
   cd libms-web
2. **Set up the environment**:
  Copy .env.example to .env:
  ```bash
  cp .env.example .env
