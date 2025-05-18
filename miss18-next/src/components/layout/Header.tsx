'use client';

import { useState, useEffect } from 'react';
import Link from 'next/link';
import Image from 'next/image';
import { useRouter } from 'next/navigation';
import { Container, Navbar, Nav } from 'react-bootstrap';

interface HeaderProps {
  customerName?: string;
}

const Header: React.FC<HeaderProps> = ({ customerName }) => {
  const router = useRouter();
  const [cartCount, setCartCount] = useState<number>(0);
  const apiUrl = process.env.NEXT_PUBLIC_API_URL || 'http://localhost:4000/api';
  
  useEffect(() => {
    // Fetch cart count from API if user is logged in
    const fetchCartCount = async () => {
      if (localStorage.getItem('token')) {
        try {
          const response = await fetch(`${apiUrl}/cart/count`, {
            headers: {
              'Authorization': `Bearer ${localStorage.getItem('token')}`
            }
          });
          
          if (response.ok) {
            const data = await response.json();
            setCartCount(data.count || 0);
          }
        } catch (error) {
          console.error('Error fetching cart count:', error);
        }
      }
    };
    
    fetchCartCount();
  }, [apiUrl]);
  
  const handleLogout = () => {
    localStorage.removeItem('token');
    localStorage.removeItem('user');
    router.push('/');
  };
  
  return (
    <>
      {/* Desktop Header */}
      <header className="platypi for_desktop">
        <div className="navbar-sticky bg-light">
          <div className="navbar navbar-expand-lg navbar-light">
            <Container>
              <Link href="/" className="navbar-brand d-none d-sm-block flex-shrink-0">
                <Image src="/images/logo/logo.png" width={142} height={50} alt="miss18" />
              </Link>
              
              <div className="input-group d-none d-lg-flex justify-content-center mx-4">
                <div className="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
                  <div className="container">
                    <div className="collapse navbar-collapse" id="navbarCollapse">
                      <Nav className="navbar-nav">
                        <Nav.Item>
                          <Link href="/" className="nav-link">Home</Link>
                        </Nav.Item>
                        <Nav.Item>
                          <Link href="/shop" className="nav-link">Shop</Link>
                        </Nav.Item>
                        <Nav.Item>
                          <Link href="/about" className="nav-link">About Us</Link>
                        </Nav.Item>
                      </Nav>
                    </div>
                  </div>
                </div>
              </div>
              
              <div className="navbar-toolbar d-flex flex-shrink-0 align-items-center">
                <button 
                  className="navbar-toggler" 
                  type="button" 
                  data-bs-toggle="collapse" 
                  data-bs-target="#navbarCollapse"
                >
                  <span className="navbar-toggler-icon"></span>
                </button>
                
                {customerName ? (
                  <Link href="/account/profile" className="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2">
                    <div className="navbar-tool-icon-box">
                      <i className="navbar-tool-icon bi bi-person"></i>
                    </div>
                    <div className="navbar-tool-text ms-n3">
                      {customerName}
                    </div>
                  </Link>
                ) : (
                  <Link href="/login" className="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2">
                    <div className="navbar-tool-icon-box">
                      <i className="navbar-tool-icon bi bi-person"></i>
                    </div>
                    <div className="navbar-tool-text ms-n3">
                      <small>Hello, Sign in</small>My Account
                    </div>
                  </Link>
                )}
                
                <div className="navbar-tool ms-3">
                  <Link href="/wishlist" className="navbar-tool d-none d-lg-flex">
                    <span className="navbar-tool-tooltip">Wishlist</span>
                    <div className="navbar-tool-icon-box">
                      <i className="navbar-tool-icon bi bi-heart"></i>
                    </div>
                  </Link>
                  
                  <Link href="/cart" className="navbar-tool-icon-box bg-secondary">
                    {cartCount > 0 && (
                      <span className="navbar-tool-label">{cartCount}</span>
                    )}
                    <i className="navbar-tool-icon bi bi-cart"></i>
                  </Link>
                </div>
              </div>
            </Container>
          </div>
        </div>
      </header>
      
      {/* Mobile Header */}
      <header className="shadow-sm for_mobile">
        <div className="navbar-sticky bg-light">
          <div className="navbar navbar-expand-lg navbar-light p-0">
            <Container>
              <Link href="/" className="navbar-brand d-none d-sm-block flex-shrink-0">
                <Image 
                  src="/images/logo/logo.png" 
                  width={80} 
                  height={30} 
                  alt="miss18" 
                  className="img-fluid" 
                />
              </Link>
              <Link href="/" className="navbar-brand d-sm-none flex-shrink-0 me-2">
                <Image 
                  src="/images/logo/logo.png" 
                  width={74} 
                  height={30} 
                  alt="miss18" 
                />
              </Link>
              
              <div className="navbar-toolbar d-flex flex-shrink-0 align-items-center">
                <button 
                  className="navbar-toggler" 
                  type="button" 
                  data-bs-toggle="collapse" 
                  id="colloapse_fun"
                >
                  <span className="navbar-toggler-icon"></span>
                </button>
                
                <Link href="/wishlist" className="navbar-tool d-none d-lg-flex">
                  <span className="navbar-tool-tooltip">Wishlist</span>
                  <div className="navbar-tool-icon-box">
                    <i className="navbar-tool-icon bi bi-heart"></i>
                  </div>
                </Link>
                
                {customerName ? (
                  <Link href="/account/profile" className="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2">
                    <div className="navbar-tool-icon-box">
                      <i className="navbar-tool-icon bi bi-person"></i>
                    </div>
                    <div className="navbar-tool-text ms-n3">
                      {customerName}
                    </div>
                  </Link>
                ) : (
                  <Link href="/login" className="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2">
                    <div className="navbar-tool-icon-box">
                      <i className="navbar-tool-icon bi bi-person"></i>
                    </div>
                    <div className="navbar-tool-text ms-n3">
                      <small>Hello, Sign in</small>My Account
                    </div>
                  </Link>
                )}
              </div>
            </Container>
          </div>
          
          <div className="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
            <Container>
              <div className="collapse navbar-collapse d-lg-flex justify-content-center" id="navbarCollapse_1">
                <Nav className="navbar-nav">
                  <Nav.Item>
                    <Link href="/" className="nav-link">Home</Link>
                  </Nav.Item>
                  <Nav.Item>
                    <Link href="/shop" className="nav-link">Shop</Link>
                  </Nav.Item>
                  <Nav.Item>
                    <Link href="/about" className="nav-link">About</Link>
                  </Nav.Item>
                </Nav>
              </div>
            </Container>
          </div>
        </div>
      </header>
    </>
  );
};

export default Header; 