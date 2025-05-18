/**
 * Utility function to normalize image paths
 * This ensures all image paths are properly formatted for Next.js Image component
 */

/**
 * Normalizes image path to ensure it's properly formatted
 * @param imagePath The image path to normalize
 * @param defaultPath Default path to use if imagePath is missing
 * @returns Normalized image path
 */
export const normalizeImagePath = (
  imagePath?: string,
  defaultPath = '/images/placeholder.jpg'
): string => {
  if (!imagePath) {
    return defaultPath;
  }

  // If path already starts with http(s):// or /, return as is
  if (imagePath.startsWith('http') || imagePath.startsWith('/')) {
    return imagePath;
  }

  // Otherwise, prepend /
  return `/${imagePath}`;
};

/**
 * Get image dimensions based on the image type
 * @param imageType Type of image (e.g., 'product', 'thumbnail', 'category')
 * @returns Object with width and height
 */
export const getImageDimensions = (
  imageType: 'product' | 'thumbnail' | 'category' | 'banner' = 'product'
): { width: number; height: number } => {
  switch (imageType) {
    case 'product':
      return { width: 600, height: 800 };
    case 'thumbnail':
      return { width: 100, height: 100 };
    case 'category':
      return { width: 300, height: 300 };
    case 'banner':
      return { width: 1200, height: 400 };
    default:
      return { width: 600, height: 800 };
  }
}; 