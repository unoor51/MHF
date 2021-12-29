<!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User Profile-->
                <div class="user-profile">
                    <div class="user-pro-body">
                        <div><img src="assets/images/users/2.jpg" alt="user-img" class="img-circle"></div>
                        <div class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}  <span class="caret"></span></a>
                            <div class="dropdown-menu animated flipInY">
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" ><i class="fa fa-power-off"></i> {{ __('Logout') }}</a>
                                <!-- text-->
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                     <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="dashboard.html" aria-expanded="false"><i class="fa fa-dashboard"></i><span class="hide-menu">Dashboard </span></a>
                            
                        </li>
                       <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-product-hunt"></i><span class="hide-menu">Products </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="products.html">Products </a></li>
                                <li><a href="add-product.html">Add Product</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-shopping-basket"></i><span class="hide-menu">Collections </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="collections.html">Collections </a></li>
                                <li><a href="add-collection.html">Add Collection</a></li>
                            </ul>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="inventory.html" aria-expanded="false"><i class="fa fa-houzz"></i><span class="hide-menu">Inventory </span></a>
                            
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-shopping-cart"></i><span class="hide-menu">Orders  </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="orders.html">Orders </a></li>
                                <li><a href="add-order.html">Add Order</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Customers   </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="customers.html">Customers </a></li>
                                <li><a href="add-customer.html">Add Customer</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-tags"></i><span class="hide-menu">Discounts  </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="discounts.html">Discounts </a></li>
                                <li><a href="add-discount.html">Add Discount</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-truck"></i><span class="hide-menu">Shipping  </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="shipping.html">Shipping </a></li>
                                <li><a href="add-shipping.html">Add shipping</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->