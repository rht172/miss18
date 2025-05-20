# E-commerce Application

A modern e-commerce platform built with Next.js, Node.js, TypeScript, and MySQL.

## Project Structure

This project follows a monorepo structure:

```
project-root/
├── frontend/            # Next.js + TypeScript frontend
├── backend/             # Node.js + TypeScript backend
└── database/            # MySQL database scripts
```

## Features

- **Frontend**:
  - Modern UI built with Next.js and TypeScript
  - Product catalog with filtering and search
  - Product detail pages
  - Shopping cart functionality
  - User authentication
  - Admin panel for product management

- **Backend**:
  - RESTful API built with Node.js and Express
  - TypeScript for type safety
  - MySQL database integration
  - JWT authentication
  - File upload functionality for product images

## Prerequisites

- Node.js (v14 or higher)
- MySQL (v5.7 or higher)
- npm or yarn

## Installation

### Clone the repository

```bash
git clone <repository-url>
cd e-commerce-app
```

### Frontend Setup

```bash
cd frontend
npm install
# Create .env.local file
echo "NEXT_PUBLIC_API_URL=http://localhost:3001/api" > .env.local
npm run dev
```

### Backend Setup

```bash
cd backend
npm install
# Create .env file
echo "PORT=3001
DB_HOST=localhost
DB_USER=root
DB_PASS=your_password
DB_NAME=ecommerce_db
JWT_SECRET=your_secret_key
UPLOAD_DIR=uploads" > .env
npm run dev
```

### Database Setup

1. Create a MySQL database named `ecommerce_db`
2. Run the migration script:

```bash
mysql -u root -p ecommerce_db < database/migration.sql
```

## Development

### Frontend

The frontend is a Next.js application located in the `frontend` directory. To start the development server:

```bash
cd frontend
npm run dev
```

This will start the Next.js development server at http://localhost:3000.

### Backend

The backend is a Node.js application located in the `backend` directory. To start the development server:

```bash
cd backend
npm run dev
```

This will start the Express server at http://localhost:3001.

## Backend API Endpoints

- **Products**:
  - `GET /api/products`: Get all products
  - `GET /api/products/:id`: Get product by ID
  - `GET /api/products/category/:category`: Get products by category
  - `POST /api/products`: Create a new product (admin only)
  - `PUT /api/products/:id`: Update a product (admin only)
  - `DELETE /api/products/:id`: Delete a product (admin only)

- **Authentication**:
  - `POST /api/auth/login`: User login
  - `POST /api/auth/register`: User registration

## Deployment

### Frontend

```bash
cd frontend
npm run build
npm start
```

### Backend

```bash
cd backend
npm run build
npm start
```

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is licensed under the MIT License.

// commands

// to start php server

// php -S localhost:8000


// to start My SQL server
brew services start mysql

// If you encounter bootstrap error (Input/output error), try these solutions:
// 1. Run with sudo:
sudo brew services start mysql

// 2. If that doesn't work, try manual restart:
brew services stop mysql
brew services cleanup
brew services start mysql

// 3. Check if MySQL is properly installed:
brew info mysql

// 4. Repair MySQL installation if needed:
brew doctor
brew update
brew upgrade mysql

// MY SQL CLI 

mysql -u root -p

// Fix for "incompatible with sql_mode=only_full_group_by" error:
// Option 1: Modify MySQL configuration temporarily (until restart)
mysql -u root -p
SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));
EXIT;

// Option 2: Modify MySQL configuration permanently
// Edit your my.cnf file (usually at /usr/local/etc/my.cnf) and add:
// sql_mode="STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION"
// Then restart MySQL:
brew services restart mysql

// Option 3: Fix your query by ensuring all selected columns are in GROUP BY clause
// Example: Change "SELECT * FROM table GROUP BY category" to:
// "SELECT category, ANY_VALUE(column1), ANY_VALUE(column2)... FROM table GROUP BY category"