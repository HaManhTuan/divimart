  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ (trim($userLogin->avatar) != '' ? asset('public/'.$userLogin->avatar) : asset('images/no_avatar.jpg')) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ $userLogin->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Quản lý</li>
        <li class="{{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
          <a href="{{ url('admin/dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        @if ( $userLogin->user_access == 1 )
        <li class="{{ (request()->is('admin/user/view-user')) ? 'active' : '' }}">
          <a href="{{ url('admin/user/view-user') }}">
            <i class="fa fa-user"></i>
            <span>Người dùng</span>
          </a>
        </li>
        @endif
        @if ( $userLogin->category_access == 1 )
        <li class="{{ (request()->is('admin/category/view-category')) ? 'active' : '' }}">
          <a href="{{ url('admin/category/view-category') }}">
            <i class="fa fa-pinterest-square"></i>
            <span>Danh mục </span>
          </a>
        </li>
        @endif
        @if ( $userLogin->product_access == 1 )
        <li class="{{ (request()->is('admin/product/view-product')) ? 'active' : '' }} treeview" >
          <a href="#">
              <i class="fa fa-inbox"></i>
              <span>Sản phẩm</span>
                <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>
          </a>
           <ul class="treeview-menu">
              <li><a href="{{ url('admin/product/view-product') }}"><i class="fa fa-circle-o"></i>Danh sách sản phẩm</a></li>
              <li><a href="{{ url('admin/thong-ke/thong-ke-sp') }}"><i class="fa fa-circle-o"></i> Thống kê</a></li>
            </ul>
        </li>
        @endif
        @if ( $userLogin->order_access == 1 )
        <li class="{{ (request()->is('admin/order/view-order')) ? 'active' : '' }}">
          <a href="{{ url('admin/order/view-order') }}">
            <i class="fa fa-shopping-cart"></i>
            <span>Đơn hàng </span>
          </a>
        </li>
        @endif
        @if ( $userLogin->store_access == 1 )
          <li class="treeview {{ (request()->is('admin/media/view-media')) ? 'active' : '' }} {{ (request()->is('admin/attribute/view-attribute-size')) ? 'active' : '' }}">
            <a href="#">
              <i class="fa fa-inbox"></i>
              <span>Store</span>
                        <span class="pull-right-container">
              <span class="label label-primary pull-right">3</span>
            </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ url('admin/media/view-media') }}"><i class="fa fa-circle-o"></i> Slide</a></li>
              <li><a href="{{ url('admin/attribute/view-attribute-size') }}"><i class="fa fa-circle-o"></i> Size</a></li>
              <li><a href="{{ url('admin/coupon/view-coupon') }}"><i class="fa fa-circle-o"></i> Mã giảm giá</a></li>
            </ul>
          </li>
        @endif
        @if ( $userLogin->config_access == 1 )
          <li class="{{ (request()->is('admin/config/view-config')) ? 'active' : '' }}">
            <a href="{{ url('admin/config/view-config') }}">
              <i class="fa fa-cog"></i>
              <span>Cấu hình Web </span>
            </a>
          </li>
        @endif
        @if ( $userLogin->customer_access == 1 )
          <li class="{{ (request()->is('admin/customer/view-customer')) ? 'active' : '' }}">
            <a href="{{ url('admin/customer/view-customer') }}">
              <i class="fa fa-user-o"></i>
              <span>Khách Hàng </span>
            </a>
          </li>
        @endif
          <li class="{{ (request()->is('admin/contact/view-contact')) ? 'active' : '' }}">
            <a href="{{ url('admin/contact/view-contact') }}">
              <i class="fa fa-hand-paper-o"></i>
              <span>Liên hệ </span>
            </a>
          </li>
          <li class="{{ (request()->is('admin/blog/view-blog')) ? 'active' : '' }}">
            <a href="{{ url('admin/blog/view-blog') }}">
              <i class="fa fa-pencil"></i>
              <span>Bài viết </span>
            </a>
          </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>