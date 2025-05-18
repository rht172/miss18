'use client';

import { useState, useEffect } from 'react';
import Image from 'next/image';
import Link from 'next/link';
import { useRouter } from 'next/navigation';
import { Container, Row, Col, Button, Form, Table } from 'react-bootstrap';
import MainLayout from '@/components/layout/MainLayout';

interface CartItem {
  tid: number;
  product_id: number;
  product_name: string;
  product_display_name?: string;
  quantity: number;
  price: number;
  colour?: string;
  size?: string;
  image1_url?: string;
  ext_file_1?: string;
  category?: string;
}

export default function Cart() {
  const router = useRouter();
  const [cartItems, setCartItems] = useState<CartItem[]>([]);
  const [loading, setLoading] = useState(true);
  const [subtotal, setSubtotal] = useState(0);
  const [shipping, setShipping] = useState(0);
  const [total, setTotal] = useState(0);
  const [couponCode, setCouponCode] = useState('');
  const [discount, setDiscount] = useState(0);
  
  const apiUrl = process.env.NEXT_PUBLIC_API_URL || 'http://localhost:4000/api';
  
  useEffect(() => {
    const fetchCart = async () => {
      setLoading(true);
      
      // Check if user is logged in
      const token = localStorage.getItem('token');
      if (!token) {
        setLoading(false);
        return;
      }
      
      try {
        // Fetch cart items from the backend API
        const response = await fetch(`${apiUrl}/cart`, {
          headers: {
            'Authorization': `Bearer ${token}`
          }
        });
        
        if (!response.ok) {
          throw new Error('Failed to fetch cart');
        }
        
        const data = await response.json();
        
        // Process image paths to ensure they're properly formatted
        const processedCartItems = data.items.map((item: CartItem) => ({
          ...item,
          // Ensure image path is absolute
          image1_url: item.image1_url 
            ? (item.image1_url.startsWith('http') || item.image1_url.startsWith('/') 
              ? item.image1_url 
              : `/${item.image1_url}`)
            : '/images/placeholder.jpg'
        }));
        
        setCartItems(processedCartItems);
        
        // Calculate totals
        const tempSubtotal = processedCartItems.reduce((sum: number, item: CartItem) => sum + (item.price * item.quantity), 0);
        setSubtotal(tempSubtotal);
        
        // Shipping calculation (free over ₹1000)
        const tempShipping = tempSubtotal > 1000 ? 0 : 100;
        setShipping(tempShipping);
        
        // Set total (subtotal + shipping - discount)
        setTotal(tempSubtotal + tempShipping - discount);
        
        setLoading(false);
      } catch (error) {
        console.error('Error fetching cart:', error);
        // Fallback to mock data if API fails
        const mockCartItems = [
          {
            tid: 1,
            product_id: 1,
            product_name: 'Floral Print Dress',
            product_display_name: 'Summer Floral Dress',
            quantity: 1,
            price: 1299,
            colour: 'Blue',
            size: 'M',
            image1_url: '/images/categories/dress.jpg',
            ext_file_1: 'jpg',
            category: 'Dresses'
          },
          {
            tid: 2,
            product_id: 3,
            product_name: 'Summer Crop Top',
            product_display_name: 'Stylish Crop Top',
            quantity: 2,
            price: 799,
            colour: 'White',
            size: 'S',
            image1_url: '/images/categories/m23.jpg',
            ext_file_1: 'jpg',
            category: 'Crop Top'
          }
        ];
        
        setCartItems(mockCartItems);
        
        // Calculate totals
        const tempSubtotal = mockCartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        setSubtotal(tempSubtotal);
        
        // Shipping calculation (free over ₹1000)
        const tempShipping = tempSubtotal > 1000 ? 0 : 100;
        setShipping(tempShipping);
        
        // Set total (subtotal + shipping - discount)
        setTotal(tempSubtotal + tempShipping - discount);
        
        setLoading(false);
      }
    };
    
    fetchCart();
  }, [discount, apiUrl]);
  
  const updateQuantity = (itemId: number, newQuantity: number) => {
    if (newQuantity < 1) return;
    
    // Update cart item quantity
    const updatedItems = cartItems.map(item => 
      item.tid === itemId ? { ...item, quantity: newQuantity } : item
    );
    
    setCartItems(updatedItems);
    
    // Recalculate totals
    const tempSubtotal = updatedItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    setSubtotal(tempSubtotal);
    
    // Shipping calculation (free over ₹1000)
    const tempShipping = tempSubtotal > 1000 ? 0 : 100;
    setShipping(tempShipping);
    
    // Set total (subtotal + shipping - discount)
    setTotal(tempSubtotal + tempShipping - discount);
    
    // In a real app, you would make an API call to update the quantity
  };
  
  const removeItem = (itemId: number) => {
    // Remove item from cart
    const updatedItems = cartItems.filter(item => item.tid !== itemId);
    setCartItems(updatedItems);
    
    // Recalculate totals
    const tempSubtotal = updatedItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    setSubtotal(tempSubtotal);
    
    // Shipping calculation (free over ₹1000)
    const tempShipping = tempSubtotal > 1000 ? 0 : 100;
    setShipping(tempShipping);
    
    // Set total (subtotal + shipping - discount)
    setTotal(tempSubtotal + tempShipping - discount);
    
    // In a real app, you would make an API call to remove the item
  };
  
  const handleCouponApply = (e: React.FormEvent) => {
    e.preventDefault();
    
    // Apply coupon code logic (mock implementation)
    if (couponCode === 'MISS10') {
      const tempDiscount = Math.round(subtotal * 0.1); // 10% discount
      setDiscount(tempDiscount);
      alert('Coupon applied successfully!');
    } else if (couponCode === 'WELCOME20') {
      const tempDiscount = Math.round(subtotal * 0.2); // 20% discount
      setDiscount(tempDiscount);
      alert('Coupon applied successfully!');
    } else {
      setDiscount(0);
      alert('Invalid coupon code');
    }
  };
  
  const handleCheckout = () => {
    // Redirect to checkout page
    router.push('/checkout/details');
  };
  
  if (loading) {
    return (
      <MainLayout>
        <Container className="py-5">
          <div className="d-flex justify-content-center py-5">
            <div className="spinner-border text-primary" role="status">
              <span className="visually-hidden">Loading...</span>
            </div>
          </div>
        </Container>
      </MainLayout>
    );
  }
  
  // Format currency
  const formatCurrency = (amount: number) => {
    return new Intl.NumberFormat('en-IN', {
      style: 'currency',
      currency: 'INR'
    }).format(amount);
  };
  
  return (
    <MainLayout>
      <div className="bg-secondary py-4">
        <Container>
          <h1 className="h3 text-center mb-0">Shopping Cart</h1>
        </Container>
      </div>
      
      <Container className="py-5">
        {cartItems.length === 0 ? (
          <div className="text-center py-5">
            <i className="bi bi-cart-x" style={{ fontSize: '4rem' }}></i>
            <h2 className="mt-3">Your cart is empty</h2>
            <p>Looks like you haven't added any products to your cart yet.</p>
            <Link href="/shop" className="btn btn-primary mt-3">
              Continue Shopping
            </Link>
          </div>
        ) : (
          <Row>
            {/* Cart items */}
            <Col lg={8} className="mb-4">
              <div className="card mb-4">
                <div className="card-body">
                  <Table responsive className="mb-0">
                    <thead>
                      <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      {cartItems.map(item => (
                        <tr key={item.tid}>
                          <td>
                            <div className="d-flex align-items-center">
                              <div className="flex-shrink-0 me-3" style={{ width: '64px', height: '64px' }}>
                                <Link href={`/product/${item.product_id}`}>
                                  <Image 
                                    src={item.image1_url || '/images/placeholder.jpg'} 
                                    alt={item.product_name}
                                    width={64}
                                    height={64}
                                    className="img-fluid rounded"
                                  />
                                </Link>
                              </div>
                              <div>
                                <h6 className="mb-1">
                                  <Link href={`/product/${item.product_id}`} className="text-dark text-decoration-none">
                                    {item.product_display_name || item.product_name}
                                  </Link>
                                </h6>
                                <small className="text-muted d-block">
                                  {item.colour && `Color: ${item.colour}`}
                                  {item.colour && item.size && ' / '}
                                  {item.size && `Size: ${item.size}`}
                                </small>
                              </div>
                            </div>
                          </td>
                          <td>{formatCurrency(item.price)}</td>
                          <td>
                            <div className="d-flex" style={{ width: '120px' }}>
                              <Button 
                                variant="outline-secondary" 
                                size="sm"
                                onClick={() => updateQuantity(item.tid, item.quantity - 1)}
                                className="px-2"
                              >
                                -
                              </Button>
                              <Form.Control
                                type="number"
                                min="1"
                                value={item.quantity}
                                onChange={(e) => updateQuantity(item.tid, parseInt(e.target.value) || 1)}
                                className="text-center mx-1"
                                style={{ width: '50px' }}
                              />
                              <Button 
                                variant="outline-secondary" 
                                size="sm"
                                onClick={() => updateQuantity(item.tid, item.quantity + 1)}
                                className="px-2"
                              >
                                +
                              </Button>
                            </div>
                          </td>
                          <td>{formatCurrency(item.price * item.quantity)}</td>
                          <td>
                            <Button 
                              variant="link" 
                              className="text-danger p-0" 
                              onClick={() => removeItem(item.tid)}
                            >
                              <i className="bi bi-trash"></i>
                            </Button>
                          </td>
                        </tr>
                      ))}
                    </tbody>
                  </Table>
                </div>
              </div>
              
              <div className="d-flex flex-wrap justify-content-between">
                <Link href="/shop" className="btn btn-outline-primary mb-2">
                  <i className="bi bi-arrow-left me-2"></i>Continue Shopping
                </Link>
                
                <Form onSubmit={handleCouponApply} className="d-flex mb-2">
                  <Form.Control
                    type="text"
                    placeholder="Coupon code"
                    value={couponCode}
                    onChange={(e) => setCouponCode(e.target.value)}
                    className="me-2"
                    style={{ width: '150px' }}
                  />
                  <Button type="submit" variant="outline-secondary">Apply</Button>
                </Form>
              </div>
            </Col>
            
            {/* Order summary */}
            <Col lg={4}>
              <div className="card">
                <div className="card-header">
                  <h5 className="mb-0">Order Summary</h5>
                </div>
                <div className="card-body">
                  <div className="d-flex justify-content-between mb-2">
                    <span>Subtotal:</span>
                    <span>{formatCurrency(subtotal)}</span>
                  </div>
                  <div className="d-flex justify-content-between mb-2">
                    <span>Shipping:</span>
                    <span>{shipping === 0 ? 'Free' : formatCurrency(shipping)}</span>
                  </div>
                  {discount > 0 && (
                    <div className="d-flex justify-content-between mb-2 text-success">
                      <span>Discount:</span>
                      <span>-{formatCurrency(discount)}</span>
                    </div>
                  )}
                  <hr />
                  <div className="d-flex justify-content-between mb-3">
                    <span className="fw-bold">Total:</span>
                    <span className="fw-bold">{formatCurrency(total)}</span>
                  </div>
                  
                  <Button 
                    variant="primary" 
                    className="w-100"
                    onClick={handleCheckout}
                  >
                    Proceed to Checkout
                  </Button>
                  
                  <div className="mt-3">
                    <p className="mb-0 text-center text-muted small">
                      <i className="bi bi-shield-lock me-1"></i>
                      Secure checkout with SSL encryption
                    </p>
                  </div>
                </div>
              </div>
            </Col>
          </Row>
        )}
      </Container>
    </MainLayout>
  );
} 