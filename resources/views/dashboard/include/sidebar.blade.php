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


              {{--  Brand Setting   --}}

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




           {{--  Access For Admin   --}}

        @if (Session::get('admin_is_login'))
              

           <!-- Nav Item - Seller Settings  Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSellers"
                    aria-expanded="true" aria-controls="collapseSellers">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Seller Settings</span>
                </a>
                <div id="collapseSellers" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.seller_createadmin_seller_create') }}">Add New</a>
                        <a class="collapse-item" href="{{ route('admin.seller_alladmin_seller_all') }}">All Seller</a>
                    </div>
                </div>
            </li>

        @endif

            <!-- Nav Item - Admin Settings  Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCustomers"
                    aria-expanded="true" aria-controls="collapseCustomers">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Customer Settings</span>
                </a>
                <div id="collapseCustomers" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                                 {{-- Check Seller or Not  --}}
                                 @if(Session::get('seller_is_login'))
                        <a class="collapse-item" href="{{ route('seller.customer_createseller_seller_create') }}">Add New</a>
                                 @endif

                        <a class="collapse-item" href="{{ route('seller.customer_allseller_seller_all') }}">All Customer</a>
                    </div>
                </div>
            </li>

            {{--  Admin Setting   --}}

            @if(Session::get('admin_is_login')) 

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.admin_settingsadmin_settings') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Settings</span></a>
            </li>

            @endif

            {{--  Seller Setting   --}}

            @if(Session::get('seller_is_login')) 

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('seller.seller_settingsseller_settings') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Settings</span></a>
            </li>

            @endif

           
        </ul>
        <!-- End of Sidebar -->