<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="/adminlte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>
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
      <li class="header">MAIN NAVIGATION</li>
      {{-- Product --}}
      <li class="treeview">
        <a href="#">
          <i class="fa fa-industry"></i> <span>Product</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/adminlte/index.html"><i class="fa fa-tags"></i> Category</a></li>
          <li><a href="/adminlte/index2.html"><i class="fa fa-sticky-note"></i> Item</a></li>
        </ul>
      </li>
      {{-- Order --}}
      <li>
        <a href="#">
          <i class="fa fa-shopping-cart"></i> <span>Order</span>
        </a>
      </li>
      {{-- Payment --}}
      <li>
        <a href="#">
          <i class="fa fa-dollar"></i> <span>Payment</span>
        </a>
      </li>
      {{-- User --}}
      <li>
        <a href="#">
          <i class="fa fa-user"></i> <span>User</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
