'use client';

import { useState, useEffect } from 'react';
import Image from 'next/image';
import Link from 'next/link';
import { useRouter } from 'next/navigation';
import { Container, Row, Col, Button, Tabs, Tab } from 'react-bootstrap';
import MainLayout from '@/components/layout/MainLayout';
import ProductCard from '@/components/product/ProductCard';

interface Product {
  tid: number;
  product_name: string;
  product_display_name?: string;
  selling_price: number;
  discount_percentage?: number;
  image1_url?: string;
  ext_file_1?: string;
  ext_file_2?: string;
  ext_file_3?: string;
  ext_file_4?: string;
  ext_file_5?: string;
  ext_file_6?: string;
  category?: string;
  product_description?: string;
  description_1?: string;
  description_2?: string;
  faq?: string;
}

interface ProductDetailProps {
  params: {
    id: string;
  };
}

export default function ProductDetail({ params }: ProductDetailProps) {
  const router = useRouter();
  const productId = parseInt(params.id);
  const [product, setProduct] = useState<Product | null>(null);
  const [relatedProducts, setRelatedProducts] = useState<Product[]>([]);
  const [loading, setLoading] = useState(true);
  const [quantity, setQuantity] = useState(1);
  const [selectedImage, setSelectedImage] = useState(0);
  const [selectedColor, setSelectedColor] = useState('');
  const [selectedSize, setSelectedSize] = useState('');
  
  const apiUrl = process.env.NEXT_PUBLIC_API_URL || 'http://localhost:4000/api';
  
  useEffect(() => {
    // Fetch product details
    const fetchProduct = async () => {
      setLoading(true);
      try {
        // Fetch from the backend API
        const response = await fetch(`${apiUrl}/products/${productId}`);
        
        if (!response.ok) {
          throw new Error('Failed to fetch product');
        }
        
        const productData = await response.json();
        
        // Process image paths to ensure they're properly formatted
        const processedProduct: Product = {
          ...productData,
          // Ensure image path is absolute
          image1_url: productData.image1_url 
            ? (productData.image1_url.startsWith('http') || productData.image1_url.startsWith('/') 
              ? productData.image1_url 
              : `/${productData.image1_url}`)
            : '/images/placeholder.jpg'
        };
        
        setProduct(processedProduct);
        
        // Fetch related products based on category
        const relatedResponse = await fetch(
          `${apiUrl}/products/related?category=${processedProduct.category}&excludeId=${productId}`
        );
        
        if (relatedResponse.ok) {
          const relatedData = await relatedResponse.json();
          
          // Process related product image paths
          const processedRelated = relatedData.products.map((product: Product) => ({
            ...product,
            image1_url: product.image1_url 
              ? (product.image1_url.startsWith('http') || product.image1_url.startsWith('/') 
                ? product.image1_url 
                : `/${product.image1_url}`)
              : '/images/placeholder.jpg'
          }));
          
          setRelatedProducts(processedRelated);
        } else {
          // Fallback to empty array or mock related products
          setRelatedProducts([]);
        }
        
        setLoading(false);
      } catch (error) {
        console.error('Error fetching product:', error);
        // Fallback to mock data if API fails
        const mockProduct: Product = {
          tid: productId,
          product_name: 'Product ' + productId,
          product_display_name: 'Detailed Product ' + productId,
          selling_price: 1299 + (productId * 100),
          discount_percentage: productId % 2 === 0 ? 10 : 0,
          image1_url: '/images/categories/m' + (11 + (productId % 8)) + '.jpg',
          ext_file_1: 'jpg',
          category: ['Dresses', 'T Shirt', 'Crop Top', 'Sweater', 'Skirt', 'Shrugs'][productId % 6],
          product_description: 'This is a detailed description of product ' + productId + '. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac diam eget est rutrum ultrices. Donec laoreet enim id elit imperdiet, at dapibus justo accumsan.',
          description_1: 'Additional details about the product including fabric, care instructions and more.',
          description_2: 'Sizing information and fit details for the product.',
          faq: 'Q: Is this product available in other colors?\nA: Yes, please check our other listings.\n\nQ: What is the material?\nA: This product is made of high-quality cotton blend fabric.',
        };
        
        setProduct(mockProduct);
        
        // Related products based on category
        const mockRelatedProducts = Array.from({ length: 4 }, (_, i) => ({
          tid: 100 + i,
          product_name: `Related Product ${i + 1}`,
          product_display_name: `Related Product ${i + 1}`,
          selling_price: 899 + (i * 100),
          discount_percentage: i % 2 === 0 ? 5 : 0,
          image1_url: `/images/categories/m${23 + (i % 4)}.jpg`,
          ext_file_1: 'jpg',
          category: mockProduct.category
        }));
        
        setRelatedProducts(mockRelatedProducts);
        setLoading(false);
      }
    };
    
    if (!isNaN(productId)) {
      fetchProduct();
    }
  }, [productId, apiUrl]);
  
  const handleQuantityChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    const value = parseInt(e.target.value);
    if (!isNaN(value) && value > 0) {
      setQuantity(value);
    }
  };
  
  const incrementQuantity = () => {
    setQuantity(prev => prev + 1);
  };
  
  const decrementQuantity = () => {
    setQuantity(prev => (prev > 1 ? prev - 1 : 1));
  };
  
  const handleAddToCart = async () => {
    if (!product) return;
    
    const token = localStorage.getItem('token');
    
    if (!token) {
      router.push('/login');
      return;
    }
    
    try {
      const response = await fetch(`${apiUrl}/cart/add`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Authorization': `Bearer ${token}`
        },
        body: JSON.stringify({
          productId: product.tid,
          quantity: quantity,
          colour: selectedColor,
          size: selectedSize
        })
      });
      
      if (response.ok) {
        alert('Product added to cart!');
      }
    } catch (error) {
      console.error('Error adding to cart:', error);
    }
  };
  
  const handleBuyNow = () => {
    handleAddToCart();
    router.push('/cart');
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
  
  if (!product) {
    return (
      <MainLayout>
        <Container className="py-5">
          <div className="text-center py-5">
            <h2>Product Not Found</h2>
            <p>Sorry, the product you are looking for does not exist.</p>
            <Link href="/shop" className="btn btn-primary mt-3">
              Continue Shopping
            </Link>
          </div>
        </Container>
      </MainLayout>
    );
  }
  
  const discountedPrice = product.discount_percentage ? 
    product.selling_price - (product.selling_price * (product.discount_percentage / 100)) : 
    product.selling_price;
  
  const formattedPrice = new Intl.NumberFormat('en-IN', {
    style: 'currency',
    currency: 'INR'
  }).format(product.selling_price);
  
  const formattedDiscountedPrice = new Intl.NumberFormat('en-IN', {
    style: 'currency',
    currency: 'INR'
  }).format(discountedPrice);
  
  // Mock product images
  const productImages = [
    product.image1_url || '/images/placeholder.jpg',
    '/images/placeholder.jpg',
    '/images/placeholder-hover.jpg',
    '/images/placeholder.jpg'
  ];
  
  // Mock colors and sizes
  const availableColors = ['Black', 'White', 'Red', 'Blue', 'Green'];
  const availableSizes = ['XS', 'S', 'M', 'L', 'XL'];
  
  return (
    <MainLayout>
      <Container className="py-5">
        <Row>
          {/* Product images */}
          <Col md={6} className="mb-4">
            <div className="product-gallery">
              {/* Main image */}
              <div className="mb-3 position-relative" style={{ height: '400px' }}>
                <Image
                  src={productImages[selectedImage]}
                  alt={product.product_display_name || product.product_name}
                  layout="fill"
                  objectFit="contain"
                  className="rounded"
                />
              </div>
              
              {/* Thumbnail images */}
              <Row>
                {productImages.map((image, index) => (
                  <Col xs={3} key={index}>
                    <div 
                      className={`cursor-pointer border p-1 ${selectedImage === index ? 'border-primary' : 'border-secondary'}`}
                      onClick={() => setSelectedImage(index)}
                    >
                      <Image
                        src={image}
                        alt={`Thumbnail ${index + 1}`}
                        width={80}
                        height={80}
                        className="img-fluid"
                      />
                    </div>
                  </Col>
                ))}
              </Row>
            </div>
          </Col>
          
          {/* Product details */}
          <Col md={6}>
            <div className="product-details">
              {product.category && (
                <Link href={`/shop?category=${product.category}`} className="text-muted text-uppercase small">
                  {product.category}
                </Link>
              )}
              
              <h1 className="h2 mb-2">{product.product_display_name || product.product_name}</h1>
              
              <div className="mb-3">
                {product.discount_percentage ? (
                  <div className="d-flex align-items-center">
                    <h3 className="text-primary mb-0 me-2">{formattedDiscountedPrice}</h3>
                    <del className="text-muted">{formattedPrice}</del>
                    <span className="badge bg-danger ms-2">{product.discount_percentage}% OFF</span>
                  </div>
                ) : (
                  <h3 className="text-primary mb-0">{formattedPrice}</h3>
                )}
              </div>
              
              {product.product_description && (
                <div className="mb-4">
                  <p>{product.product_description}</p>
                </div>
              )}
              
              {/* Color selection */}
              <div className="mb-3">
                <h5>Color</h5>
                <div className="d-flex">
                  {availableColors.map(color => (
                    <div 
                      key={color}
                      onClick={() => setSelectedColor(color)}
                      className={`color-option me-2 p-2 rounded-circle border ${selectedColor === color ? 'border-primary' : ''}`}
                      style={{ 
                        width: '30px', 
                        height: '30px', 
                        backgroundColor: color.toLowerCase(),
                        cursor: 'pointer'
                      }}
                    >
                    </div>
                  ))}
                </div>
                {selectedColor && <small className="text-muted mt-1 d-block">Selected: {selectedColor}</small>}
              </div>
              
              {/* Size selection */}
              <div className="mb-3">
                <h5>Size</h5>
                <div className="d-flex">
                  {availableSizes.map(size => (
                    <div 
                      key={size}
                      onClick={() => setSelectedSize(size)}
                      className={`size-option me-2 border rounded d-flex align-items-center justify-content-center ${selectedSize === size ? 'bg-primary text-white' : ''}`}
                      style={{ 
                        width: '40px', 
                        height: '40px',
                        cursor: 'pointer'
                      }}
                    >
                      {size}
                    </div>
                  ))}
                </div>
                {selectedSize && <small className="text-muted mt-1 d-block">Selected: {selectedSize}</small>}
              </div>
              
              {/* Quantity */}
              <div className="mb-4">
                <h5>Quantity</h5>
                <div className="d-flex w-100" style={{ maxWidth: '150px' }}>
                  <Button 
                    variant="outline-secondary" 
                    onClick={decrementQuantity}
                    className="px-3"
                  >
                    -
                  </Button>
                  <input
                    type="number"
                    value={quantity}
                    onChange={handleQuantityChange}
                    min="1"
                    className="form-control text-center mx-2"
                  />
                  <Button 
                    variant="outline-secondary" 
                    onClick={incrementQuantity}
                    className="px-3"
                  >
                    +
                  </Button>
                </div>
              </div>
              
              {/* Add to Cart / Buy Now */}
              <div className="d-grid gap-2 d-md-flex mb-4">
                <Button 
                  variant="primary" 
                  size="lg"
                  onClick={handleAddToCart}
                  className="me-md-2 flex-grow-1"
                >
                  <i className="bi bi-cart-plus me-2"></i>
                  Add to Cart
                </Button>
                <Button 
                  variant="danger" 
                  size="lg"
                  onClick={handleBuyNow}
                  className="flex-grow-1"
                >
                  Buy Now
                </Button>
              </div>
              
              {/* Additional information */}
              <ul className="list-unstyled mb-0">
                <li className="d-flex border-bottom pb-2 mb-2">
                  <span className="text-muted me-2">SKU:</span>
                  <span>MIS{1000 + product.tid}</span>
                </li>
                <li className="d-flex border-bottom pb-2 mb-2">
                  <span className="text-muted me-2">Category:</span>
                  <span>{product.category}</span>
                </li>
                <li className="d-flex">
                  <span className="text-muted me-2">Tags:</span>
                  <span>Fashion, {product.category}, Women</span>
                </li>
              </ul>
            </div>
          </Col>
        </Row>
        
        {/* Product tabs (description, details, reviews) */}
        <div className="mt-5">
          <Tabs defaultActiveKey="description" className="mb-4">
            <Tab eventKey="description" title="Description">
              <div className="p-4 bg-light rounded">
                <p>{product.product_description}</p>
                {product.description_1 && <p>{product.description_1}</p>}
                {product.description_2 && <p>{product.description_2}</p>}
              </div>
            </Tab>
            <Tab eventKey="details" title="Additional Information">
              <div className="p-4 bg-light rounded">
                <table className="table">
                  <tbody>
                    <tr>
                      <th>Material</th>
                      <td>Cotton Blend</td>
                    </tr>
                    <tr>
                      <th>Care Instructions</th>
                      <td>Machine wash cold, tumble dry low</td>
                    </tr>
                    <tr>
                      <th>Weight</th>
                      <td>200g</td>
                    </tr>
                    <tr>
                      <th>Dimensions</th>
                      <td>As per size chart</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </Tab>
            <Tab eventKey="faq" title="FAQ">
              <div className="p-4 bg-light rounded">
                {product.faq ? (
                  <div>
                    {product.faq.split('\n\n').map((qa, index) => {
                      const [question, answer] = qa.split('\n');
                      return (
                        <div key={index} className="mb-4">
                          <h5 className="text-primary">{question}</h5>
                          <p>{answer}</p>
                        </div>
                      );
                    })}
                  </div>
                ) : (
                  <p>No FAQs available for this product.</p>
                )}
              </div>
            </Tab>
          </Tabs>
        </div>
        
        {/* Related products */}
        <div className="mt-5">
          <h3 className="mb-4">Related Products</h3>
          <Row>
            {relatedProducts.map(product => (
              <Col key={product.tid} xs={12} sm={6} md={3}>
                <ProductCard
                  id={product.tid}
                  name={product.product_name}
                  displayName={product.product_display_name}
                  price={product.selling_price}
                  discountPercentage={product.discount_percentage}
                  imageUrl={product.image1_url || '/images/placeholder.jpg'}
                  hoverImageUrl={'/images/placeholder-hover.jpg'}
                  category={product.category}
                />
              </Col>
            ))}
          </Row>
        </div>
      </Container>
    </MainLayout>
  );
} 