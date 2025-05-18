import { Request, Response } from 'express';
import cartModel, { CartItem } from '../models/cartModel';
import productModel from '../models/productModel';

export const getCart = async (req: Request, res: Response) => {
  try {
    const userId = req.user?.id;
    
    if (!userId) {
      return res.status(401).json({
        success: false,
        message: 'Not authenticated'
      });
    }
    
    const cartItems = await cartModel.getCartByUserId(userId);
    const totalAmount = cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    
    res.status(200).json({
      success: true,
      cart: cartItems,
      totalAmount,
      totalItems: cartItems.length
    });
  } catch (error) {
    console.error('Error fetching cart:', error);
    res.status(500).json({
      success: false,
      message: 'Error fetching cart'
    });
  }
};

export const addToCart = async (req: Request, res: Response) => {
  try {
    const userId = req.user?.id;
    
    if (!userId) {
      return res.status(401).json({
        success: false,
        message: 'Not authenticated'
      });
    }
    
    const { productId, quantity, colour, size } = req.body;
    
    if (!productId || !quantity) {
      return res.status(400).json({
        success: false,
        message: 'Product ID and quantity are required'
      });
    }
    
    // Get product to validate and get price
    const product = await productModel.getProductById(productId);
    
    if (!product) {
      return res.status(404).json({
        success: false,
        message: 'Product not found'
      });
    }
    
    const cartItem: CartItem = {
      customer_id: userId,
      product_id: productId,
      quantity: parseInt(quantity),
      price: product.selling_price,
      colour,
      size
    };
    
    const itemId = await cartModel.addToCart(cartItem);
    
    res.status(200).json({
      success: true,
      message: 'Item added to cart',
      itemId
    });
  } catch (error) {
    console.error('Error adding to cart:', error);
    res.status(500).json({
      success: false,
      message: 'Error adding to cart'
    });
  }
};

export const updateCartItem = async (req: Request, res: Response) => {
  try {
    const userId = req.user?.id;
    
    if (!userId) {
      return res.status(401).json({
        success: false,
        message: 'Not authenticated'
      });
    }
    
    const { itemId } = req.params;
    const { quantity } = req.body;
    
    if (!itemId || quantity === undefined) {
      return res.status(400).json({
        success: false,
        message: 'Item ID and quantity are required'
      });
    }
    
    const updated = await cartModel.updateCartItemQuantity(parseInt(itemId), parseInt(quantity));
    
    if (!updated) {
      return res.status(404).json({
        success: false,
        message: 'Cart item not found'
      });
    }
    
    res.status(200).json({
      success: true,
      message: 'Cart item updated'
    });
  } catch (error) {
    console.error('Error updating cart item:', error);
    res.status(500).json({
      success: false,
      message: 'Error updating cart item'
    });
  }
};

export const removeCartItem = async (req: Request, res: Response) => {
  try {
    const userId = req.user?.id;
    
    if (!userId) {
      return res.status(401).json({
        success: false,
        message: 'Not authenticated'
      });
    }
    
    const { itemId } = req.params;
    
    if (!itemId) {
      return res.status(400).json({
        success: false,
        message: 'Item ID is required'
      });
    }
    
    const removed = await cartModel.removeFromCart(parseInt(itemId));
    
    if (!removed) {
      return res.status(404).json({
        success: false,
        message: 'Cart item not found'
      });
    }
    
    res.status(200).json({
      success: true,
      message: 'Item removed from cart'
    });
  } catch (error) {
    console.error('Error removing cart item:', error);
    res.status(500).json({
      success: false,
      message: 'Error removing cart item'
    });
  }
};

export const clearCart = async (req: Request, res: Response) => {
  try {
    const userId = req.user?.id;
    
    if (!userId) {
      return res.status(401).json({
        success: false,
        message: 'Not authenticated'
      });
    }
    
    await cartModel.clearCart(userId);
    
    res.status(200).json({
      success: true,
      message: 'Cart cleared successfully'
    });
  } catch (error) {
    console.error('Error clearing cart:', error);
    res.status(500).json({
      success: false,
      message: 'Error clearing cart'
    });
  }
};

export const getCartItemCount = async (req: Request, res: Response) => {
  try {
    const userId = req.user?.id;
    
    if (!userId) {
      return res.status(401).json({
        success: false,
        message: 'Not authenticated'
      });
    }
    
    const count = await cartModel.getCartItemCount(userId);
    
    res.status(200).json({
      success: true,
      count
    });
  } catch (error) {
    console.error('Error getting cart item count:', error);
    res.status(500).json({
      success: false,
      message: 'Error getting cart item count'
    });
  }
}; 