import express from 'express';
import { authenticateToken } from '../middleware/auth';

const router = express.Router();

// All order routes are protected
router.use(authenticateToken);

// Order endpoints will be added later

export default router; 