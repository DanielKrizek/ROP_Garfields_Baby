import React, { useState } from 'react';
import './register.scss';

const Register: React.FC = () => {
  const [username, setUsername] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');

  const handleRegister = (event: React.FormEvent) => {
    event.preventDefault();
    console.log('Username:', username);
    console.log('Email:', email);
    console.log('Password:', password);
  };

  return (
    <div className="register">
      <h1>Registrace</h1>
      <form onSubmit={handleRegister}>
        <div>
          <label>Uživatelské jméno:</label>
          <input
            type="text"
            value={username}
            onChange={(e) => setUsername(e.target.value)}
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
        Máte již účet? <a href="/login">Přihlaste se zde</a>
      </p>
    </div>
  );
};

export default Register;
