
        <!-- Sidebar Holder -->
        <nav id="sidebar">
          <div class="sidebar-header">
              <a class="navbar-brand text-warning" href="#">
                  <img src="<?php echo e(asset('images/logo.png')); ?>" alt="" height="30" class="d-inline-block align-text-top">
                  بيتزا الآن
              </a>
          </div>

          <hr/>

          <ul class="list-unstyled components">




            <li class="nav-item <?php echo e(Route::currentRouteName() == 'students-viewall' ? 'active' : ''); ?>">
              <a class="nav-link text-primary" aria-current="page" href="<?php echo e(route('students-viewall')); ?>">
                  <i class="fas fa-cart-arrow-down"></i>
                  الطلبات الجديدة
              </a>
          </li>
          <li class="nav-item <?php echo e(Route::currentRouteName() == 'courses-viewall' ? 'active' : ''); ?>">
              <a class="nav-link text-success" href="<?php echo e(route('courses-viewall')); ?>">
                  <i class="fas fa-shopping-cart"></i>
                  جميع الطلبات
              </a>
          </li>


            <li>
              <a href="#pageSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-danger"><i class="fas fa-users"></i>  إدارة المستخدمين</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                  <li>
                      <a href="#">أضف جديد</a>
                  </li>
                  <li>
                      <a href="#">جدول المدراء</a>
                  </li>
                  <li>
                      <a href="#">جدول الزبائن</a>
                  </li>
              </ul>
          </li>


          <!--
          <li>
            <a href="#pageSubmenu1" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-info"><i class="fas fa-th-list"></i>  إدارة التصنيفات</a>
            <ul class="collapse list-unstyled" id="pageSubmenu1">
                <li>
                    <a href="#">أضف جديد</a>
                </li>
                <li>
                    <a href="#">الجدول</a>
                </li>
            </ul>
        </li>
      -->


        <li>
          <a href="#pageSubmenu2" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-warning"><i class="fas fa-pizza-slice"></i>  إدارة المنتجات</a>
          <ul class="collapse list-unstyled" id="pageSubmenu2">
              <li>
                  <a href="#">أضف جديد</a>
              </li>
              <li>
                  <a href="#">الجدول</a>
              </li>
          </ul>
      </li>








              
          </ul>
      </nav>
<?php /**PATH D:\LaravelApps\PizzaNow\resources\views/layouts/parts/sidebar.blade.php ENDPATH**/ ?>