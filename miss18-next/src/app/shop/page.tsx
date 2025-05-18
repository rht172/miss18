'use client';

import { useState, useEffect } from 'react';
import { useSearchParams } from 'next/navigation';
import { Container, Row, Col, Form, Pagination } from 'react-bootstrap';
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
  category?: string;
}

export default function Shop() {
  const searchParams = useSearchParams();
  const categoryParam = searchParams.get('category');
  
  const [products, setProducts] = useState<Product[]>([]);
  const [categories, setCategories] = useState<string[]>([]);
  const [selectedCategory, setSelectedCategory] = useState<string>(categoryParam || '');
  const [loading, setLoading] = useState(true);
  const [currentPage, setCurrentPage] = useState(1);
  const [totalPages, setTotalPages] = useState(1);
  const [totalProducts, setTotalProducts] = useState(0);
  const [sortBy, setSortBy] = useState('newest');
  
  const apiUrl = process.env.NEXT_PUBLIC_API_URL || 'http://localhost:4000/api';

  useEffect(() => {
    // Set selected category from URL param
    if (categoryParam) {
      setSelectedCategory(categoryParam);
    }
    
    // Fetch categories
    const fetchCategories = async () => {
      try {
        // In a real app, you would fetch categories from API
        setCategories([
          'All',
          'Tops',
          'Crop Top',
          'T Shirt',
          'Dresses',
          'Sweater',
          'Skirt',
          'Shrugs'
        ]);
      } catch (error) {
        console.error('Error fetching categories:', error);
      }
    };
    
    fetchCategories();
  }, [categoryParam]);

  useEffect(() => {
    const fetchProducts = async () => {
      setLoading(true);
      try {
        // Fetch products from backend API
        const response = await fetch(`${apiUrl}/products?category=${selectedCategory}&sort=${sortBy}`);
        
        if (!response.ok) {
          throw new Error('Failed to fetch products');
        }
        
        const data = await response.json();
        
        // Process image paths to ensure they're formatted correctly
        const processedProducts = data.products.map((product: Product) => ({
          ...product,
          // Ensure image path is absolute (either starts with http or /)
          image1_url: product.image1_url 
            ? (product.image1_url.startsWith('http') || product.image1_url.startsWith('/') 
                ? product.image1_url 
                : `/${product.image1_url}`)
            : '/images/placeholder.jpg'
        }));
        
        setProducts(processedProducts);
        setTotalProducts(data.totalCount || processedProducts.length);
        setTotalPages(Math.ceil(data.totalCount / 8) || 1);
        
        setLoading(false);
      } catch (error) {
        console.error('Error fetching products:', error);
        // Fallback to mock data if API fails
        const mockProducts = [
          {
            tid: 1,
            product_name: 'Floral Print Dress',
            product_display_name: 'Summer Floral Dress',
            selling_price: 1299,
            discount_percentage: 10,
            image1_url: '/images/categories/dress.jpg',
            ext_file_1: 'jpg',
            category: 'Dresses'
          },
          {
            tid: 2,
            product_name: 'Casual T-Shirt',
            product_display_name: 'Cotton Casual T-Shirt',
            selling_price: 599,
            discount_percentage: 0,
            image1_url: '/images/categories/tshirt.jpg',
            ext_file_1: 'jpg',
            category: 'T Shirt'
          },
          {
            tid: 3,
            product_name: 'Summer Crop Top',
            product_display_name: 'Stylish Crop Top',
            selling_price: 799,
            discount_percentage: 15,
            image1_url: '/images/categories/m23.jpg',
            ext_file_1: 'jpg',
            category: 'Crop Top'
          },
          {
            tid: 4,
            product_name: 'Winter Sweater',
            product_display_name: 'Warm Winter Sweater',
            selling_price: 1599,
            discount_percentage: 5,
            image1_url: '/images/categories/sweater.jpg',
            ext_file_1: 'jpg',
            category: 'Sweater'
          },
          {
            tid: 5,
            product_name: 'Black Skirt',
            product_display_name: 'Elegant Black Skirt',
            selling_price: 899,
            discount_percentage: 0,
            image1_url: '/images/categories/m17.jpg',
            ext_file_1: 'jpg',
            category: 'Skirt'
          },
          {
            tid: 6,
            product_name: 'Casual Shrug',
            product_display_name: 'Comfortable Shrug',
            selling_price: 999,
            discount_percentage: 10,
            image1_url: '/images/categories/shrug.jpg',
            ext_file_1: 'jpg',
            category: 'Shrugs'
          },
          {
            tid: 7,
            product_name: 'Evening Dress',
            product_display_name: 'Elegant Evening Dress',
            selling_price: 1899,
            discount_percentage: 12,
            image1_url: '/images/categories/dress2.jpg',
            ext_file_1: 'jpg',
            category: 'Dresses'
          },
          {
            tid: 8,
            product_name: 'Basic Crop Top',
            product_display_name: 'Everyday Crop Top',
            selling_price: 699,
            discount_percentage: 0,
            image1_url: '/images/categories/m24.jpg',
            ext_file_1: 'jpg',
            category: 'Crop Top'
          }
        ];
        
        // Filter by category if selected
        let filteredProducts = mockProducts;
        if (selectedCategory && selectedCategory !== 'All') {
          filteredProducts = mockProducts.filter(p => p.category === selectedCategory);
        }
        
        // Sort products
        if (sortBy === 'price-low') {
          filteredProducts.sort((a, b) => a.selling_price - b.selling_price);
        } else if (sortBy === 'price-high') {
          filteredProducts.sort((a, b) => b.selling_price - a.selling_price);
        } else if (sortBy === 'discount') {
          filteredProducts.sort((a, b) => (b.discount_percentage || 0) - (a.discount_percentage || 0));
        }
        
        setProducts(filteredProducts);
        setTotalProducts(filteredProducts.length);
        setTotalPages(Math.ceil(filteredProducts.length / 8));
        setLoading(false);
      }
    };
    
    fetchProducts();
  }, [selectedCategory, sortBy, apiUrl]);

  const handleCategoryChange = (category: string) => {
    setSelectedCategory(category);
    setCurrentPage(1);
  };

  const handleSortChange = (e: React.ChangeEvent<HTMLSelectElement>) => {
    setSortBy(e.target.value);
    setCurrentPage(1);
  };

  const handlePageChange = (page: number) => {
    setCurrentPage(page);
  };

  const renderPagination = () => {
    const items = [];
    
    for (let i = 1; i <= totalPages; i++) {
      items.push(
        <Pagination.Item 
          key={i} 
          active={i === currentPage}
          onClick={() => handlePageChange(i)}
        >
          {i}
        </Pagination.Item>
      );
    }
    
    return (
      <Pagination className="justify-content-center mt-4">
        <Pagination.Prev 
          onClick={() => handlePageChange(Math.max(1, currentPage - 1))} 
          disabled={currentPage === 1}
        />
        {items}
        <Pagination.Next 
          onClick={() => handlePageChange(Math.min(totalPages, currentPage + 1))} 
          disabled={currentPage === totalPages}
        />
      </Pagination>
    );
  };

  return (
    <MainLayout>
      <div className="bg-secondary py-4">
        <Container>
          <h1 className="h3 text-center mb-0">Shop</h1>
        </Container>
      </div>
      
      <Container className="py-5">
        <Row>
          {/* Sidebar with filters */}
          <Col lg={3} className="mb-4">
            <div className="card p-3 mb-4">
              <h3 className="h5 mb-3">Categories</h3>
              <div className="list-group list-group-flush">
                {categories.map((category) => (
                  <button
                    key={category}
                    className={`list-group-item list-group-item-action ${selectedCategory === category ? 'active' : ''}`}
                    onClick={() => handleCategoryChange(category)}
                  >
                    {category}
                  </button>
                ))}
              </div>
            </div>
          </Col>
          
          {/* Products grid */}
          <Col lg={9}>
            <div className="d-flex justify-content-between align-items-center mb-4">
              <div>
                <small>Showing {products.length} of {totalProducts} products</small>
              </div>
              <Form.Select 
                style={{ width: '200px' }}
                value={sortBy}
                onChange={handleSortChange}
              >
                <option value="newest">Sort by: Newest</option>
                <option value="price-low">Sort by: Price (Low to High)</option>
                <option value="price-high">Sort by: Price (High to Low)</option>
                <option value="discount">Sort by: Discount</option>
              </Form.Select>
            </div>
            
            {loading ? (
              <div className="d-flex justify-content-center py-5">
                <div className="spinner-border text-primary" role="status">
                  <span className="visually-hidden">Loading...</span>
                </div>
              </div>
            ) : (
              <>
                <Row className="g-4">
                  {products.length > 0 ? (
                    products.map(product => (
                      <Col key={product.tid} xs={12} sm={6} md={4} lg={3}>
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
                    ))
                  ) : (
                    <Col xs={12}>
                      <div className="text-center py-5">
                        <h3>No products found</h3>
                        <p>Try selecting a different category or search term.</p>
                      </div>
                    </Col>
                  )}
                </Row>
                
                {products.length > 0 && renderPagination()}
              </>
            )}
          </Col>
        </Row>
      </Container>
    </MainLayout>
  );
} 