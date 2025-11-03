<div class="sidebar" style="background: linear-gradient(180deg, #0e3c38 0%, #165b57 100%); min-height: 100vh; width: 280px; padding: 20px 0; color: white; box-shadow: 2px 0 10px rgba(0,0,0,0.1); position: fixed; left: 0; top: 0; z-index: 1000;">
  
  <!-- Logo & Brand -->
  <div class="sidebar-header text-center mb-4" style="padding: 0 20px;">
    <h3 style="color: #fff; font-weight: 700; font-size: 1.5rem; margin-bottom: 0;">
      <i class="fas fa-mountain me-2" style="color: #20c997;"></i> WisataMag
    </h3>
    <div class="divider" style="height: 2px; background: linear-gradient(90deg, transparent 0%, #20c997 50%, transparent 100%); margin: 15px 0;"></div>
  </div>
  
  <!-- Menu Items -->
  <div class="sidebar-menu" style="padding: 0 15px;">
    <!-- Dashboard -->
    <a href="<?= base_url('dashboard') ?>" 
       class="sidebar-item <?= ($title=='Dashboard'?'active':'') ?>" 
       style="display: flex; align-items: center; padding: 12px 15px; color: #e8fffb; text-decoration: none; border-radius: 8px; margin-bottom: 8px; transition: all 0.3s ease;">
      <i class="fas fa-home me-3" style="width: 20px; text-align: center;"></i> 
      <span>Dashboard</span>
    </a>
    
    <!-- Data Wisata -->
    <a href="<?= base_url('wisata') ?>" 
       class="sidebar-item <?= ($title=='Data Wisata'?'active':'') ?>" 
       style="display: flex; align-items: center; padding: 12px 15px; color: #e8fffb; text-decoration: none; border-radius: 8px; margin-bottom: 8px; transition: all 0.3s ease;">
      <i class="fas fa-map-marked-alt me-3" style="width: 20px; text-align: center;"></i> 
      <span>Data Wisata</span>
    </a>
    
    <!-- Data Master Heading -->
    <div class="sidebar-section-title" style="padding: 15px 15px 8px 15px; color: #a0d8d1; font-size: 0.8rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">
      <i class="fas fa-database me-2"></i> Data Master
    </div>
    
    <!-- Data Pemilik -->
    <a href="<?= base_url('pemilik') ?>" 
       class="sidebar-item <?= ($title=='Data Pemilik'?'active':'') ?>" 
       style="display: flex; align-items: center; padding: 12px 15px 12px 35px; color: #e8fffb; text-decoration: none; border-radius: 8px; margin-bottom: 5px; transition: all 0.3s ease;">
      <i class="fas fa-user-tie me-3" style="width: 20px; text-align: center;"></i> 
      <span>Data Pemilik</span>
    </a>
    
    <!-- Data Kecamatan -->
    <a href="<?= base_url('kecamatan') ?>" 
       class="sidebar-item <?= ($title=='Kecamatan'?'active':'') ?>" 
       style="display: flex; align-items: center; padding: 12px 15px 12px 35px; color: #e8fffb; text-decoration: none; border-radius: 8px; margin-bottom: 5px; transition: all 0.3s ease;">
      <i class="fas fa-map-marker-alt me-3" style="width: 20px; text-align: center;"></i> 
      <span>Data Kecamatan</span>
    </a>
    
    <!-- Fasilitas -->
    <a href="<?= base_url('fasilitas') ?>" 
       class="sidebar-item <?= ($title=='Fasilitas'?'active':'') ?>" 
       style="display: flex; align-items: center; padding: 12px 15px 12px 35px; color: #e8fffb; text-decoration: none; border-radius: 8px; margin-bottom: 5px; transition: all 0.3s ease;">
      <i class="fas fa-tree me-3" style="width: 20px; text-align: center;"></i> 
      <span>Fasilitas</span>
    </a>
    
    <!-- Kategori Wisata -->
    <a href="<?= base_url('kategori') ?>" 
       class="sidebar-item <?= ($title=='Kategori Wisata'?'active':'') ?>" 
       style="display: flex; align-items: center; padding: 12px 15px 12px 35px; color: #e8fffb; text-decoration: none; border-radius: 8px; margin-bottom: 15px; transition: all 0.3s ease;">
      <i class="fas fa-tags me-3" style="width: 20px; text-align: center;"></i> 
      <span>Kategori Wisata</span>
    </a>
    
    <!-- Users Heading -->
    <div class="sidebar-section-title" style="padding: 15px 15px 8px 15px; color: #a0d8d1; font-size: 0.8rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">
      <i class="fas fa-chart-bar me-2"></i>User
    </div>
    
    <!-- User -->
    <a href="<?= base_url('usermanagement') ?>" 
       class="sidebar-item <?= ($title=='User'?'active':'') ?>" 
       style="display: flex; align-items: center; padding: 12px 15px; color: #e8fffb; text-decoration: none; border-radius: 8px; margin-bottom: 15px; transition: all 0.3s ease;">
      <i class="fas fa-users me-3" style="width: 20px; text-align: center;"></i> 
      <span>Manajemen User</span>
    </a>
  </div>

  <!-- Logout -->
  <div class="sidebar-footer" style="position: absolute; bottom: 30px; left: 0; right: 0; padding: 0 20px;">
    <a href="<?= base_url('login/logout') ?>" 
       class="sidebar-item logout-btn" 
       style="display: flex; align-items: center; padding: 12px 15px; color: #ffc107; text-decoration: none; border-radius: 8px; background: rgba(255, 193, 7, 0.1); transition: all 0.3s ease;">
      <i class="fas fa-sign-out-alt me-3" style="width: 20px; text-align: center;"></i> 
      <span>Logout</span>
    </a>
  </div>
