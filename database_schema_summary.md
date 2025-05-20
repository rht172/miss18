# Miss182 E-commerce Database Schema Summary

## Core Tables

### User Management
| Table Name | Description | Key Fields |
|------------|-------------|------------|
| users | Stores user account information | id, email, password, name, phone, role |
| addresses | Shipping and billing addresses for users | id, user_id, full_name, address_line_1, city, state, postal_code, country, phone |
| customer_table | Legacy customer table (being migrated to users table) | tid, fname, lname, email, password, phone_number, street, city, state |

### Product Management
| Table Name | Description | Key Fields |
|------------|-------------|------------|
| product_table_ecom | Main product table with comprehensive details | tid, sku, product_name, category, sub_category, brand_name, stock, selling_price, product_description |
| product_table | Legacy/supplementary product information | tid, sku, size, colour |
| ecom_category_master | Top-level product categories | tid, category, describition |
| ecom_sub_category_master | Second-level product categories | tid, sub_category, category |
| ecom_super_sub_category_master | Third-level product categories | tid, super_sub_category, sub_category, category |
| ecom_brand_master | Product brands | tid, brand_name |
| ecom_uom_master_table | Units of measurement | tid, uom |

### Order Processing
| Table Name | Description | Key Fields |
|------------|-------------|------------|
| orders | Customer orders information | id, user_id, shipping_address_id, billing_address_id, payment_method, status, total_amount |
| order_items | Individual products in each order | id, order_id, product_id, quantity, price, total |

### Shopping Experience
| Table Name | Description | Key Fields |
|------------|-------------|------------|
| cart | Shopping cart for each user | id, user_id |
| cart_items | Products in each user's cart | id, cart_id, product_id, quantity |
| wishlist | Products saved to users' wishlists | id, user_id, product_id |
| reviews | Product reviews by users | id, user_id, product_id, rating, title, content |

## Key Relationships

1. **User → Orders**
   - One user can place many orders
   - Each order belongs to a single user

2. **User → Addresses**
   - One user can have multiple shipping/billing addresses
   - Each address belongs to a single user

3. **Order → Order Items**
   - One order contains multiple order items
   - Each order item belongs to a single order

4. **Product → Order Items/Cart Items/Wishlist**
   - One product can be in multiple orders, carts, and wishlists
   - Each order item, cart item, or wishlist item references a single product

5. **Categories → Subcategories → Super-subcategories**
   - Hierarchical relationship between category levels
   - Each product belongs to categories at different levels

## Database Migration Notes

The database schema shows evidence of a migration process:

1. Moving from `customer_table` to the new `users` table
2. Maintaining compatibility with legacy tables (`product_table`)
3. Implementation of stored procedures to migrate data between old and new schemas

## Technical Details

- Primary Keys: Most tables use auto-incrementing integer IDs
- Foreign Keys: Used to enforce referential integrity between related tables
- Timestamps: Created/updated timestamps for tracking record changes
- Decimal Fields: Used for all price/currency values to ensure precision 