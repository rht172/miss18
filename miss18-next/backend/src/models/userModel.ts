import pool from '../config/db';
import bcrypt from 'bcrypt';

export interface User {
  tid?: number;
  customer_name: string;
  customer_email: string;
  customer_password: string;
  customer_phone?: string;
  customer_address?: string;
  created_on?: Date;
}

class UserModel {
  private tableName = 'customer_table';

  // Register a new user
  async register(user: User): Promise<number> {
    const hashedPassword = await bcrypt.hash(user.customer_password, 10);
    
    const [result] = await pool.query(
      `INSERT INTO ${this.tableName} (customer_name, customer_email, customer_password, customer_phone) 
       VALUES (?, ?, ?, ?)`,
      [user.customer_name, user.customer_email, hashedPassword, user.customer_phone || '']
    );
    
    return (result as any).insertId;
  }

  // Find user by email
  async findByEmail(email: string): Promise<User | null> {
    const [rows] = await pool.query(
      `SELECT * FROM ${this.tableName} WHERE customer_email = ?`,
      [email]
    );
    
    const users = rows as User[];
    return users.length > 0 ? users[0] : null;
  }

  // Find user by ID
  async findById(id: number): Promise<User | null> {
    const [rows] = await pool.query(
      `SELECT * FROM ${this.tableName} WHERE tid = ?`,
      [id]
    );
    
    const users = rows as User[];
    return users.length > 0 ? users[0] : null;
  }

  // Update user profile
  async updateProfile(id: number, userData: Partial<User>): Promise<boolean> {
    const allowedFields = ['customer_name', 'customer_phone', 'customer_address'];
    const updates: string[] = [];
    const values: any[] = [];

    Object.entries(userData).forEach(([key, value]) => {
      if (allowedFields.includes(key) && value !== undefined) {
        updates.push(`${key} = ?`);
        values.push(value);
      }
    });

    if (updates.length === 0) return false;
    
    values.push(id);
    
    const [result] = await pool.query(
      `UPDATE ${this.tableName} SET ${updates.join(', ')} WHERE tid = ?`,
      values
    );
    
    return (result as any).affectedRows > 0;
  }

  // Update user password
  async updatePassword(id: number, newPassword: string): Promise<boolean> {
    const hashedPassword = await bcrypt.hash(newPassword, 10);
    
    const [result] = await pool.query(
      `UPDATE ${this.tableName} SET customer_password = ? WHERE tid = ?`,
      [hashedPassword, id]
    );
    
    return (result as any).affectedRows > 0;
  }

  // Verify password
  async verifyPassword(user: User, password: string): Promise<boolean> {
    return bcrypt.compare(password, user.customer_password);
  }
}

export default new UserModel(); 