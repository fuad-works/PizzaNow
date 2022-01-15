
        <!-- Sidebar Holder -->
        <nav id="sidebar">
          <div class="sidebar-header">
              <a class="navbar-brand" href="#">
                  <img src="https://getbootstrap.com/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="36" height="30" class="d-inline-block align-text-top">
                  Site Name
              </a>
          </div>

          <ul class="list-unstyled components">
              <li class="nav-item <?php echo e(Route::currentRouteName() == 'students-viewall' ? 'active' : ''); ?>">
                  <a class="nav-link" aria-current="page" href="<?php echo e(route('students-viewall')); ?>">
                      <i class="fas fa-chart-pie"></i>
                      الطلاب
                  </a>
              </li>
              <li class="nav-item <?php echo e(Route::currentRouteName() == 'courses-viewall' ? 'active' : ''); ?>">
                  <a class="nav-link" href="<?php echo e(route('courses-viewall')); ?>">
                      <i class="fas fa-tasks"></i>
                      الدورات التدريبية
                  </a>
              </li>
              
          </ul>
      </nav>
<?php /**PATH D:\LaravelApps\DegreesPrinter\resources\views/layouts/parts/sidebar.blade.php ENDPATH**/ ?>