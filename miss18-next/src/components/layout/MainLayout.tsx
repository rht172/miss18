'use client';

import { ReactNode, useState, useEffect } from 'react';
import Header from './Header';
import Footer from './Footer';
import { Container } from 'react-bootstrap';

interface MainLayoutProps {
  children: ReactNode;
}

const MainLayout: React.FC<MainLayoutProps> = ({ children }) => {
  const [customerName, setCustomerName] = useState<string | undefined>(undefined);
  
  useEffect(() => {
    // Check if user is logged in and get customer name from localStorage
    const userDataString = localStorage.getItem('user');
    if (userDataString) {
      try {
        const userData = JSON.parse(userDataString);
        setCustomerName(userData.name);
      } catch (error) {
        console.error('Error parsing user data:', error);
      }
    }
  }, []);
  
  return (
    <div className="page-wrapper">
      <Header customerName={customerName} />
      <main className="page-main">
        {children}
      </main>
      <Footer />
    </div>
  );
};

export default MainLayout; 