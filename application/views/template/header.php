<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($title) ? $title : 'Sistem Informasi Wisata Magelang' ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
    body {
      margin: 0;
      font-family: "Poppins", sans-serif;
      background-color: #0f2424;
      color: #eaf7f3;
      overflow-x: hidden;
    }

    .wrapper {
      display: flex;
      min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
      width: 240px;
      background-color: #133434;
      padding-top: 20px;
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      color: #aef7de;
      transition: 0.3s;
    }

    .sidebar h3 {
      text-align: center;
      font-weight: 600;
      margin-bottom: 30px;
    }

    .sidebar a {
      display: block;
      color: #cfeee6;
      padding: 12px 20px;
      text-decoration: none;
      font-size: 15px;
      transition: 0.3s;
    }

    .sidebar a:hover,
    .sidebar a.active {
      background-color: #20c997;
      color: #fff;
      border-radius: 6px;
      margin: 4px 10px;
    }

    /* Konten Utama */
    .main-content {
      margin-left: 240px;
      padding: 30px;
      width: calc(100% - 240px);
      transition: 0.3s;
    }

    /* Header Bar */
    .topbar {
      background-color: #174242;
      padding: 15px 25px;
      border-radius: 10px;
      margin-bottom: 25px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 3px 10px rgba(0,0,0,0.4);
    }

    .topbar h4 {
      color: #aef7de;
      margin: 0;
      font-weight: 600;
    }

    .topbar .btn-logout {
      background-color: #dc3545;
      color: white;
      border: none;
      border-radius: 6px;
      padding: 8px 16px;
      text-decoration: none;
      font-size: 14px;
      transition: 0.3s;
    }

    .topbar .btn-logout:hover {
      background-color: #b02a37;
    }

    /* Responsif */
    @media (max-width: 768px) {
      .sidebar {
        width: 100%;
        position: relative;
      }
      .main-content {
        margin-left: 0;
        width: 100%;
        padding: 20px;
      }
    }
  </style>
</head>
<body>
<div class="wrapper">
