<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register | MyApp</title>

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

    .register-container {
      background: rgba(30, 45, 47, 0.9);
      border-radius: 20px;
      padding: 40px;
      width: 380px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.3);
      text-align: center;
    }

    .register-container h2 {
      font-size: 26px;
      color: #b8f0df;
      margin-bottom: 10px;
    }

    .register-container p {
      color: #a0b5af;
      font-size: 14px;
      margin-bottom: 25px;
    }

    .register-container input {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      background: #2a3b3c;
      color: #d4e0dd;
      margin-bottom: 15px;
    }

    .register-container button {
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

    .register-container button:hover {
      background: #6dbb9c;
    }

    .footer-text {
      margin-top: 20px;
      font-size: 13px;
    }

    .footer-text a {
      color: #8fd4b5;
      text-decoration: none;
    }

    .footer-text a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="register-container">
    <div class="logo">
      <img src="<?php echo base_url('assets/images/lotus-icon.png'); ?>" width="60" alt="Logo">
    </div>
    <h2>Create Account</h2>
    <p>Join and start your mindful journey</p>

    <?php echo $this->session->flashdata('msg'); ?>

    <form action="<?php echo base_url('register/simpan'); ?>" method="POST">
      <input type="text" name="nama" placeholder="Nama Lengkap" required>
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">SIGN UP</button>
    </form>

    <div class="footer-text">
      Already have an account? <a href="<?php echo base_url('login'); ?>">Sign In</a>
    </div>
  </div>

</body>
</html>
