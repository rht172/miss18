'use client';

import { useState, FormEvent, useEffect } from 'react';
import { useRouter, useSearchParams } from 'next/navigation';
import Link from 'next/link';
import { Container, Row, Col, Form, Button, Card, Nav, Alert } from 'react-bootstrap';
import MainLayout from '@/components/layout/MainLayout';

export default function Login() {
  const router = useRouter();
  const searchParams = useSearchParams();
  
  // Get redirect parameter
  const redirect = searchParams.get('redirect') || '';
  const error = searchParams.get('error') || '';
  
  // State for login form
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [showPassword, setShowPassword] = useState(false);
  const [loginError, setLoginError] = useState('');
  
  // State for signup form
  const [firstName, setFirstName] = useState('');
  const [lastName, setLastName] = useState('');
  const [signupEmail, setSignupEmail] = useState('');
  const [signupPassword, setSignupPassword] = useState('');
  const [confirmPassword, setConfirmPassword] = useState('');
  const [signupError, setSignupError] = useState('');
  
  // Tab state
  const [activeTab, setActiveTab] = useState('signin');
  
  // API URL
  const apiUrl = process.env.NEXT_PUBLIC_API_URL || 'http://localhost:4000/api';
  
  useEffect(() => {
    // Show error message if provided in URL
    if (error === 'invalid') {
      setLoginError('Invalid email or password. Please try again.');
    } else if (error === 'password_mismatch') {
      setActiveTab('signup');
      setSignupError('Passwords do not match. Please try again.');
    }
    
    // Check if user is already logged in
    const token = localStorage.getItem('token');
    if (token) {
      if (redirect) {
        router.push(redirect);
      } else {
        router.push('/');
      }
    }
  }, [error, redirect, router]);
  
  const handleLoginSubmit = async (e: FormEvent) => {
    e.preventDefault();
    setLoginError('');
    
    try {
      // In a real app, you would make an API call to the backend
      // For now, let's use mock authentication
      if (email === 'user@example.com' && password === 'password') {
        // Mock successful login
        const mockUserData = {
          name: 'John Doe',
          email: email,
          id: '12345'
        };
        
        // Set token and user data in localStorage
        localStorage.setItem('token', 'mock-jwt-token');
        localStorage.setItem('user', JSON.stringify(mockUserData));
        
        // Redirect user
        if (redirect) {
          router.push(redirect);
        } else {
          router.push('/');
        }
      } else {
        setLoginError('Invalid email or password. Please try again.');
      }
      
      // In a real app, you would use code like this:
      /*
      const response = await fetch(`${apiUrl}/auth/login`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({ email, password })
      });
      
      if (response.ok) {
        const data = await response.json();
        localStorage.setItem('token', data.token);
        localStorage.setItem('user', JSON.stringify(data.user));
        
        if (redirect) {
          router.push(redirect);
        } else {
          router.push('/');
        }
      } else {
        const errorData = await response.json();
        setLoginError(errorData.message || 'Login failed. Please try again.');
      }
      */
    } catch (error) {
      console.error('Login error:', error);
      setLoginError('An error occurred. Please try again later.');
    }
  };
  
  const handleSignupSubmit = async (e: FormEvent) => {
    e.preventDefault();
    setSignupError('');
    
    // Validate passwords match
    if (signupPassword !== confirmPassword) {
      setSignupError('Passwords do not match');
      return;
    }
    
    try {
      // In a real app, you would make an API call to register the user
      // For now, use mock registration
      alert('Account created successfully! Please sign in.');
      setActiveTab('signin');
      setEmail(signupEmail);
      
      // Clear signup form
      setFirstName('');
      setLastName('');
      setSignupEmail('');
      setSignupPassword('');
      setConfirmPassword('');
      
      // In a real app, you would use code like this:
      /*
      const response = await fetch(`${apiUrl}/auth/register`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          firstName,
          lastName,
          email: signupEmail,
          password: signupPassword
        })
      });
      
      if (response.ok) {
        alert('Account created successfully! Please sign in.');
        setActiveTab('signin');
        setEmail(signupEmail);
        
        // Clear signup form
        setFirstName('');
        setLastName('');
        setSignupEmail('');
        setSignupPassword('');
        setConfirmPassword('');
      } else {
        const errorData = await response.json();
        setSignupError(errorData.message || 'Registration failed. Please try again.');
      }
      */
    } catch (error) {
      console.error('Registration error:', error);
      setSignupError('An error occurred. Please try again later.');
    }
  };
  
  return (
    <MainLayout>
      <div className="bg-secondary py-4">
        <Container>
          <h1 className="h3 text-center mb-0">Account</h1>
        </Container>
      </div>
      
      <Container className="py-5">
        <Row className="justify-content-center">
          <Col md={8} lg={6}>
            <Card>
              <Card.Header className="bg-secondary">
                <Nav variant="tabs" className="card-header-tabs">
                  <Nav.Item>
                    <Nav.Link
                      className={activeTab === 'signin' ? 'active' : ''}
                      onClick={() => setActiveTab('signin')}
                    >
                      <i className="bi bi-unlock me-2"></i>Sign in
                    </Nav.Link>
                  </Nav.Item>
                  <Nav.Item>
                    <Nav.Link
                      className={activeTab === 'signup' ? 'active' : ''}
                      onClick={() => setActiveTab('signup')}
                    >
                      <i className="bi bi-person me-2"></i>Sign up
                    </Nav.Link>
                  </Nav.Item>
                </Nav>
              </Card.Header>
              
              <Card.Body className="py-4">
                {activeTab === 'signin' ? (
                  <>
                    {loginError && (
                      <Alert variant="danger" dismissible onClose={() => setLoginError('')}>
                        {loginError}
                      </Alert>
                    )}
                    
                    <Form onSubmit={handleLoginSubmit}>
                      <Form.Group className="mb-3">
                        <Form.Label>Email address</Form.Label>
                        <Form.Control
                          type="email"
                          placeholder="example@example.com"
                          value={email}
                          onChange={(e) => setEmail(e.target.value)}
                          required
                        />
                      </Form.Group>
                      
                      <Form.Group className="mb-3">
                        <Form.Label>Password</Form.Label>
                        <div className="input-group">
                          <Form.Control
                            type={showPassword ? 'text' : 'password'}
                            value={password}
                            onChange={(e) => setPassword(e.target.value)}
                            required
                          />
                          <Button
                            variant="outline-secondary"
                            onClick={() => setShowPassword(!showPassword)}
                          >
                            <i className={`bi bi-eye${showPassword ? '-slash' : ''}`}></i>
                          </Button>
                        </div>
                      </Form.Group>
                      
                      <div className="mb-3 d-flex justify-content-between">
                        <Form.Check
                          type="checkbox"
                          id="rememberMe"
                          label="Remember me"
                        />
                        <Link href="/forgot-password" className="text-decoration-none">
                          Forgot password?
                        </Link>
                      </div>
                      
                      <Button variant="primary" type="submit" className="w-100">
                        Sign in
                      </Button>
                    </Form>
                    
                    <div className="text-center mt-4">
                      <p className="text-muted mb-2">Or sign in with</p>
                      <div className="d-flex gap-2 justify-content-center">
                        <Button variant="outline-primary">
                          <i className="bi bi-google me-1"></i> Google
                        </Button>
                        <Button variant="outline-primary">
                          <i className="bi bi-facebook me-1"></i> Facebook
                        </Button>
                      </div>
                    </div>
                  </>
                ) : (
                  <>
                    {signupError && (
                      <Alert variant="danger" dismissible onClose={() => setSignupError('')}>
                        {signupError}
                      </Alert>
                    )}
                    
                    <Form onSubmit={handleSignupSubmit}>
                      <Row>
                        <Col md={6}>
                          <Form.Group className="mb-3">
                            <Form.Label>First name</Form.Label>
                            <Form.Control
                              type="text"
                              placeholder="First name"
                              value={firstName}
                              onChange={(e) => setFirstName(e.target.value)}
                              required
                            />
                          </Form.Group>
                        </Col>
                        <Col md={6}>
                          <Form.Group className="mb-3">
                            <Form.Label>Last name</Form.Label>
                            <Form.Control
                              type="text"
                              placeholder="Last name"
                              value={lastName}
                              onChange={(e) => setLastName(e.target.value)}
                              required
                            />
                          </Form.Group>
                        </Col>
                      </Row>
                      
                      <Form.Group className="mb-3">
                        <Form.Label>Email address</Form.Label>
                        <Form.Control
                          type="email"
                          placeholder="example@example.com"
                          value={signupEmail}
                          onChange={(e) => setSignupEmail(e.target.value)}
                          required
                        />
                        <Form.Text className="text-muted">
                          We'll never share your email with anyone else.
                        </Form.Text>
                      </Form.Group>
                      
                      <Form.Group className="mb-3">
                        <Form.Label>Password</Form.Label>
                        <div className="input-group">
                          <Form.Control
                            type={showPassword ? 'text' : 'password'}
                            value={signupPassword}
                            onChange={(e) => setSignupPassword(e.target.value)}
                            required
                            minLength={8}
                          />
                          <Button
                            variant="outline-secondary"
                            onClick={() => setShowPassword(!showPassword)}
                          >
                            <i className={`bi bi-eye${showPassword ? '-slash' : ''}`}></i>
                          </Button>
                        </div>
                        <Form.Text className="text-muted">
                          Password must be at least 8 characters long.
                        </Form.Text>
                      </Form.Group>
                      
                      <Form.Group className="mb-3">
                        <Form.Label>Confirm password</Form.Label>
                        <Form.Control
                          type={showPassword ? 'text' : 'password'}
                          value={confirmPassword}
                          onChange={(e) => setConfirmPassword(e.target.value)}
                          required
                        />
                      </Form.Group>
                      
                      <Form.Group className="mb-3">
                        <Form.Check
                          type="checkbox"
                          id="termsCheck"
                          label="I agree to the terms and conditions"
                          required
                        />
                      </Form.Group>
                      
                      <Button variant="primary" type="submit" className="w-100">
                        Sign up
                      </Button>
                    </Form>
                  </>
                )}
              </Card.Body>
            </Card>
          </Col>
        </Row>
      </Container>
    </MainLayout>
  );
} 