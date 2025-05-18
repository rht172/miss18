'use client';

import { useState, useEffect } from 'react';
import Link from 'next/link';
import Image from 'next/image';
import Slider from 'react-slick';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';

interface SliderImage {
  id: number;
  imageUrl: string;
  category?: string;
}

const HomeSlider: React.FC = () => {
  const [sliderImages, setSliderImages] = useState<SliderImage[]>([]);
  const [loading, setLoading] = useState(true);
  
  useEffect(() => {
    const fetchSliderImages = async () => {
      try {
        // In a real app, you would fetch this from the API
        // For now, we'll use static data based on the original PHP site
        setSliderImages([
          {
            id: 1,
            imageUrl: '/images/sliders/slider-1.jpg',
            category: 'Tops'
          },
          {
            id: 2,
            imageUrl: '/images/sliders/slider-2.jpg',
            category: 'Dresses'
          },
          {
            id: 3,
            imageUrl: '/images/sliders/slider-3.jpg',
            category: 'Skirt'
          }
        ]);
        setLoading(false);
      } catch (error) {
        console.error('Error fetching slider images:', error);
        setLoading(false);
      }
    };
    
    fetchSliderImages();
  }, []);
  
  const sliderSettings = {
    dots: true,
    infinite: true,
    speed: 500,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000
  };
  
  if (loading) {
    return (
      <div className="slider-loading d-flex justify-content-center align-items-center">
        <div className="spinner-border text-primary" role="status">
          <span className="visually-hidden">Loading...</span>
        </div>
      </div>
    );
  }
  
  return (
    <section className="p-0">
      <Slider {...sliderSettings}>
        {sliderImages.map((slide) => (
          <div key={slide.id}>
            <Link href={slide.category ? `/shop?category=${slide.category}` : '/shop'}>
              <div className="position-relative">
                <Image 
                  src={slide.imageUrl} 
                  width={1920} 
                  height={600} 
                  alt={`Slider ${slide.id}`} 
                  className="d-block w-100" 
                  priority
                />
              </div>
            </Link>
          </div>
        ))}
      </Slider>
    </section>
  );
};

export default HomeSlider; 