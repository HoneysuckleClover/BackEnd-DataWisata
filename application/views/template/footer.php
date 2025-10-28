<!-- Footer -->
<footer class="mt-5 pt-4 border-top" style="border-color: #c8e6e3 !important;">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-md-6 text-center text-md-start">
        <p class="mb-0" style="color: #6c757d; font-size: 14px;">
          <i class="fas fa-mountain me-1 text-muted"></i>
          <strong style="color: #0e3c38;">WisataMag</strong> - Sistem Informasi Wisata Magelang
        </p>
      </div>
      <div class="col-md-6 text-center text-md-end">
        <p class="mb-0" style="color: #6c757d; font-size: 14px;">
          <i class="fas fa-copyright me-1 text-muted"></i>
          <?= date('Y') ?> All Rights Reserved
        </p>
      </div>
    </div>
    
    <!-- Additional Info -->
    <div class="row mt-2">
      <div class="col-12 text-center">
        <small style="color: #a0aec0; font-size: 12px;">
          <i class="fas fa-heart text-danger me-1"></i>
          Developed with passion for Magelang Tourism
        </small>
      </div>
    </div>
  </div>
</footer>

</div> <!-- /.content-wrapper -->
</div> <!-- /.main-content -->

<!-- Bootstrap & JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Custom JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Initialize tooltips
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });

  // Initialize popovers
  var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
  var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl);
  });

  // Auto-dismiss alerts after 5 seconds
  const alerts = document.querySelectorAll('.alert');
  alerts.forEach(alert => {
    setTimeout(() => {
      if (alert.parentNode) {
        const bsAlert = new bootstrap.Alert(alert);
        bsAlert.close();
      }
    }, 5000);
  });

  // Form validation enhancement
  const forms = document.querySelectorAll('form');
  forms.forEach(form => {
    form.addEventListener('submit', function(e) {
      const submitBtn = this.querySelector('button[type="submit"]');
      if (submitBtn) {
        submitBtn.innerHTML = '<span class="loading"></span> Memproses...';
        submitBtn.disabled = true;
      }
    });
  });

  // Smooth scroll to top
  const scrollToTop = document.createElement('button');
  scrollToTop.innerHTML = '<i class="fas fa-chevron-up"></i>';
  scrollToTop.style.cssText = `
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 50px;
    height: 50px;
    background: #20c997;
    color: white;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    display: none;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    box-shadow: 0 4px 15px rgba(32, 201, 151, 0.3);
    transition: all 0.3s ease;
    z-index: 1000;
  `;
  
  scrollToTop.addEventListener('click', function() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  scrollToTop.addEventListener('mouseenter', function() {
    this.style.transform = 'translateY(-2px)';
    this.style.boxShadow = '0 6px 20px rgba(32, 201, 151, 0.4)';
  });

  scrollToTop.addEventListener('mouseleave', function() {
    this.style.transform = 'translateY(0)';
    this.style.boxShadow = '0 4px 15px rgba(32, 201, 151, 0.3)';
  });

  document.body.appendChild(scrollToTop);

  // Show/hide scroll to top button
  window.addEventListener('scroll', function() {
    if (window.pageYOffset > 300) {
      scrollToTop.style.display = 'flex';
    } else {
      scrollToTop.style.display = 'none';
    }
  });

  // Enhanced table row interactions
  const tableRows = document.querySelectorAll('table tbody tr[style*="transition"]');
  tableRows.forEach(row => {
    row.addEventListener('click', function() {
      this.style.background = '#f0f9f8';
      setTimeout(() => {
        if (!this.matches(':hover')) {
          this.style.background = '';
        }
      }, 1000);
    });
  });

  // Print functionality
  window.printPage = function() {
    window.print();
  };

  // Export functionality placeholder
  window.exportData = function(format) {
    alert(`Fitur ekspor data dalam format ${format} akan segera tersedia.`);
  };

  // Responsive table enhancement
  function enhanceResponsiveTables() {
    const tables = document.querySelectorAll('.table-responsive');
    tables.forEach(table => {
      if (table.offsetWidth < table.scrollWidth) {
        table.style.border = '1px solid #dee2e6';
        table.style.borderRadius = '8px';
      }
    });
  }

  enhanceResponsiveTables();
  window.addEventListener('resize', enhanceResponsiveTables);

  // Notification system
  window.showNotification = function(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `alert alert-${type} alert-dismissible fade show`;
    notification.style.cssText = `
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 1060;
      min-width: 300px;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    `;
    notification.innerHTML = `
      <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'} me-2"></i>
      ${message}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
      if (notification.parentNode) {
        const bsAlert = new bootstrap.Alert(notification);
        bsAlert.close();
      }
    }, 5000);
  };

  // Check for unsaved forms
  const unsavedForms = document.querySelectorAll('form');
  let formChanged = false;

  unsavedForms.forEach(form => {
    const inputs = form.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
      input.addEventListener('input', () => {
        formChanged = true;
      });
    });
  });

  window.addEventListener('beforeunload', function(e) {
    if (formChanged) {
      e.preventDefault();
      e.returnValue = '';
    }
  });

  // Mobile menu toggle (if needed)
  const mobileMenuToggle = document.querySelector('[data-bs-toggle="sidebar"]');
  if (mobileMenuToggle) {
    mobileMenuToggle.addEventListener('click', function() {
      const sidebar = document.querySelector('.sidebar');
      sidebar.classList.toggle('mobile-open');
    });
  }
});

// Utility functions
const WisataMag = {
  // Format number with thousands separator
  formatNumber: function(num) {
    return new Intl.NumberFormat('id-ID').format(num);
  },
  
  // Format date
  formatDate: function(date) {
    return new Date(date).toLocaleDateString('id-ID', {
      weekday: 'long',
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    });
  },
  
  // Debounce function
  debounce: function(func, wait) {
    let timeout;
    return function executedFunction(...args) {
      const later = () => {
        clearTimeout(timeout);
        func(...args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  },
  
  // Copy to clipboard
  copyToClipboard: function(text) {
    navigator.clipboard.writeText(text).then(() => {
      showNotification('Teks berhasil disalin!', 'success');
    }).catch(() => {
      showNotification('Gagal menyalin teks', 'error');
    });
  }
};
</script>

</body>
</html>