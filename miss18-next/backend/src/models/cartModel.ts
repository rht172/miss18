import pool from '../config/db';
import { Product } from './productModel';

export interface CartItem {
  tid?: number;
  customer_id: number;
  product_id: number;
  quantity: number;
  price: number;
  colour?: string;
  size?: string;
  created_on?: Date;
  product?: Product;
}

class CartModel {
  private tableName = 'cart_table';
  private productTable = 'product_table_ecom';

  // Get cart for a user
  async getCartByUserId(userId: number): Promise<CartItem[]> {
    const [rows] = await pool.query(
      `SELECT c.*, p.product_name, p.selling_price, p.image1_url, p.ext_file_1, p.category, p.product_display_name
       FROM ${this.tableName} c
       JOIN ${this.productTable} p ON c.product_id = p.tid
       WHERE c.customer_id = ?
       ORDER BY c.created_on DESC`,
      [userId]
    );
    
    return rows as CartItem[];
  }

  // Add item to cart
  async addToCart(cartItem: CartItem): Promise<number> {
    // Check if item already exists in cart
    const [existingItems] = await pool.query(
      `SELECT * FROM ${this.tableName} 
       WHERE customer_id = ? AND product_id = ? AND colour = ? AND size = ?`,
      [cartItem.customer_id, cartItem.product_id, cartItem.colour || '', cartItem.size || '']
    );
    
    const items = existingItems as CartItem[];
    
    if (items.length > 0) {
      // Update quantity if item exists
      const existingItem = items[0];
      const newQuantity = existingItem.quantity + cartItem.quantity;
      
      const [result] = await pool.query(
        `UPDATE ${this.tableName} 
         SET quantity = ?, price = ? 
         WHERE tid = ?`,
        [newQuantity, cartItem.price, existingItem.tid]
      );
      
      return existingItem.tid!;
    } else {
      // Insert new item
      const [result] = await pool.query(
        `INSERT INTO ${this.tableName} 
         (customer_id, product_id, quantity, price, colour, size) 
         VALUES (?, ?, ?, ?, ?, ?)`,
        [
          cartItem.customer_id,
          cartItem.product_id,
          cartItem.quantity,
          cartItem.price,
          cartItem.colour || '',
          cartItem.size || ''
        ]
      );
      
      return (result as any).insertId;
    }
  }

  // Update cart item quantity
  async updateCartItemQuantity(itemId: number, quantity: number): Promise<boolean> {
    const [result] = await pool.query(
      `UPDATE ${this.tableName} SET quantity = ? WHERE tid = ?`,
      [quantity, itemId]
    );
    
    return (result as any).affectedRows > 0;
  }

  // Remove an item from cart
  async removeFromCart(itemId: number): Promise<boolean> {
    const [result] = await pool.query(
      `DELETE FROM ${this.tableName} WHERE tid = ?`,
      [itemId]
    );
    
    return (result as any).affectedRows > 0;
  }

  // Clear entire cart for a user
  async clearCart(userId: number): Promise<boolean> {
    const [result] = await pool.query(
      `DELETE FROM ${this.tableName} WHERE customer_id = ?`,
      [userId]
    );
    
    return (result as any).affectedRows > 0;
  }

  // Get cart item count
  async getCartItemCount(userId: number): Promise<number> {
    const [result] = await pool.query(
      `SELECT SUM(quantity) as count FROM ${this.tableName} WHERE customer_id = ?`,
      [userId]
    );
    
    return (result as any)[0].count || 0;
  }
}

export default new CartModel(); 