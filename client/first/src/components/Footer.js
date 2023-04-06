import React from 'react';
import './Footer.css';
import { Button } from './Button';
import { Link } from 'react-router-dom';

function Footer() {
  return (
    <div className='footer-container'>
      <section className='footer-subscription'>
        <p className='footer-subscription-heading'>
          Subscribe to our newsletter for getting the latest updates
        </p>
        <p className='footer-subscription-text'>
          You can unsubscribe at any time.
        </p>
        <div className='input-areas'>
          <form>
            <input
              className='footer-input'
              name='email'
              type='email'
              placeholder='Your Email'
            />
            <Button buttonStyle='btn--outline'>Subscribe</Button>
          </form>
        </div>
      </section>
<<<<<<< HEAD
      <div className='footer-links'>
        <div className='footer-link-wrapper'>
          <div className='footer-link-items'>
=======
      <div class='footer-links'>
        <div className='footer-link-wrapper'>
          <div class='footer-link-items'>
>>>>>>> 75c7fb428a3e8782cf898d8676560e49ea7228ab
            <h2>About Us</h2>
            <Link to='/sign-up'>How it works</Link>
            <Link to='/'>Testimonials</Link>
            <Link to='/'>Careers</Link>
            <Link to='/'>Investors</Link>
            <Link to='/'>Terms of Service</Link>
          </div>
<<<<<<< HEAD
          <div className='footer-link-items'>
=======
          <div class='footer-link-items'>
>>>>>>> 75c7fb428a3e8782cf898d8676560e49ea7228ab
            <h2>Contact Us</h2>
            <Link to='/'>Contact</Link>
            <Link to='/'>Support</Link>
            <Link to='/'>Destinations</Link>
            <Link to='/'>Sponsorships</Link>
          </div>
        </div>
        <div className='footer-link-wrapper'>
<<<<<<< HEAD
          <div className='footer-link-items'>
=======
          <div class='footer-link-items'>
>>>>>>> 75c7fb428a3e8782cf898d8676560e49ea7228ab
            <h2>Videos</h2>
            <Link to='/'>Submit Video</Link>
            <Link to='/'>Ambassadors</Link>
            <Link to='/'>Agency</Link>
            <Link to='/'>Influencer</Link>
          </div>
<<<<<<< HEAD
          <div className='footer-link-items'>
=======
          <div class='footer-link-items'>
>>>>>>> 75c7fb428a3e8782cf898d8676560e49ea7228ab
            <h2>Social Media</h2>
            <Link to='/'>Instagram</Link>
            <Link to='/'>Facebook</Link>
            <Link to='/'>Youtube</Link>
            <Link to='/'>Twitter</Link>
          </div>
        </div>
      </div>
<<<<<<< HEAD
      <section className='social-media'>
        <div className='social-media-wrap'>
          <div className='footer-logo'>
=======
      <section class='social-media'>
        <div class='social-media-wrap'>
          <div class='footer-logo'>
>>>>>>> 75c7fb428a3e8782cf898d8676560e49ea7228ab
            <Link to='/' className='social-logo'>
            PRODDEO
            <i className="fa-solid fa-diagram-project"/>
            </Link>
          </div>
<<<<<<< HEAD
          <small className='website-rights'>PRODDEO @ 2023</small>
          <div className='social-icons'>
            <Link
              className='social-icon-link facebook'
=======
          <small class='website-rights'>PRODDEO @ 2023</small>
          <div class='social-icons'>
            <Link
              class='social-icon-link facebook'
>>>>>>> 75c7fb428a3e8782cf898d8676560e49ea7228ab
              to='/'
              target='_blank'
              aria-label='Facebook'
            >
<<<<<<< HEAD
              <i className='fab fa-facebook-f' />
            </Link>
            <Link
              className='social-icon-link instagram'
=======
              <i class='fab fa-facebook-f' />
            </Link>
            <Link
              class='social-icon-link instagram'
>>>>>>> 75c7fb428a3e8782cf898d8676560e49ea7228ab
              to='/'
              target='_blank'
              aria-label='Instagram'
            >
<<<<<<< HEAD
              <i className='fab fa-instagram' />
            </Link>
            <Link
              className='social-icon-link youtube'
=======
              <i class='fab fa-instagram' />
            </Link>
            <Link
              class='social-icon-link youtube'
>>>>>>> 75c7fb428a3e8782cf898d8676560e49ea7228ab
              to='/'
              target='_blank'
              aria-label='Youtube'
            >
<<<<<<< HEAD
              <i className='fab fa-youtube' />
            </Link>
            <Link
              className='social-icon-link twitter'
=======
              <i class='fab fa-youtube' />
            </Link>
            <Link
              class='social-icon-link twitter'
>>>>>>> 75c7fb428a3e8782cf898d8676560e49ea7228ab
              to='/'
              target='_blank'
              aria-label='Twitter'
            >
<<<<<<< HEAD
              <i className='fab fa-twitter' />
            </Link>
            <Link
              className='social-icon-link twitter'
=======
              <i class='fab fa-twitter' />
            </Link>
            <Link
              class='social-icon-link twitter'
>>>>>>> 75c7fb428a3e8782cf898d8676560e49ea7228ab
              to='/'
              target='_blank'
              aria-label='LinkedIn'
            >
<<<<<<< HEAD
              <i className='fab fa-linkedin' />
=======
              <i class='fab fa-linkedin' />
>>>>>>> 75c7fb428a3e8782cf898d8676560e49ea7228ab
            </Link>
          </div>
        </div>
      </section>
    </div>
  );
}

export default Footer;