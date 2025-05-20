# Simplified MySQL Database ER Diagram

```mermaid
erDiagram
    USERS ||--o{ ADDRESSES : "has"
    USERS ||--o{ ORDERS : "places"
    USERS ||--o{ WISHLIST : "has"
    USERS ||--o{ REVIEWS : "writes"
    
    ORDERS }o--|| ADDRESSES : "shipping address"
    ORDERS }o--|| ADDRESSES : "billing address"
    ORDERS ||--o{ ORDER_ITEMS : "contains"
    
    PRODUCTS ||--o{ ORDER_ITEMS : "included in"
    PRODUCTS ||--o{ WISHLIST : "saved in"
    PRODUCTS ||--o{ REVIEWS : "receives"
    PRODUCTS }|--|| PRODUCT_INFO : "details"
    
    CATEGORIES ||--o{ PRODUCTS : "contains"
    CATEGORIES ||--o{ SUBCATEGORIES : "contains"
    SUBCATEGORIES ||--o{ SUPER_SUBCATEGORIES : "contains"
    
    BRANDS ||--o{ PRODUCTS : "produces"
    
    USERS {
        int id PK
        string email
        string name
        string phone
        enum role
    }
    
    ADDRESSES {
        int id PK
        int user_id FK
        string address_details
        boolean is_default
    }
    
    ORDERS {
        int id PK
        int user_id FK
        int shipping_address_id FK
        int billing_address_id FK
        string payment_method
        enum status
        decimal total_amount
    }
    
    ORDER_ITEMS {
        int id PK
        int order_id FK
        int product_id FK
        int quantity
        decimal price
    }
    
    PRODUCTS {
        int id PK
        string sku
        string name
        decimal price
        int stock
        string description
        int category_id FK
        int brand_id FK
    }
    
    CATEGORIES {
        int id PK
        string name
        string description
    }
    
    SUBCATEGORIES {
        int id PK
        string name
        int category_id FK
    }
    
    SUPER_SUBCATEGORIES {
        int id PK
        string name
        int subcategory_id FK
    }
    
    BRANDS {
        int id PK
        string name
    }
    
    REVIEWS {
        int id PK
        int user_id FK
        int product_id FK
        int rating
        string content
    }
    
    WISHLIST {
        int id PK
        int user_id FK
        int product_id FK
    }
```

## Key Database Components

This simplified ER diagram focuses on the core tables and relationships in the e-commerce database:

1. **User Management**
   - Users with their personal information
   - Address management for shipping and billing

2. **Product Catalog**
   - Products with detailed information
   - Hierarchical categorization (Categories → Subcategories → Super-subcategories)
   - Brand management

3. **Order Processing**
   - Orders with shipping and billing information
   - Order items with product details

4. **User Engagement**
   - Wishlist functionality
   - Product reviews and ratings

This database design supports a feature-rich e-commerce platform with comprehensive product management, user accounts, order processing, and customer engagement features. 