import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import './navbar.scss';
import Login from '../login/login';

const Navbar: React.FC = () => {
  const [isLoginOpen, setIsLoginOpen] = useState(false);

  const openLogin = () => setIsLoginOpen(true);
  const closeLogin = () => setIsLoginOpen(false);

  useEffect(() => {
    document.body.style.overflow = isLoginOpen ? 'hidden' : 'auto';
  }, [isLoginOpen]);

  const [isOpen, setIsOpen] = useState(false);

  const toggleMenu = () => {
    setIsOpen(!isOpen);
  };

  const [dropdownOpen, setDropdownOpen] = useState(false);

  const toggleDropdown = () => setDropdownOpen(!dropdownOpen);

  return (
    <div className="navbar">
      <div className="navbar-left">
        <Link to="/" className="logo" style={{ zIndex: 2 }}>
          Garfield's Baby
        </Link>

        <Link to="/" className="logo">
          <img src="src/assets/images/logo.png" alt="logo" />
        </Link>
      </div>
      <div className="navbar-right">
        <button className="hamburger" onClick={toggleMenu}>
          <span className="line"></span>
          <span className="line"></span>
          <span className="line"></span>
        </button>
        <ul className={`menu ${isOpen ? 'active' : ''}`}>
          <li className={`dropdown ${dropdownOpen ? 'active' : ''}`}>
            <a href="#" onClick={toggleDropdown}>
              Kočičí smečka
            </a>
            <ul className={`dropdown-menu ${dropdownOpen ? 'active' : ''}`}>
              <li><Link to="/kotata">Koťata</Link></li>
              <li><Link to="/kocky">Kočky</Link></li>
              <li><Link to="/kocouri">Kocouři</Link></li>
              <li><Link to="/kastrati">Kastráti</Link></li>
              <li><Link to="/odchovy">Odchovy</Link></li>
            </ul>
          </li>
          <li><Link to="/plan">Plán</Link></li>
          <li><Link to="/fotogalerie">Fotogalerie</Link></li>
          <li><Link to="/novinky">Novinky</Link></li>
          <li><Link to="/kontakt">Kontakt</Link></li>
          <li><Link to="#" onClick={openLogin}>Přihlášení</Link></li>
        </ul>
      </div>
      {isLoginOpen && (
        <div className="modal">
          <div className="modal-content">
            <span className="close" onClick={closeLogin}>&times;</span>
            <Login />
          </div>
        </div>
      )}
    </div>
  );
};

export default Navbar;