import pool from '../config/db';

export interface Product {
  tid?: number;
  sku?: string;
  product_type?: string;
  category?: string;
  sub_category?: string;
  super_sub_category?: string;
  brand_name?: string;
  product_name: string;
  stock?: number;
  unit?: string;
  tax_type?: string;
  selling_price: number;
  purchase_price?: number;
  mrp?: number;
  colour?: string;
  size?: string;
  product_description?: string;
  image1_url?: string;
  ext_file_1?: string;
  ext_file_2?: string;
  ext_file_3?: string;
  ext_file_4?: string;
  ext_file_5?: string;
  ext_file_6?: string;
  discount_percentage?: number;
  product_display_name?: string;
}

class ProductModel {
  private tableName = 'product_table_ecom';
  
  // Get all products with pagination
  async getAllProducts(
    page: number = 1, 
    limit: number = 10, 
    category?: string
  ): Promise<{ products: Product[]; total: number }> {
    const offset = (page - 1) * limit;
    let whereClause = '';
    let countParams: any[] = [];
    let queryParams: any[] = [];
    
    if (category) {
      whereClause = 'WHERE category = ?';
      countParams = [category];
      queryParams = [category, limit, offset];
    } else {
      queryParams = [limit, offset];
    }
    
    // Get total count
    const [countResult] = await pool.query(
      `SELECT COUNT(*) as total FROM ${this.tableName} ${whereClause}`,
      countParams
    );
    const total = (countResult as any)[0].total;
    
    // Get products
    const [rows] = await pool.query(
      `SELECT * FROM ${this.tableName} ${whereClause} LIMIT ? OFFSET ?`,
      queryParams
    );
    
    return {
      products: rows as Product[],
      total
    };
  }
  
  // Get featured products
  async getFeaturedProducts(limit: number = 8): Promise<Product[]> {
    const [rows] = await pool.query(
      `SELECT p.* FROM featured_product_table fp
       JOIN ${this.tableName} p ON fp.product_id = p.tid
       LIMIT ?`,
      [limit]
    );
    
    return rows as Product[];
  }
  
  // Get product by ID
  async getProductById(id: number): Promise<Product | null> {
    const [rows] = await pool.query(
      `SELECT * FROM ${this.tableName} WHERE tid = ?`,
      [id]
    );
    
    const products = rows as Product[];
    return products.length > 0 ? products[0] : null;
  }
  
  // Search products
  async searchProducts(query: string): Promise<Product[]> {
    const searchTerm = `%${query}%`;
    
    const [rows] = await pool.query(
      `SELECT * FROM ${this.tableName} 
       WHERE product_name LIKE ? 
       OR product_display_name LIKE ? 
       OR category LIKE ? 
       OR sub_category LIKE ?
       OR product_description LIKE ?
       LIMIT 20`,
      [searchTerm, searchTerm, searchTerm, searchTerm, searchTerm]
    );
    
    return rows as Product[];
  }
  
  // Get products by category
  async getProductsByCategory(category: string, page: number = 1, limit: number = 10): Promise<{ products: Product[]; total: number }> {
    return this.getAllProducts(page, limit, category);
  }
  
  // Get related products
  async getRelatedProducts(productId: number, limit: number = 4): Promise<Product[]> {
    const [product] = await pool.query(
      `SELECT category FROM ${this.tableName} WHERE tid = ?`,
      [productId]
    );
    
    if ((product as any[]).length === 0) {
      return [];
    }
    
    const category = (product as any)[0].category;
    
    const [rows] = await pool.query(
      `SELECT * FROM ${this.tableName} 
       WHERE category = ? AND tid != ? 
       LIMIT ?`,
      [category, productId, limit]
    );
    
    return rows as Product[];
  }
  
  // Get top selling products
  async getTopSellingProducts(limit: number = 8): Promise<Product[]> {
    const [rows] = await pool.query(
      `SELECT p.* FROM top_selling_table ts
       JOIN ${this.tableName} p ON ts.product_id = p.tid
       LIMIT ?`,
      [limit]
    );
    
    return rows as Product[];
  }
}

export default new ProductModel(); 