<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">EXAMPLES<i class="right fas fa-angle-left"></i></a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../products" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../suppliers" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Suppliers</p>
                </a>
              </li>
            </ul>
          </li>  
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Extras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../examples/blank.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blank Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../starter.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Starter Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">USERS MANAGEMENT</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
             <!-- ion-icon name="person-outline"></ion-icon -->
              <i class="nav-icon fas fa-users"></i>
              <p>
                USERS MANAGEMENT
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/users" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>USERS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/roles" class="nav-link">
                  <i class="nav-icon fas fa-dice-d20"></i>
                  <p>ROLES</p>
                </a>
              </li>
            </ul>
          </li>
          <hr   />
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt"></i>
              <p>
                {{ __('Logout') }}
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
          </li>
</ul>