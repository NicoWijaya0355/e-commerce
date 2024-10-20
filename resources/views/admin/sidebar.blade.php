<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="{{asset('admincss/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}"><a href="{{url('admin/dashboard')}}"> <i class="fas fa-home"></i>
                Home </a></li>
                <li class="{{ request()->is('view_category') ? 'active' : '' }}">
                  <a href="{{url('view_category')}}" > <i class="fas fa-tags"></i>
                  Category </a>
                </li>
                
                <li class="{{ request()->is('add_product') || request()->is('view_product') ? 'active' : '' }}"><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-box"></i>

                </i>Products </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li>
                    <a href="{{ url('add_product') }}" ><i class="fas fa-plus"></i>Add Product</a></li>
                    <li>
                    <a href="{{url('view_product')}}" ><i class="fas fa-eye"></i>View Product</a></li>
                    
                  </ul>
                </li>

                <li class="{{ request()->is('view_orders') ? 'active' : '' }}">
                  <a href="{{url('view_orders')}}"> <i class="fas fa-receipt"></i>
                  Orders</a>
                </li>

                <li class="{{ request()->is('audit') ? 'active' : '' }}">
                  <a href="{{url('audit')}}"> <i class="fas fa-clipboard-list"></i>Audits</a>
                </li>

                <li class="{{ request()->is('message') ? 'active' : '' }}">
                  <a href="{{url('message')}}"> <i class="fas fa-envelope"></i>Message</a>
                </li>
                
        </ul>
      </nav>