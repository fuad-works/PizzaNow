
        <!-- Sidebar Holder -->
        <nav id="sidebar">
          <div class="sidebar-header">
              <a class="navbar-brand text-warning" href="#">
                  <img src="{{ asset('images/logo.png') }}" alt="" height="30" class="d-inline-block align-text-top">
                  بيتزا الآن
              </a>
          </div>

          <hr/>

          <ul class="list-unstyled components">


            <li class="nav-item {{Route::currentRouteName() == 'orders-viewnews' ? 'active' : ''}}">
              <a class="nav-link text-primary" aria-current="page" href="{{route('orders-viewnews')}}">
                  <i class="fas fa-cart-arrow-down"></i>
                  الطلبات الجديدة
              </a>
          </li>
          <li class="nav-item {{Route::currentRouteName() == 'orders-viewall' ? 'active' : ''}}">
              <a class="nav-link text-success" href="{{route('orders-viewall')}}">
                  <i class="fas fa-shopping-cart"></i>
                  جميع الطلبات
              </a>
          </li>


            <li>
              <a href="#pageSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-danger"><i class="fas fa-users"></i>  إدارة المستخدمين</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                  <li>
                      <a href="{{route('users-edit')}}">أضف جديد</a>
                  </li>
                  <li>
                      <a href="{{URL::to('/users/viewall/1')}}">جدول المدراء</a>
                  </li>
                  <li>
                      <a href="{{URL::to('/users/viewall/2')}}">جدول الزبائن</a>
                  </li>
              </ul>
          </li>


        <li>
          <a href="#pageSubmenu2" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-warning"><i class="fas fa-pizza-slice"></i>  إدارة المنتجات</a>
          <ul class="collapse list-unstyled" id="pageSubmenu2">
            <li>
              <a href="{{route('products-edit')}}">أضف جديد</a>
          </li>
          <li>
              <a href="{{URL::to('/products/viewall')}}">الجدول</a>
          </li>
          </ul>
      </li>


          </ul>
      </nav>
