import express from 'express';
import { 
  getCart, 
  addToCart, 
  updateCartItem, 
  removeCartItem, 
  clearCart,
  getCartItemCount
} from '../controllers/cartController';
import { authenticateToken } from '../middleware/auth';

const router = express.Router();

// All cart routes are protected
router.use(authenticateToken);

// Get cart items for current user
router.get('/', getCart);

// Get cart item count
router.get('/count', getCartItemCount);

// Add item to cart
router.post('/add', addToCart);

// Update cart item quantity
router.put('/item/:itemId', updateCartItem);

// Remove an item from the cart
router.delete('/item/:itemId', removeCartItem);

// Clear entire cart
router.delete('/clear', clearCart);

export default router; 