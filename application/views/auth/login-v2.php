<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | WisataMag</title>

  <!-- Font & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    :root {
      --primary-dark: #0e3c38;
      --primary-medium: #165b57;
      --primary-light: #20c997;
      --background: #e9f3f2;
      --text-light: #e8fffb;
      --text-muted: #a0d8d1;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #0e3c38 0%, #165b57 100%);
      color: var(--text-light);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow: hidden;
    }

    /* Background Pattern */
    body::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-image: 
        radial-gradient(circle at 20% 80%, rgba(32, 201, 151, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(174, 247, 222, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 40% 40%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
      z-index: -1;
    }

    .login-container {
      background: rgba(255, 255, 255, 0.95);
      border-radius: 20px;
      padding: 40px;
      width: 100%;
      max-width: 420px;
      box-shadow: 
        0 20px 40px rgba(14, 60, 56, 0.3),
        0 0 0 1px rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      text-align: center;
      position: relative;
      z-index: 1;
      margin: 20px;
    }

    /* Logo & Brand */
    .logo {
      margin-bottom: 25px;
    }

    .logo-icon {
      width: 80px;
      height: 80px;
      background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary-medium) 100%);
      border-radius: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 15px;
      box-shadow: 0 8px 20px rgba(32, 201, 151, 0.3);
    }

    .logo-icon i {
      font-size: 32px;
      color: white;
    }

    .brand-text {
      color: var(--primary-dark);
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 5px;
    }

    .brand-subtitle {
      color: var(--primary-medium);
      font-size: 14px;
      font-weight: 500;
      margin-bottom: 30px;
    }

    /* Form Styling */
    .form-group {
      margin-bottom: 20px;
      text-align: left;
    }

    .form-label {
      display: block;
      color: var(--primary-dark);
      font-size: 14px;
      font-weight: 600;
      margin-bottom: 8px;
    }

    .input-group {
      position: relative;
      display: flex;
      align-items: center;
    }

    .input-icon {
      position: absolute;
      left: 15px;
      color: var(--primary-medium);
      z-index: 2;
    }

    .form-control {
      width: 100%;
      padding: 12px 15px 12px 45px;
      border: 2px solid #e3f2fd;
      border-radius: 12px;
      background: #f8fdfc;
      color: var(--primary-dark);
      font-size: 15px;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      outline: none;
      border-color: var(--primary-light);
      background: white;
      box-shadow: 0 0 0 3px rgba(32, 201, 151, 0.1);
    }

    .form-control::placeholder {
      color: #a0d8d1;
      font-weight: 400;
    }

    /* Button Styling */
    .btn-login {
      width: 100%;
      padding: 14px;
      background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary-medium) 100%);
      color: white;
      border: none;
      border-radius: 12px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-top: 10px;
      box-shadow: 0 4px 15px rgba(32, 201, 151, 0.3);
    }

    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(32, 201, 151, 0.4);
    }

    .btn-login:active {
      transform: translateY(0);
    }

    /* Alert Styling */
    .alert {
      padding: 12px 16px;
      border-radius: 10px;
      margin-bottom: 20px;
      font-size: 14px;
      font-weight: 500;
      border-left: 4px solid;
    }

    .alert-danger {
      background: #f8d7da;
      color: #721c24;
      border-left-color: #dc3545;
    }

    .alert-success {
      background: #d4edda;
      color: #155724;
      border-left-color: #28a745;
    }

    /* Footer Links */
    .login-footer {
      margin-top: 25px;
      padding-top: 20px;
      border-top: 1px solid #e3f2fd;
    }

    .register-prompt {
      margin-bottom: 15px;
      color: var(--primary-medium);
      font-size: 14px;
    }

    .btn-register {
      display: inline-block;
      padding: 10px 20px;
      background: transparent;
      color: var(--primary-light);
      border: 2px solid var(--primary-light);
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      font-size: 14px;
      transition: all 0.3s ease;
      margin-bottom: 15px;
    }

    .btn-register:hover {
      background: var(--primary-light);
      color: white;
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(32, 201, 151, 0.3);
    }

    .footer-text {
      color: var(--primary-medium);
      font-size: 14px;
    }

    .footer-link {
      color: var(--primary-light);
      text-decoration: none;
      font-weight: 600;
      transition: color 0.3s ease;
    }

    .footer-link:hover {
      color: var(--primary-dark);
      text-decoration: underline;
    }

    /* Responsive Design */
    @media (max-width: 480px) {
      .login-container {
        margin: 15px;
        padding: 30px 25px;
      }
      
      .brand-text {
        font-size: 24px;
      }
      
      .logo-icon {
        width: 70px;
        height: 70px;
      }
      
      .logo-icon i {
        font-size: 28px;
      }
    }

    @media (max-width: 360px) {
      .login-container {
        padding: 25px 20px;
      }
      
      .brand-text {
        font-size: 22px;
      }
    }

    /* Loading Animation */
    .loading {
      display: inline-block;
      width: 20px;
      height: 20px;
      border: 3px solid rgba(255,255,255,.3);
      border-radius: 50%;
      border-top-color: #fff;
      animation: spin 1s ease-in-out infinite;
      margin-right: 8px;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }

    /* Password Toggle */
    .password-toggle {
      position: absolute;
      right: 15px;
      background: none;
      border: none;
      color: var(--primary-medium);
      cursor: pointer;
      z-index: 3;
    }

    .password-toggle:hover {
      color: var(--primary-dark);
    }
  </style>
