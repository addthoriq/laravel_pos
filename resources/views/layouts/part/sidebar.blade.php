<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        @if (auth()->check())
          @if(auth()->user()->poto)
            <img src="{{Storage::url(auth()->user()->poto)}}" class="user-image" alt="User Image">
            @else
            <img src="{{Avatar::create(auth()->user()->name)->toBase64()}}" class="user-image" alt="User Image">
          @endif
        @endif
      </div>
      <div class="pull-left info">
        @if (auth()->check())
          <p>{{auth()->user()->name}}</p>
        @endif
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
      <li class="header">HALAMAN UTAMA</li>
      {{-- Home --}}
      <li class="{{Request::is('admin')?'active':''}}">
        <a href="{{ url('admin/')}}">
          <i class="fa fa-home"></i> <span>Home</span>
        </a>
      </li>
      <li class="header">MAIN NAVIGATION</li>
      {{-- Product --}}
      <li class="treeview {{Request::is('admin/category','admin/category/create','admin/item','admin/item/create')?'active':''}}">
        <a href="#">
          <i class="fa fa-industry"></i> <span>Product</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{Request::is('admin/category','admin/category/create')?'active':''}}"><a href="{{route('category.index')}}"><i class="fa fa-tags"></i> Category</a></li>
          <li class="{{Request::is('admin/item','admin/item/create')?'active':''}}"><a href="{{route('item.index')}}"><i class="fa fa-coffee"></i> Item</a></li>
        </ul>
      </li>
      {{-- Order --}}
      <li class="{{Request::is('admin/order','admin/order/create')?'active':''}}">
        <a href="{{route('order.index')}}">
          <i class="fa fa-shopping-cart"></i> <span>Order</span>
        </a>
      </li>
      <li class="header">SETTING</li>
      {{-- Payment --}}
      <li class="{{Request::is('admin/payment','admin/payment/create')?'active':''}}">
        <a href="{{route('payment.index')}}">
          <i class="fa fa-dollar"></i> <span>Payment</span>
        </a>
      </li>
      {{-- Report --}}
      <li class="{{Request::is('admin/report')?'active':''}}">
        <a href="{{route('report.index')}}">
          <i class="fa fa-book"></i> <span>Report Order</span>
        </a>
      </li>
      {{-- User --}}
      <li class="{{Request::is('admin/user','admin/user/create')?'active':''}}">
        <a href="{{route('user.index')}}">
          <i class="fa fa-user"></i> <span>User</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
