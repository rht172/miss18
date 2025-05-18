import express from 'express';
import { authenticateToken } from '../middleware/auth';

const router = express.Router();

// All wishlist routes are protected
router.use(authenticateToken);

// Wishlist endpoints will be added later

export default router; 