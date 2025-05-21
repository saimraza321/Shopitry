<!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        
                        <li class="nav-small-cap">--- PERSONAL</li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="index.html">Minimal </a></li>
                                <li><a href="index2.html">Analytical</a></li>
                                <li><a href="index3.html">Demographical</a></li>
                                <li><a href="index4.html">Modern</a></li>
                            </ul>
                        </li>    
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-settings"></i><span class="hide-menu">New Products</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('newproduct.create')}}">New Products </a></li>
                                <li><a href="{{route('newproduct.index')}}">Products</a></li>
                         
                            </ul>
                        </li>    
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-settings"></i><span class="hide-menu">Products</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('products.create')}}">create Products </a></li>
                                <li><a href="{{route('products.index')}}">Products</a></li>
                         
                            </ul>
                        </li>    
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-settings"></i><span class="hide-menu">Top Selling</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('top_selling.create')}}">New Products </a></li>
                                <li><a href="{{route('top_selling.index')}}">Products</a></li>
                         
                            </ul>
                        </li>    
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-settings"></i><span class="hide-menu">Categories</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('categories.create')}}">Create Categories </a></li>
                                <li><a href="{{route('categories.index')}}">categories</a></li>
                         
                            </ul>
                        </li> 
                          <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-settings"></i><span class="hide-menu">Brands</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('brand.create')}}">Create Brand </a></li>
                                <li><a href="{{route('brand.index')}}">Brands</a></li>
                         
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