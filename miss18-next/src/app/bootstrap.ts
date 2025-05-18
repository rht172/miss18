'use client';

// This file ensures Bootstrap JavaScript is initialized for client components
import { useEffect } from 'react';

// Import Bootstrap JS
export const Bootstrap = () => {
  useEffect(() => {
    // Import Bootstrap JS
    import('bootstrap/dist/js/bootstrap.bundle.min.js')
      .then(() => console.log('Bootstrap JS loaded'))
      .catch((err) => console.error('Failed to load Bootstrap JS', err));
  }, []);
  
  return null;
};

export default Bootstrap; 