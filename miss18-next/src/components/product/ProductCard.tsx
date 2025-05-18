'use client';

import { useState } from 'react';
import Link from 'next/link';
import Image from 'next/image';
import { useRouter } from 'next/navigation';
import { normalizeImagePath } from '@/utils/imageHelpers';

interface ProductCardProps {
  id: number;
  name: string;
  displayName?: string;
  price: number;
  discountPercentage?: number;
  imageUrl: string;
  hoverImageUrl?: string;
  category?: string;
}

const ProductCard: React.FC<ProductCardProps> = ({
  id,
  name,
  displayName,
  price,
  discountPercentage = 0,
  imageUrl,
  hoverImageUrl,
  category
}) => {
  const router = useRouter();
  const [isWishlist, setIsWishlist] = useState(false);
  const apiUrl = process.env.NEXT_PUBLIC_API_URL || 'http://localhost:4000/api';
  
  const formattedPrice = new Intl.NumberFormat('en-IN', {
    style: 'currency',
    currency: 'INR'
  }).format(price);
  
  const discountedPrice = discountPercentage > 0 
    ? price - (price * (discountPercentage / 100)) 
    : price;
  
  const formattedDiscountedPrice = new Intl.NumberFormat('en-IN', {
    style: 'currency',
    currency: 'INR'
  }).format(discountedPrice);
  
  const toggleWishlist = async (e: React.MouseEvent) => {
    e.preventDefault();
    
    // Here you would make an API call to add/remove from wishlist
    // if the user is authenticated
    const token = localStorage.getItem('token');
    
    if (!token) {
      router.push('/login');
      return;
    }
    
    // Mock toggle for now
    setIsWishlist(!isWishlist);
  };
  
  const addToCart = async (e: React.MouseEvent) => {
    e.preventDefault();
    
    // Here you would make an API call to add to cart
    // if the user is authenticated
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
          productId: id,
          quantity: 1
        })
      });
      
      if (response.ok) {
        // Show a success message or update cart count
        console.log('Product added to cart');
      }
    } catch (error) {
      console.error('Error adding to cart:', error);
    }
  };
  
  return (
    <div className="card h-100 product-card">
      <div className="card-img-top position-relative">
        <Link href={`/product/${id}`} className="d-block image-container">
          <Image
            src={normalizeImagePath(imageUrl)}
            alt={name}
            width={300}
            height={400}
            className="main-image"
          />
          {hoverImageUrl && (
            <Image
              src={normalizeImagePath(hoverImageUrl)}
              alt={name}
              width={300}
              height={400}
              className="hover-image"
            />
          )}
        </Link>
        <div className="product-card-actions">
          <button 
            className="btn-wishlist btn-sm" 
            type="button" 
            onClick={toggleWishlist}
            title="Add to wishlist"
          >
            <i className={`bi ${isWishlist ? 'bi-heart-fill' : 'bi-heart'}`}></i>
          </button>
        </div>
        {discountPercentage > 0 && (
          <div className="position-absolute top-0 start-0 m-2 badge bg-danger">
            {discountPercentage}% OFF
          </div>
        )}
      </div>
      <div className="card-body py-2">
        {category && (
          <Link href={`/shop?category=${encodeURIComponent(category)}`} className="product-meta d-block fs-xs pb-1">
            {category}
          </Link>
        )}
        <h3 className="product-title fs-sm">
          <Link href={`/product/${id}`}>
            {displayName || name}
          </Link>
        </h3>
        <div className="d-flex justify-content-between">
          <div className="product-price">
            {discountPercentage > 0 ? (
              <>
                <span className="text-accent">{formattedDiscountedPrice}</span>
                <del className="fs-sm text-muted">{formattedPrice}</del>
              </>
            ) : (
              <span className="text-accent">{formattedPrice}</span>
            )}
          </div>
        </div>
      </div>
      <div className="card-footer">
        <button 
          className="btn btn-primary btn-sm d-block w-100 mb-2" 
          type="button"
          onClick={addToCart}
        >
          <i className="bi bi-cart me-1"></i>Add to Cart
        </button>
      </div>
    </div>
  );
};

export default ProductCard; 