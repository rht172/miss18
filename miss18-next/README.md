# Miss18 - Fashion E-commerce

This is a conversion of the original Miss18 PHP E-commerce project to a modern tech stack using:

- **Frontend**: Next.js with TypeScript 
- **Backend**: Node.js/Express with TypeScript
- **Database**: MySQL (same database as the original PHP project)
- **Styling**: SCSS with Bootstrap

## Project Structure

The project is organized into two main parts:

- `/` - Next.js frontend application
- `/backend` - Express API server

## Getting Started

### Prerequisites

- Node.js (v16+)
- MySQL database (from the original project)

### Installation

1. Clone the repository
   ```
   git clone https://github.com/yourusername/miss18-next.git
   cd miss18-next
   ```

2. Install frontend dependencies
   ```
   npm install
   ```

3. Install backend dependencies
   ```
   cd backend
   npm install
   cd ..
   ```

4. Configure environment variables:
   - Create a `.env` file in the `/backend` directory with these variables:
     ```
     DB_HOST=127.0.0.1
     DB_USER=your_db_user
     DB_PASS=your_db_password
     DB_NAME=miss_18_ecom
     PORT=4000
     JWT_SECRET=your_jwt_secret
     NODE_ENV=development
     ```
   - Create a `.env.local` file in the root directory:
     ```
     NEXT_PUBLIC_API_URL=http://localhost:4000/api
     ```

5. Start the development servers (both frontend and backend)
   ```
   npm run dev:all
   ```

   This will start:
   - Frontend: http://localhost:3000
   - Backend API: http://localhost:4000

## Features

- **User Authentication** - Login, register, profile management
- **Product Catalog** - Browse products by category, search
- **Shopping Cart** - Add/remove items, adjust quantities
- **Wishlist** - Save products for later
- **Checkout Process** - Multi-step checkout
- **Responsive Design** - Works on desktop and mobile

## Deployment

### Frontend

1. Build the Next.js application
   ```
   npm run build
   ```

2. Start the production server
   ```
   npm start
   ```

### Backend

1. Build the TypeScript code
   ```
   npm run backend:build
   ```

2. Start the production server
   ```
   npm run backend:start
   ```

## Tech Stack

- **Frontend**:
  - Next.js 14+
  - TypeScript
  - React Bootstrap
  - SCSS
  - Axios for API requests
  - React Slick for carousels

- **Backend**:
  - Express
  - TypeScript
  - MySQL2 (for database access)
  - JWT (for authentication)
  - Bcrypt (for password hashing)

## Project Structure

- `/src/app` - Next.js pages using App Router
- `/src/components` - Reusable UI components
- `/src/styles` - SCSS styles
- `/src/types` - TypeScript type definitions
- `/public` - Static assets
- `/backend` - Express API server

## Component Organization

- `/src/components/layout` - Layout components (Header, Footer)
- `/src/components/ui` - Generic UI components
- `/src/components/product` - Product-related components
