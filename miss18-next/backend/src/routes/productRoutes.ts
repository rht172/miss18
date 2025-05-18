import express from 'express';
import { 
  getAllProducts, 
  getProductById, 
  getProductsByCategory,
  searchProducts,
  getFeaturedProducts,
  getTopSellingProducts
} from '../controllers/productController';

const router = express.Router();

// Get all products with optional filtering
router.get('/', getAllProducts);

// Get featured products
router.get('/featured', getFeaturedProducts);

// Get top selling products
router.get('/top-selling', getTopSellingProducts);

// Search products
router.get('/search', searchProducts);

// Get products by category
router.get('/category/:category', getProductsByCategory);

// Get single product by ID
router.get('/:id', getProductById);

export default router; 