</div>

<!-- Main Content Area -->
<div class="main-content" style="margin-left: 280px; min-height: 100vh; background: #e9f3f2;">

<style>
  /* Sidebar Item Hover & Active States */
  .sidebar-item:hover {
    background: rgba(32, 201, 151, 0.2) !important;
    color: #fff !important;
    transform: translateX(5px);
  }
  
  .sidebar-item.active {
    background: #20c997 !important;
    color: #fff !important;
    box-shadow: 0 4px 12px rgba(32, 201, 151, 0.3);
  }
  
  .sidebar-item.active i {
    color: #fff !important;
  }
  
  .logout-btn:hover {
    background: rgba(255, 193, 7, 0.2) !important;
    color: #ffc107 !important;
    transform: translateX(5px);
  }
  
  /* Smooth transitions */
  .sidebar-item {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
  }
  
  /* Scrollbar styling for sidebar */
  .sidebar-menu::-webkit-scrollbar {
    width: 4px;
  }
  
  .sidebar-menu::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
  }
  
  .sidebar-menu::-webkit-scrollbar-thumb {
    background: #20c997;
    border-radius: 10px;
  }
  
  /* Responsive Design */
  @media (max-width: 768px) {
    .sidebar {
      transform: translateX(-100%);
      transition: transform 0.3s ease;
    }
    
    .sidebar.mobile-open {
      transform: translateX(0);
    }
    
    .main-content {
      margin-left: 0;
    }
  }
  
  /* Animation for menu items */
  @keyframes slideIn {
    from {
      opacity: 0;
      transform: translateX(-20px);
    }
    to {
      opacity: 1;
      transform: translateX(0);
    }
  }
  
  .sidebar-item {
    animation: slideIn 0.3s ease forwards;
  }
  
  .sidebar-item:nth-child(1) { animation-delay: 0.1s; }
  .sidebar-item:nth-child(2) { animation-delay: 0.15s; }
  .sidebar-item:nth-child(3) { animation-delay: 0.2s; }
  .sidebar-item:nth-child(4) { animation-delay: 0.25s; }
  .sidebar-item:nth-child(5) { animation-delay: 0.3s; }
  .sidebar-item:nth-child(6) { animation-delay: 0.35s; }
  .sidebar-item:nth-child(7) { animation-delay: 0.4s; }
  .sidebar-item:nth-child(8) { animation-delay: 0.45s; }
</style>

<!-- Optional: JavaScript for mobile toggle -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Mobile sidebar toggle (you can add a hamburger menu in your header)
  const sidebar = document.querySelector('.sidebar');
  const mobileMenuBtn = document.createElement('button');
  
  // You can add this button to your header for mobile toggle
  mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
  mobileMenuBtn.style.cssText = `
    position: fixed;
    top: 15px;
    left: 15px;
    z-index: 1001;
    background: #20c997;
    color: white;
    border: none;
    border-radius: 6px;
    padding: 10px 12px;
    font-size: 16px;
    cursor: pointer;
    display: none;
  `;
  
  // Show mobile menu button on small screens
  function checkScreenSize() {
    if (window.innerWidth <= 768) {
      mobileMenuBtn.style.display = 'block';
      document.body.appendChild(mobileMenuBtn);
    } else {
      mobileMenuBtn.style.display = 'none';
    }
  }
  
  // Toggle sidebar on mobile
  mobileMenuBtn.addEventListener('click', function() {
    sidebar.classList.toggle('mobile-open');
  });
  
  // Close sidebar when clicking outside on mobile
  document.addEventListener('click', function(event) {
    if (window.innerWidth <= 768 && 
        !sidebar.contains(event.target) && 
        event.target !== mobileMenuBtn) {
      sidebar.classList.remove('mobile-open');
    }
  });
  
  // Initial check
  checkScreenSize();
  window.addEventListener('resize', checkScreenSize);
});
</script>