</head>
<body>

  <div class="login-container">
    <!-- Logo & Brand -->
    <div class="logo">
      <div class="logo-icon">
        <i class="fas fa-mountain"></i>
      </div>
      <h1 class="brand-text">WisataMag</h1>
      <p class="brand-subtitle">Sistem Informasi Wisata Magelang</p>
    </div>

    <!-- Notifikasi -->
    <?php if ($this->session->flashdata('error')): ?>
      <div class="alert alert-danger">
        <i class="fas fa-exclamation-circle me-2"></i>
        <?= $this->session->flashdata('error') ?>
      </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('success')): ?>
      <div class="alert alert-success">
        <i class="fas fa-check-circle me-2"></i>
        <?= $this->session->flashdata('success') ?>
      </div>
    <?php endif; ?>

    <!-- Form Login -->
    <form action="<?= base_url('login/auth') ?>" method="POST" id="loginForm">
      <div class="form-group">
        <label class="form-label">
          <i class="fas fa-user me-1"></i>Username
        </label>
        <div class="input-group">
          <i class="fas fa-user input-icon"></i>
          <input type="text" 
                 name="username" 
                 class="form-control" 
                 placeholder="Masukkan username Anda"
                 required
                 autocomplete="username">
        </div>
      </div>

      <div class="form-group">
        <label class="form-label">
          <i class="fas fa-lock me-1"></i>Password
        </label>
        <div class="input-group">
          <i class="fas fa-lock input-icon"></i>
          <input type="password" 
                 name="password" 
                 class="form-control" 
                 id="password"
                 placeholder="Masukkan password Anda"
                 required
                 autocomplete="current-password">
          <button type="button" class="password-toggle" id="togglePassword">
            <i class="fas fa-eye"></i>
          </button>
        </div>
      </div>

      <button type="submit" class="btn-login" id="loginButton">
        <i class="fas fa-sign-in-alt me-2"></i>MASUK
      </button>
    </form>

    <!-- Register Prompt -->
    <div class="login-footer">
      <p class="register-prompt">
        <i class="fas fa-user-plus me-1"></i>Belum punya akun?
      </p>
      <a href="<?= base_url('register') ?>" class="btn-register">
        <i class="fas fa-user-edit me-1"></i>Daftar Sekarang
      </a>
      <p class="footer-text">
        &copy; <?= date('Y') ?> WisataMag. All rights reserved.
      </p>
    </div>
  </div>

  <!-- JavaScript -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const loginForm = document.getElementById('loginForm');
      const loginButton = document.getElementById('loginButton');
      const togglePassword = document.getElementById('togglePassword');
      const passwordInput = document.getElementById('password');

      // Password toggle functionality
      togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
      });

      // Form submission handling
      loginForm.addEventListener('submit', function(e) {
        const originalText = loginButton.innerHTML;
        loginButton.innerHTML = '<span class="loading"></span>Memproses...';
        loginButton.disabled = true;

        // Re-enable button after 5 seconds (in case of error)
        setTimeout(() => {
          loginButton.innerHTML = originalText;
          loginButton.disabled = false;
        }, 5000);
      });

      // Input validation
      const inputs = document.querySelectorAll('.form-control');
      inputs.forEach(input => {
        input.addEventListener('input', function() {
          if (this.value.trim() !== '') {
            this.style.borderColor = '#20c997';
          } else {
            this.style.borderColor = '#e3f2fd';
          }
        });

        input.addEventListener('focus', function() {
          this.style.background = 'white';
        });

        input.addEventListener('blur', function() {
          if (this.value.trim() === '') {
            this.style.background = '#f8fdfc';
          }
        });
      });

      // Enter key support
      loginForm.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
          loginForm.dispatchEvent(new Event('submit'));
        }
      });

      // Auto-focus username field
      const usernameInput = document.querySelector('input[name="username"]');
      if (usernameInput) {
        setTimeout(() => {
          usernameInput.focus();
        }, 500);
      }
    });

    // Add some interactive background elements
    document.addEventListener('mousemove', function(e) {
      const particles = document.createElement('div');
      particles.style.cssText = `
        position: fixed;
        width: 4px;
        height: 4px;
        background: rgba(32, 201, 151, 0.3);
        border-radius: 50%;
        pointer-events: none;
        z-index: 0;
        left: ${e.clientX}px;
        top: ${e.clientY}px;
      `;
      document.body.appendChild(particles);

      setTimeout(() => {
        particles.remove();
      }, 1000);
    });
  </script>

</body>
</html>