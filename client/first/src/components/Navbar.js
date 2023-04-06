import React, { useState, useEffect } from 'react';
import { Button } from './Button';
import { Link } from 'react-router-dom';
import './Navbar.css';

function Navbar() {
  const [click, setClick] = useState(false);
  const [button, setButton] = useState(true);

  const handleClick = () => setClick(!click);
  const closeMobileMenu = () => setClick(false);

  const showButton = () => {
    if (window.innerWidth <= 960) {
      setButton(false);
    } else {
      setButton(true);
    }
  };

  useEffect(() => {
    showButton();
  }, []);

  window.addEventListener('resize', showButton);

  return (
    <>
      <nav className='navbar'>
        <div className='navbar-container'>
          <Link to='/' className='navbar-logo' onClick={closeMobileMenu}>
            PRODDEO
            <i className="fa-solid fa-diagram-project"/>
          </Link>
          <div className='menu-icon' onClick={handleClick}>
            <i className={click ? 'fas fa-times' : 'fas fa-bars'} />
          </div>
          <ul className={click ? 'nav-menu active' : 'nav-menu'}>
            <li className='nav-item'>
              <Link to='/' className='nav-links' onClick={closeMobileMenu}>
                Home
              </Link>
            </li>
            <li className='nav-item'>
              <Link
                to='/features'
                className='nav-links'
                onClick={closeMobileMenu}
              >
                Features
              </Link>
            </li>
            <li className='nav-item'> 
              <Link
                to='/discover'
                className='nav-links'
                onClick={closeMobileMenu}
              >
                Discover
              </Link>
            </li>
            <li className='nav-item'>
              <Link
                to='/feedback'
                className='nav-links'
                onClick={closeMobileMenu}
              >
                Feedback
              </Link>
            </li>

            <li>
              <Link
<<<<<<< HEAD
                to = '/sign-up'
=======
                to='/sign-up'
>>>>>>> 75c7fb428a3e8782cf898d8676560e49ea7228ab
                className='nav-links-mobile'
                onClick={closeMobileMenu}
              >
                Sign Up
              </Link>
            </li>
          </ul>
          {button && <Button buttonStyle='btn--outline'>SIGN UP</Button>}
        </div>
      </nav>
    </>
  );
}

export default Navbar;