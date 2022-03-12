<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
      @if(Auth::user()->foto == '')
        <img src="{{asset('img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
      @else
        <a href="{{asset('ximgnasboxyz/xakun/'. Auth::user()->foto )}}"><img src="{{asset('ximgnasboxyz/xakun/'. Auth::user()->foto )}}" class="img-circle"  width="50" height="50" alt="" >
        </a>
      @endif
        
        
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form (Optional) -->
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
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
      </ul>
      <li class="@yield('dashboard')"><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      
      <li class="@yield('mitra')"><a href="{{route('mitra')}}"><i class="fa fa-users"></i> <span>Tambah Mitra</span></a></li>

      <li class="treeview">

        
          <a href="#"><i class="fa fa-truck"></i> <span>Food Express</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
         
          <ul class="treeview-menu">
            <li class="@yield('tambah_makanan_food_express')"><a href="{{ route('menu_foodexpress') }}"><i class="fa fa-circle-o"></i> <span>Pengolahan Menu</span></a></li>
            <li class="@yield('rekomendasi_food_express')"><a href="#"><i class="fa fa-circle-o"></i> <span>Rekomendasi</span></a></li>
          </ul>
        
      </li>

      <li class="treeview">
          <a href="#"><i class="fa fa-spoon"></i> <span>Catering</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="@yield('tambah_makanan_catering')"><a href="{{ route('menu_catering') }}"><i class="fa fa-circle-o"></i> <span>Pengolahan Menu</span></a></li>
            <li class="@yield('rekomendasi_catering')"><a href="#"><i class="fa fa-circle-o"></i> <span>Rekomendasi</span></a></li>
          </ul>
      </li>
        
      <li class="treeview">
          <a href="#"><i class="fa fa-tasks"></i> <span>Grocery</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="@yield('tambah_makanan_grocery')"><a href="{{ route('menu_grocery') }}"><i class="fa fa-circle-o"></i> <span>Pengolahan Menu</span></a></li>
            <li class="@yield('rekomendasi_grocery')"><a href="#"><i class="fa fa-circle-o"></i> <span>Rekomendasi</span></a></li>

          </ul>
      </li> 
      <li class="@yield('pemesanan')"><a href="{{route('list_pemesanan') }}"><i class="fa fa-cart-arrow-down"></i> <span>Pemesanan</span></a></li>
      <li class="@yield('status_pengiriman')"><a href="{{route('list_pengiriman') }}"><i class="fa fa-car"></i> <span>Status Pengiriman</span></a></li>
      <li class="@yield('history')"><a href="{{route('history')}}"><i class="fa fa-history"></i> <span>History</span></a></li>
      
      @if( Auth::user()->id_level  == "1")
      <li class="treeview">
        
          <a href="#"><i class="fa fa-tasks"></i> <span>Referensi</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>

          
          <ul class="treeview-menu">
              <li class="@yield('bank')"><a href="{{ route('bank') }}"><i class="fa fa-bank"></i> <span>Bank</span></a></li>
              <li class="@yield('akun')"><a href="{{ route('akun') }}"><i class="fa fa-bank"></i> <span>Admin</span></a></li>
          
          </ul>
          
          
      </li> 
      @endif
    
    </ul>
    <!-- /.sidebar-menu -->
  </section>
</aside>