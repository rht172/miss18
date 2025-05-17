# Miss18 E-commerce Platform

## Overview
Miss18 is a modern e-commerce platform designed for fashion retail. It offers a responsive shopping experience with comprehensive product management, cart functionality, and user account features.

## Features
- **Product Gallery**: Responsive product displays with zoom functionality
- **Category Navigation**: Browse products by category, size, and color
- **Shopping Cart**: Add items to cart with quantity selection and real-time price updates
- **Wishlist**: Save favorite products for later
- **User Accounts**: Registration and login system
- **Product Details**: Comprehensive product information with specifications
- **Related Products**: "You may also like" product recommendations
- **Mobile Responsive**: Optimized for all device sizes

## Tech Stack
- **Backend**: PHP
- **Database**: MySQL
- **Frontend**: HTML5, CSS3, JavaScript, jQuery
- **UI Framework**: Bootstrap
- **Additional Libraries**: 
  - Tiny Slider for carousels
  - Drift Zoom for product image zoom
  - LightGallery for image galleries
  - Simplebar for custom scrollbars

## Project Structure
```
miss18/
├── api-call.php              # API endpoints for AJAX requests
├── assets/                   # Static assets (icons, images)
├── checkout-details.php      # Checkout process
├── cz-admin/                 # Admin area
│   └── attachments/          # Product images
├── css/                      # Stylesheets
├── img/                      # Image assets
├── includes/                 # Common components
│   ├── dbAccessClass.php     # Database connection handler
│   ├── footer.php            # Site footer
│   ├── header.php            # Site header
│   ├── myFunctions.php       # Utility functions
│   ├── title.php             # Page titles
│   └── validateSession.php   # Session validation
├── index.php                 # Main homepage
├── js/                       # JavaScript files
├── product-category.php      # Category listings
├── product-page.php          # Product details
├── shop-cart.php             # Shopping cart
├── sign-up-form.php          # Registration
└── vendor/                   # Third-party libraries
```

## Installation

### Requirements
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server

### Steps
1. **Clone the repository**
   ```
   git clone https://github.com/yourusername/miss18.git
   cd miss18
   ```

2. **Database Setup**
   - Create a new MySQL database
   - Import the database schema from `database/miss18.sql`
   - Configure database connection in `includes/dbAccessClass.php`

3. **Server Configuration**
   - Point your web server to the project directory
   - Ensure proper file permissions:
     ```
     chmod 755 -R /path/to/miss18
     chmod 777 -R /path/to/miss18/cz-admin/attachments
     ```

4. **Access the Website**
   - Frontend: http://yourdomain.com/
   - Admin: http://yourdomain.com/cz-admin/

## Configuration
Update database connection settings in `includes/dbAccessClass.php`:

```php
protected $servername = "localhost";
protected $username = "your_username";
protected $password = "your_password";
protected $dbname = "miss18";
```

## Usage

### Customer Interface
- Browse products by category using the navigation menu
- Filter products by size, color, and other attributes
- View detailed product information and additional images
- Add items to cart or wishlist
- Manage cart quantities
- Complete checkout process

### Admin Interface
- Manage products (add, edit, delete)
- Organize categories
- View and process orders
- Manage user accounts
- Upload and manage product images

## Local Storage
The application uses browser local storage for:
- Shopping cart persistence
- Wishlist management
- User preferences

## Browser Compatibility
- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Android Chrome)

## Contributing
1. Fork the repository
2. Create a feature branch
3. Commit your changes
4. Push to the branch
5. Open a pull request

## License
Proprietary - All rights reserved © Miss18 2023 