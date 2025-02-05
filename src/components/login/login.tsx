import React, { useState } from 'react';
import './login.scss';

const Login: React.FC = () => {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [showRegister, setShowRegister] = useState(false);

  const handleSubmit = (event: React.FormEvent) => {
    event.preventDefault();
    console.log('Email:', email);
    console.log('Password:', password);
  };

  const handleRegisterClick = (event: React.MouseEvent) => {
    event.preventDefault();
    setShowRegister(true);
  };

  const handleRegister = (event: React.FormEvent) => {
    event.preventDefault();
    console.log('Email:', email);
    console.log('Password:', password);
  };

  return (
    <div className="login">
      {showRegister ? (
        <div>
          <h1>Registrace</h1>
          <form onSubmit={handleRegister}>
            <div>
              <label>Uživatelské jméno:</label>
              <input
                type="text"
                value={email}
                onChange={(e) => setEmail(e.target.value)}
                required
              />
            </div>
            <div>
              <label>Email:</label>
              <input
                type="email"
                value={email}
                onChange={(e) => setEmail(e.target.value)}
                required
              />
            </div>
            <div>
              <label>Heslo:</label>
              <input
                type="password"
                value={password}
                onChange={(e) => setPassword(e.target.value)}
                required
              />
            </div>
            <button type="submit">Zaregistrovat se</button>
          </form>
          <p>
            Máte již účet?{' '}
            <a href="#" onClick={() => setShowRegister(false)}>
              Přihlaste se zde
            </a>
          </p>
        </div>
      ) : (
        <div>
          <h1>Přihlášení</h1>
          <form onSubmit={handleSubmit}>
            <div>
              <label>Email:</label>
              <input
                type="email"
                value={email}
                onChange={(e) => setEmail(e.target.value)}
                required
              />
            </div>
            <div>
              <label>Heslo:</label>
              <input
                type="password"
                value={password}
                onChange={(e) => setPassword(e.target.value)}
                required
              />
            </div>
            <button type="submit">Přihlásit se</button>
          </form>
          <p>
            Nemáte účet?{' '}
            <a href="#" onClick={handleRegisterClick}>
              Zaregistrujte se zde
            </a>
          </p>
        </div>
      )}
    </div>
  );
};

export default Login;
