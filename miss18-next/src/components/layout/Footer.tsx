'use client';

import Link from 'next/link';
import Image from 'next/image';
import { Container, Row, Col } from 'react-bootstrap';

const Footer: React.FC = () => {
  return (
    <footer className="footer bg-dark pt-5">
      <div className="container">
        <div className="row pb-2">
          <div className="col-md-4 col-sm-6">
            <div className="widget widget-links widget-light pb-2 mb-4">
              <h3 className="widget-title text-light">Shop departments</h3>
              <ul className="widget-list">
                <li className="widget-list-item">
                  <Link className="widget-list-link" href="/shop?category=Tops">Tops</Link>
                </li>
                <li className="widget-list-item">
                  <Link className="widget-list-link" href="/shop?category=Crop%20Top">Crop Top</Link>
                </li>
                <li className="widget-list-item">
                  <Link className="widget-list-link" href="/shop?category=Sweater">Sweater</Link>
                </li>
                <li className="widget-list-item">
                  <Link className="widget-list-link" href="/shop?category=T%20Shirt">T Shirt</Link>
                </li>
                <li className="widget-list-item">
                  <Link className="widget-list-link" href="/shop?category=Skirt">Skirt</Link>
                </li>
                <li className="widget-list-item">
                  <Link className="widget-list-link" href="/shop?category=Dresses">Dresses</Link>
                </li>
                <li className="widget-list-item">
                  <Link className="widget-list-link" href="/shop?category=Shrugs">Shrugs</Link>
                </li>
              </ul>
            </div>
          </div>
          <div className="col-md-4 col-sm-6">
            <div className="widget widget-links widget-light pb-2 mb-4">
              <h3 className="widget-title text-light">Account &amp; shipping info</h3>
              <ul className="widget-list">
                <li className="widget-list-item">
                  <Link className="widget-list-link" href="/account/profile">Your account</Link>
                </li>
                <li className="widget-list-item">
                  <Link className="widget-list-link" href="/account/orders">Orders history</Link>
                </li>
                <li className="widget-list-item">
                  <Link className="widget-list-link" href="/account/wishlist">Wishlist</Link>
                </li>
                <li className="widget-list-item">
                  <Link className="widget-list-link" href="/shipping-policy">Shipping policy</Link>
                </li>
                <li className="widget-list-item">
                  <Link className="widget-list-link" href="/refund-policy">Return policy</Link>
                </li>
              </ul>
            </div>
            <div className="widget widget-links widget-light pb-2 mb-4">
              <h3 className="widget-title text-light">About us</h3>
              <ul className="widget-list">
                <li className="widget-list-item">
                  <Link className="widget-list-link" href="/about">About company</Link>
                </li>
                <li className="widget-list-item">
                  <Link className="widget-list-link" href="/contact">Contact</Link>
                </li>
                <li className="widget-list-item">
                  <Link className="widget-list-link" href="/science">Our science</Link>
                </li>
              </ul>
            </div>
          </div>
          <div className="col-md-4">
            <div className="widget pb-2 mb-4">
              <h3 className="widget-title text-light pb-1">Stay informed</h3>
              <form className="subscription-form validate" action="#" method="post" name="mc-embedded-subscribe-form">
                <div className="input-group flex-nowrap">
                  <i className="ci-mail position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                  <input className="form-control rounded-start" type="email" name="EMAIL" placeholder="Your email" required />
                  <button className="btn btn-primary" type="submit" name="subscribe">Subscribe*</button>
                </div>
                <div className="form-text text-light opacity-50">*Subscribe to our newsletter to receive early discount offers, updates and new products info.</div>
                <div className="subscription-status"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div className="pt-5 bg-darker">
        <div className="container">
          <div className="row pb-3">
            <div className="col-md-3 col-sm-6 mb-4">
              <div className="d-flex">
                <i className="ci-rocket text-primary" style={{ fontSize: '2.25rem' }}></i>
                <div className="ps-3">
                  <h6 className="fs-base text-light mb-1">Fast and free delivery</h6>
                  <p className="mb-0 fs-ms text-light opacity-50">Free delivery for all orders above Rs 499</p>
                </div>
              </div>
            </div>
            <div className="col-md-3 col-sm-6 mb-4">
              <div className="d-flex">
                <i className="ci-currency-exchange text-primary" style={{ fontSize: '2.25rem' }}></i>
                <div className="ps-3">
                  <h6 className="fs-base text-light mb-1">Money back guarantee</h6>
                  <p className="mb-0 fs-ms text-light opacity-50">We return money within 30 days</p>
                </div>
              </div>
            </div>
            <div className="col-md-3 col-sm-6 mb-4">
              <div className="d-flex">
                <i className="ci-support text-primary" style={{ fontSize: '2.25rem' }}></i>
                <div className="ps-3">
                  <h6 className="fs-base text-light mb-1">24/7 customer support</h6>
                  <p className="mb-0 fs-ms text-light opacity-50">Friendly 24/7 customer support</p>
                </div>
              </div>
            </div>
            <div className="col-md-3 col-sm-6 mb-4">
              <div className="d-flex">
                <i className="ci-card text-primary" style={{ fontSize: '2.25rem' }}></i>
                <div className="ps-3">
                  <h6 className="fs-base text-light mb-1">Secure online payment</h6>
                  <p className="mb-0 fs-ms text-light opacity-50">We possess SSL / Secure certificate</p>
                </div>
              </div>
            </div>
          </div>
          <hr className="hr-light mb-5" />
          <div className="row pb-2">
            <div className="col-md-6 text-center text-md-start mb-4">
              <div className="text-nowrap mb-4">
                <Link className="d-inline-block align-middle mt-n1 me-3" href="/">
                  <Image src="/images/logo/logo.png" width={117} height={50} alt="Miss18" />
                </Link>
              </div>
              <div className="widget widget-links widget-light">
                <ul className="widget-list d-flex flex-wrap justify-content-center justify-content-md-start">
                  <li className="widget-list-item me-4">
                    <Link className="widget-list-link" href="/about">About us</Link>
                  </li>
                  <li className="widget-list-item me-4">
                    <Link className="widget-list-link" href="/shop">Shop</Link>
                  </li>
                  <li className="widget-list-item me-4">
                    <Link className="widget-list-link" href="/terms-conditions">Terms &amp; Conditions</Link>
                  </li>
                  <li className="widget-list-item me-4">
                    <Link className="widget-list-link" href="/privacy-policy">Privacy &amp; cookies</Link>
                  </li>
                </ul>
              </div>
            </div>
            <div className="col-md-6 text-center text-md-end mb-4">
              <div className="mb-3">
                <a className="btn-social bs-light bs-instagram ms-2 mb-2" href="#"><i className="ci-instagram"></i></a>
                <a className="btn-social bs-light bs-facebook ms-2 mb-2" href="#"><i className="ci-facebook"></i></a>
                <a className="btn-social bs-light bs-twitter ms-2 mb-2" href="#"><i className="ci-twitter"></i></a>
                <a className="btn-social bs-light bs-youtube ms-2 mb-2" href="#"><i className="ci-youtube"></i></a>
              </div>
              <img className="d-inline-block" src="/images/cards.png" width="187" alt="Payment methods" />
            </div>
          </div>
          <div className="pb-4 fs-xs text-light opacity-50 text-center text-md-start">
            © All rights reserved. Made with <i className="bi bi-heart text-danger align-middle"></i> by Miss18
          </div>
        </div>
      </div>
    </footer>
  );
};

export default Footer; 