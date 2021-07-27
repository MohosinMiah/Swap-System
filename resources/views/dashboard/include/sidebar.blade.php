        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboardadmin_dashboard') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>

                {{--  Admin Name   --}}
                @if(Session::get('admin_is_login'))
                <div class="sidebar-brand-text mx-3"> {{  Session::get('admin_name') }}</div>
                @endif

                {{--  Seller Name   --}}
                @if(Session::get('seller_is_login'))
                <div class="sidebar-brand-text mx-3"> {{  Session::get('seller_name') }}</div>
                @endif



            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">

                @if(Session::get('admin_is_login'))

                <a class="nav-link" href="{{ route('admin.dashboardadmin_dashboard') }}">
            
                @endif

                @if(Session::get('seller_is_login'))

                <a class="nav-link" href="{{ route('seller.dashboardseller_dashboard') }}">
            
                @endif

                    <i class="fas fa-fw fa-tachometer-alt"></i>

                @if(Session::get('admin_is_login'))
                <span>{{  Session::get('admin_phone') }}</span>
                @endif

                @if(Session::get('seller_is_login'))
                <span>{{  Session::get('seller_phone') }}</span>
                @endif
                
                </a>
            </li>

          
        {{--  Category Setting   --}}
        @if(Session::get('admin_is_login')) 

        <!-- Nav Item - Category Settings  Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsecategory"
                aria-expanded="true" aria-controls="collapsecategory">
                <i class="fas fa-fw fa-folder"></i>
                <span>Category Settings</span>
            </a>
            <div id="collapsecategory" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.category_create') }}">Add New</a>
                    <a class="collapse-item" href="{{ route('admin.category_all') }}">All Category</a>
                </div>
            </div>
        </li>
        @endif



              {{--  Brand Setting   --}}
              @if(Session::get('admin_is_login')) 

              <!-- Nav Item - Brand Settings  Menu -->
              <li class="nav-item">
                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsebrand"
                      aria-expanded="true" aria-controls="collapsebrand">
                      <i class="fas fa-fw fa-folder"></i>
                      <span>Brand Settings</span>
                  </a>
                  <div id="collapsebrand" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                      <div class="bg-white py-2 collapse-inner rounded">
                          <a class="collapse-item" href="{{ route('admin.brand_create') }}">Add New</a>
                          <a class="collapse-item" href="{{ route('admin.brand_all') }}">All Brand</a>
                      </div>
                  </div>
              </li>
              @endif



              {{--  Mobile Category Setting   --}}
              @if(Session::get('admin_is_login')) 

              <!-- Nav Item - Mobile Category Settings  Menu -->
              <li class="nav-item">
                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsemobileCategory"
                      aria-expanded="true" aria-controls="collapsemobileCategory">
                      <i class="fas fa-fw fa-folder"></i>
                      <span>Mobile Category</span>
                  </a>
                  <div id="collapsemobileCategory" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.mobileCategory_create') }}">Add New </a>
                        <a class="collapse-item" href="{{ route('admin.mobileCategory_all') }}">All Mobile </a>
                        <a class="collapse-item" href="{{ route('admin.mobileCategory_latest_order') }}">Latest Orders </a>
                    </div> 

                  </div>
              </li>

              @endif

           {{--  Access For Admin   --}}

       

            <!-- Nav Item - Admin Settings  Menu -->
          

            @if(Session::get('admin_is_login')) 

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.admin_settingsadmin_settings') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Settings</span></a>
            </li>

            @endif

           

           
        </ul>
        <!-- End of Sidebar -->