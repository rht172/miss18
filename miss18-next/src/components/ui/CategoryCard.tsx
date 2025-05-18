'use client';

import Link from 'next/link';
import Image from 'next/image';

interface CategoryCardProps {
  imageUrl: string;
  hoverImageUrl?: string;
  title: string;
  category: string;
}

const CategoryCard: React.FC<CategoryCardProps> = ({ 
  imageUrl, 
  hoverImageUrl, 
  title, 
  category 
}) => {
  return (
    <article>
      <Link 
        href={`/shop?category=${encodeURIComponent(category)}`}
        className="d-block mb-3 image-container"
      >
        <Image
          src={imageUrl}
          width={300}
          height={400}
          alt={title}
          className="rounded-3"
        />
        {hoverImageUrl && (
          <Image
            src={hoverImageUrl}
            width={300}
            height={400}
            alt={title}
            className="hover-image rounded-3"
          />
        )}
        <h2 className="h6 blog-entry-title mb-0 d-flex justify-content-center align-items-center mt-5">
          {title}
        </h2>
      </Link>
    </article>
  );
};

export default CategoryCard; 