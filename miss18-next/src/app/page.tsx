'use client';

import { useState, useEffect } from 'react';
import { Container, Row, Col } from 'react-bootstrap';
import MainLayout from '@/components/layout/MainLayout';
import HomeSlider from '@/components/ui/Slider';
import CategoryCard from '@/components/ui/CategoryCard';
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

export default function Home() {
  const [featuredProducts, setFeaturedProducts] = useState<Product[]>([]);
  const [topSellingProducts, setTopSellingProducts] = useState<Product[]>([]);
  const [loading, setLoading] = useState(true);
  
  useEffect(() => {
    const fetchProducts = async () => {
      try {
        // In a real app, you would fetch from your API
        // For now, adding mockup data
        setFeaturedProducts([
          {
            tid: 1,
            product_name: 'Floral Print Dress',
            product_display_name: 'Summer Floral Dress',
            selling_price: 1299,
            discount_percentage: 10,
            image1_url: '/images/products/dress1.jpg',
            ext_file_1: 'jpg',
            category: 'Dresses'
          },
          {
            tid: 2,
            product_name: 'Casual T-Shirt',
            product_display_name: 'Cotton Casual T-Shirt',
            selling_price: 599,
            discount_percentage: 0,
            image1_url: '/images/products/tshirt1.jpg',
            ext_file_1: 'jpg',
            category: 'T Shirt'
          },
          {
            tid: 3,
            product_name: 'Summer Crop Top',
            product_display_name: 'Stylish Crop Top',
            selling_price: 799,
            discount_percentage: 15,
            image1_url: '/images/products/top1.jpg',
            ext_file_1: 'jpg',
            category: 'Crop Top'
          },
          {
            tid: 4,
            product_name: 'Winter Sweater',
            product_display_name: 'Warm Winter Sweater',
            selling_price: 1599,
            discount_percentage: 5,
            image1_url: '/images/products/sweater1.jpg',
            ext_file_1: 'jpg',
            category: 'Sweater'
          }
        ]);
        
        setTopSellingProducts([
          {
            tid: 5,
            product_name: 'Black Skirt',
            product_display_name: 'Elegant Black Skirt',
            selling_price: 899,
            discount_percentage: 0,
            image1_url: '/images/products/skirt1.jpg',
            ext_file_1: 'jpg',
            category: 'Skirt'
          },
          {
            tid: 6,
            product_name: 'Casual Shrug',
            product_display_name: 'Comfortable Shrug',
            selling_price: 999,
            discount_percentage: 10,
            image1_url: '/images/products/shrug1.jpg',
            ext_file_1: 'jpg',
            category: 'Shrugs'
          },
          {
            tid: 7,
            product_name: 'Evening Dress',
            product_display_name: 'Elegant Evening Dress',
            selling_price: 1899,
            discount_percentage: 12,
            image1_url: '/images/products/dress2.jpg',
            ext_file_1: 'jpg',
            category: 'Dresses'
          },
          {
            tid: 8,
            product_name: 'Basic Crop Top',
            product_display_name: 'Everyday Crop Top',
            selling_price: 699,
            discount_percentage: 0,
            image1_url: '/images/products/top2.jpg',
            ext_file_1: 'jpg',
            category: 'Crop Top'
          }
        ]);
        
        setLoading(false);
      } catch (error) {
        console.error('Error fetching products:', error);
        setLoading(false);
      }
    };
    
    fetchProducts();
  }, []);
  
  // Category data
  const categories = [
    {
      imageUrl: '/images/categories/tshirt.jpg',
      title: 'T Shirt',
      category: 'T Shirt'
    },
    {
      imageUrl: '/images/categories/dress.jpg',
      title: 'Dresses',
      category: 'Dresses'
    },
    {
      imageUrl: '/images/categories/sweater.jpg',
      title: 'Sweater',
      category: 'Sweater'
    },
    {
      imageUrl: '/images/categories/tshirt2.jpg',
      title: 'T Shirt',
      category: 'T Shirt'
    },
    {
      imageUrl: '/images/categories/shrug.jpg',
      title: 'Shrugs',
      category: 'Shrugs'
    },
    {
      imageUrl: '/images/categories/dress2.jpg',
      title: 'Dresses',
      category: 'Dresses'
    },
    {
      imageUrl: '/images/categories/shrug2.jpg',
      title: 'Shrugs',
      category: 'Shrugs'
    },
    {
      imageUrl: '/images/categories/dress3.jpg',
      title: 'Dresses',
      category: 'Dresses'
    }
  ];
  
  return (
    <MainLayout>
      <HomeSlider />
      
      <section className="custom-padding">
        <div className="fw-bold text-center text-dark pb-4">
          <h3>SHOP BY CATEGORY</h3>
        </div>
        
        <div className="tns-carousel">
          <div className="row g-3">
            {categories.slice(0, 4).map((category, index) => (
              <Col key={index} xs={12} sm={6} md={3}>
                <CategoryCard
                  imageUrl={category.imageUrl}
                  title={category.title}
                  category={category.category}
                />
              </Col>
            ))}
          </div>
          
          <div className="row g-3 mt-4">
            {categories.slice(4, 8).map((category, index) => (
              <Col key={index} xs={12} sm={6} md={3}>
                <CategoryCard
                  imageUrl={category.imageUrl}
                  title={category.title}
                  category={category.category}
                />
              </Col>
            ))}
          </div>
        </div>
      </section>
      
      <section className="custom-padding pt-5">
        <div className="fw-bold text-center text-dark pb-4">
          <h3>FEATURED PRODUCTS</h3>
        </div>
        
        {loading ? (
          <div className="d-flex justify-content-center py-5">
            <div className="spinner-border text-primary" role="status">
              <span className="visually-hidden">Loading...</span>
            </div>
          </div>
        ) : (
          <Row className="g-4">
            {featuredProducts.map(product => (
              <Col key={product.tid} xs={12} sm={6} md={3}>
                <ProductCard
                  id={product.tid}
                  name={product.product_name}
                  displayName={product.product_display_name}
                  price={product.selling_price}
                  discountPercentage={product.discount_percentage}
                  imageUrl={product.image1_url || '/images/placeholder.jpg'}
                  hoverImageUrl={product.image1_url ? `${product.image1_url.replace('.jpg', '-hover.jpg')}` : undefined}
                  category={product.category}
                />
              </Col>
            ))}
          </Row>
        )}
      </section>
      
      <section className="custom-padding py-5">
        <div className="fw-bold text-center text-dark pb-4">
          <h3>TOP SELLING PRODUCTS</h3>
        </div>
        
        {loading ? (
          <div className="d-flex justify-content-center py-5">
            <div className="spinner-border text-primary" role="status">
              <span className="visually-hidden">Loading...</span>
            </div>
          </div>
        ) : (
          <Row className="g-4">
            {topSellingProducts.map(product => (
              <Col key={product.tid} xs={12} sm={6} md={3}>
                <ProductCard
                  id={product.tid}
                  name={product.product_name}
                  displayName={product.product_display_name}
                  price={product.selling_price}
                  discountPercentage={product.discount_percentage}
                  imageUrl={product.image1_url || '/images/placeholder.jpg'}
                  hoverImageUrl={product.image1_url ? `${product.image1_url.replace('.jpg', '-hover.jpg')}` : undefined}
                  category={product.category}
                />
              </Col>
            ))}
          </Row>
        )}
      </section>
    </MainLayout>
  );
}
