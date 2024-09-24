 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
      <img src="/backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">DATAMYAUTOZ</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Administrator</a>
        </div>
      </div>
      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="{{route('admin.receipts')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Report Receipts
                <!-- <span class="right badge badge-danger">1</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.reports')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Generated Reports
                <!-- <span class="right badge badge-danger">1</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.send_report')}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Send report via email
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.users')}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.settings')}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Settings
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.categories.index')}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Categories
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.blogs.index')}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Blogs
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.checkvin')}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Check Vin Number
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/coinremitter-gateway-settings')}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                  Coinremitter Gateway Settings
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/authorizeNet-gateway-settings')}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                  Authorize.Net Gateway Settings
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{url('admin/paytabs-gateway-settings')}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                  Paytabs Gateway Settings
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{url('admin/manage-bank-accounts')}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                  Manage Bank Accounts
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>