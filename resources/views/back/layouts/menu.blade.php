<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a href="{{ route('homepage') }}" target="blank"
    class="sidebar-brand d-flex align-items-center justify-content-center">
    <div class="sidebar-brand-text">Blog Demo Site</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ Request::is('admin/panel') ? 'active' : null }}">
    <a href="{{ route('admin.dashboard') }}" class="nav-link">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Panel</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    İçerik Yönetimi
  </div>

  <!-- Nav Item - Articles Collapse Menu -->
  @php
  $isActiveArticleMenu = Request::is('admin/makaleler') || Request::is('admin/makaleler/*');
  @endphp
  <li class="nav-item {{ $isActiveArticleMenu ? 'active' : null }}">
    <a class="nav-link {{ $isActiveArticleMenu ? 'in' : 'collapsed' }}" href="#" data-toggle="collapse"
      data-target="#collapseArticle" aria-expanded="true" aria-controls="collapseArticle">
      <i class="fas fa-fw fa-edit"></i>
      <span>Makaleler</span>
    </a>
    <div id="collapseArticle" class="collapse {{ $isActiveArticleMenu ? 'show' : null }} " aria-labelledby="headingTwo"
      data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Makale İşlemleri:</h6>
        <a class="collapse-item {{ Request::routeIs('admin.makaleler.index') ? 'active' : null }}"
          href="{{ route('admin.makaleler.index') }}">Tüm Makaleler</a>
        <a class="collapse-item {{ Request::routeIs('admin.makaleler.create') ? 'active' : null }}"
          href="{{ route('admin.makaleler.create') }}">Makale Oluştur</a>
        <a class="collapse-item {{ Request::routeIs('admin.makaleler.trashed') ? 'active' : null }}"
          href="{{ route('admin.makaleler.trashed') }}">Silinen Makaleler</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Categories Collapse Menu -->
  @php
  $isActiveCategoryMenu = Request::is('admin/kategoriler') || Request::is('admin/kategoriler/*');
  @endphp
  <li class="nav-item {{ $isActiveCategoryMenu ? 'active' : null }}">
    <a href="{{ route('admin.kategoriler.index') }}" class="nav-link">
      <i class="fas fa-fw fa-list"></i>
      <span>Kategoriler</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Addons
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
      aria-controls="collapsePages">
      <i class="fas fa-fw fa-folder"></i>
      <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Login Screens:</h6>
        <a class="collapse-item" href="login.html">Login</a>
        <a class="collapse-item" href="register.html">Register</a>
        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
        <div class="collapse-divider"></div>
        <h6 class="collapse-header">Other Pages:</h6>
        <a class="collapse-item" href="404.html">404 Page</a>
        <a class="collapse-item" href="blank.html">Blank Page</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="charts.html">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Charts</span></a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link" href="tables.html">
      <i class="fas fa-fw fa-table"></i>
      <span>Tables</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->