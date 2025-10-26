<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | MyApp</title>

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #1e2d2f;
      color: #d4e0dd;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background-image: url('<?php echo base_url("assets/images/forest-bg.jpg"); ?>');
      background-size: cover;
      background-position: center;
      backdrop-filter: blur(4px);
    }

    .login-container {
      background: rgba(30, 45, 47, 0.9);
      border-radius: 20px;
      padding: 40px;
      width: 360px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.3);
      text-align: center;
    }

    .login-container h2 {
      font-size: 28px;
      color: #b8f0df;
      margin-bottom: 10px;
    }

    .login-container p {
      color: #a0b5af;
      font-size: 14px;
      margin-bottom: 25px;
    }

    .login-container input {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      background: #2a3b3c;
      color: #d4e0dd;
      margin-bottom: 15px;
    }

    .login-container input::placeholder {
      color: #8da8a0;
    }

    .login-container button {
      width: 100%;
      padding: 12px;
      background: #84c7ae;
      color: #0f1918;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
    }

    .login-container button:hover {
      background: #6dbb9c;
    }

    .login-container a {
      color: #8fd4b5;
      text-decoration: none;
      font-size: 13px;
    }

    .login-container a:hover {
      text-decoration: underline;
    }

    .footer-text {
      margin-top: 20px;
      font-size: 13px;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <div class="logo">
      <img src="<?php echo base_url('assets/images/lotus-icon.png'); ?>" width="60" alt="Logo">
    </div>
    <h2>Welcome Back</h2>
    <p>Sign in to continue your journey</p>

    <?php echo $this->session->flashdata('msg'); ?>

    <form action="<?php echo base_url('login/auth'); ?>" method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">LOGIN</button>
    </form>

    <div class="footer-text">
      Don't have an account? <a href="<?php echo base_url('register'); ?>">Sign Up</a>
    </div>
  </div>

</body>
</html>
