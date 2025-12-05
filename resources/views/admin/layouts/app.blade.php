<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Admin v4 | Dashboard</title>
    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->
    <!--begin::Primary Meta Tags-->
    <meta name="title" content="AdminLTE v4 | Dashboard" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS. Fully accessible with WCAG 2.1 AA compliance."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel, WCAG compliant"
    />
    <!--end::Primary Meta Tags-->
    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="{{asset('assets/admin/css/adminlte.css')}}" as="style" />
    <!--end::Accessibility Features-->
    <!--begin::Fonts-->
   
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
      media="print"
      onload="this.media='all'"
    />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{asset('assets/admin/css/adminlte.css')}}" />
    <!--end::Required Plugin(AdminLTE)-->
    <!-- apexcharts -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
      integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
      crossorigin="anonymous"
    />
    <!-- jsvectormap -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
      integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4="
      crossorigin="anonymous"
    />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            primary: '#1d4ed8',
            secondary: '#9333ea',
            accent: '#f59e0b'
          }
        }
      }
    }
  </script>
  <style>
    html {
      scroll-behavior: smooth;
    }
    .sidebar-link:hover {
      @apply bg-primary text-white;
    }
  </style>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <style>
/* ======== GLOBAL ======== */
body {
    background-color: #f5f7fa !important;
    font-family: "Source Sans 3", sans-serif;
}

/* HEADER */
.app-header {
    box-shadow: 0 2px 4px rgb(0 0 0 / 8%);
    background: #ffffff !important;
}

/* BADGES */
.navbar-badge {
    padding: 3px 6px;
    border-radius: 8px;
    font-size: 0.7rem;
}

/* ======== SIDEBAR ======== */
.app-sidebar {
    background: #e8f5e9 !important;
    border-right: 1px solid #c8e6c9;
}

.sidebar-brand {
    padding: 20px 10px;
    text-align: center;
    background: #2e7d32;
}

.brand-image {
    width: 40px;
}

.brand-text {
    font-weight: 600 !important;
    font-size: 1.1rem;
    color: white !important;
}

.sidebar-menu .nav-item .nav-link {
    margin: 3px 10px;
    border-radius: 10px;
    color: #1b5e20;
    font-weight: 500;
    transition: 0.2s;
}

.sidebar-menu .nav-item .nav-link i {
    color: #2e7d32;
    margin-right: 5px;
}

.sidebar-menu .nav-item .nav-link:hover {
    background: #c8e6c9;
    color: #1b5e20;
}

.sidebar-menu .nav-item .nav-link.active {
    background: #a5d6a7;
    color: #1b5e20;
    font-weight: 700;
}

/* TREEVIEW */
.nav-treeview .nav-link {
    margin-left: 25px;
    background: transparent !important;
}

.nav-treeview .nav-link:hover {
    background: #d0edd1 !important;
}

/* ======== DROPDOWN USER ======== */
.user-header {
    background: linear-gradient(135deg, #a5d6a7, #81c784) !important;
    color: #fff;
}

.user-header img {
    border: 3px solid white;
}

/* ======== FOOTER ======== */
.app-footer {
    background: #ffffff !important;
    border-top: 1px solid #e0e0e0;
    padding: 15px;
}

/* ======== CONTENT ======== */
.app-main .container-fluid {
    padding-top: 20px;
}

/* ===== CARD ===== */
.card {
    border-radius: 16px;
    border: none;
    background: #ffffff;
    box-shadow: 0 6px 16px rgba(0,0,0,0.05);
}

.card-header {
    border-radius: 16px 16px 0 0;
    background: #e8f5e9;
    border-bottom: 1px solid #c8e6c9;
    padding: 18px 22px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-header h3 {
    margin: 0;
    font-weight: 700;
    color: #1b5e20;
}

/* ===== TABLE ===== */
.table {
    border-collapse: separate;
    border-spacing: 0 8px;
}

.table thead th {
    background: #c8e6c9;
    color: #1b5e20;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 12px;
    border: none;
    padding: 12px;
    letter-spacing: 0.5px;
}

/* ===== LIGNES ===== */
.table tbody tr {
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
}

.table tbody td {
    padding: 14px;
    vertical-align: middle;
    border-top: 0 !important;
}

/* Hover ligne */
.table tbody tr:hover {
    background: #f4fbf4;
    box-shadow: 0 2px 10px rgba(0,0,0,0.06);
}

/* ===== Colonne Actions ===== */
.table th:last-child,
.table td:last-child {
    width: 110px !important;
    text-align: center;
}

/* Icônes */
.table td:last-child i {
    font-size: 16px;
    margin: 0 4px;
    transition: 0.2s;
}

.table td:last-child i:hover {
    transform: scale(1.25);
}

/* ===== BADGES ===== */
.badge {
    padding: 6px 10px;
    border-radius: 6px;
    font-size: 0.75rem;
}

.badge.bg-success {
    background-color: #4caf50 !important;
}

.badge.bg-warning {
    background-color: #f9a825 !important;
}

.badge.bg-secondary {
    background-color: #9e9e9e !important;
}

/* ADD BUTTON */
.card-header .btn {
    border-radius: 10px;
    padding: 6px 12px;
    font-weight: 600;
    background: #e8f5e9 !important;
    border: 1px solid #c8e6c9;
    color: #1b5e20;
    transition: 0.2s;
}

.card-header .btn:hover {
    background: #c8e6c9 !important;
    color: #1b5e20;
}

/* ACTION ICONS */
.text-primary i,
.text-warning i,
.text-danger i {
    font-size: 1rem;
    transition: 0.2s;
}

.text-primary:hover i {
    color: #0d47a1 !important;
    transform: scale(1.2);
}

.text-warning:hover i {
    color: #e65100 !important;
    transform: scale(1.2);
}

.text-danger:hover i {
    color: #b71c1c !important;
    transform: scale(1.2);
}

/* ===== TABLE WRAPPER ===== */
.card-body {
    padding: 25px;
}

/* Stats boxes for author */
.small-box {
    border-radius: 12px;
    position: relative;
    display: block;
    margin-bottom: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    color: white !important;
}

.small-box > .inner {
    padding: 20px;
}

.small-box h3 {
    font-size: 2.2rem;
    font-weight: bold;
    margin: 0 0 10px 0;
    white-space: nowrap;
    padding: 0;
    color: white;
}

.small-box p {
    font-size: 1rem;
    color: rgba(255,255,255,0.8);
}

.small-box .icon {
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 0;
    font-size: 70px;
    color: rgba(0,0,0,0.15);
}

/* Colors for stats boxes */
.bg-info { background: #17a2b8 !important; }
.bg-success { background: #28a745 !important; }
.bg-warning { background: #ffc107 !important; }
.bg-danger { background: #dc3545 !important; }

/* BOUTON CREER UN COMPTE */
.btn-create-account {
    background: linear-gradient(135deg, #a5d6a7, #81c784) !important;
    border: none;
    border-radius: 10px;
    padding: 8px 16px;
    font-weight: 600;
    color: #1b5e20;
    transition: 0.3s;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    cursor: pointer;
}

.btn-create-account:hover {
    background: linear-gradient(135deg, #81c784, #66bb6a) !important;
    color: #1b5e20;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

/* OVERLAY FORMULAIRE */
.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.form-container {
    background: white;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    width: 90%;
    max-width: 600px;
    max-height: 90vh;
    overflow-y: auto;
    position: relative;
}

.form-header {
    background: linear-gradient(135deg, #a5d6a7, #81c784);
    border-radius: 16px 16px 0 0;
    padding: 20px;
    color: #1b5e20;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.form-header h3 {
    margin: 0;
    font-weight: 700;
}

.close-btn {
    background: none;
    border: none;
    font-size: 24px;
    color: #1b5e20;
    cursor: pointer;
    transition: 0.3s;
}

.close-btn:hover {
    color: #0d470d;
    transform: scale(1.1);
}

.form-body {
    padding: 25px;
}

.form-group {
    margin-bottom: 20px;
}

.form-label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #1b5e20;
}

.form-control {
    width: 100%;
    padding: 12px;
    border: 2px solid #e8f5e9;
    border-radius: 8px;
    font-size: 14px;
    transition: 0.3s;
    background: #f8fdf8;
}

.form-control:focus {
    outline: none;
    border-color: #81c784;
    box-shadow: 0 0 0 3px rgba(129, 199, 132, 0.2);
}

.form-row {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
}

.form-col {
    flex: 1;
}

.form-actions {
    display: flex;
    gap: 10px;
    justify-content: flex-end;
    margin-top: 25px;
    padding-top: 20px;
    border-top: 1px solid #e8f5e9;
}

.btn-submit {
    background: linear-gradient(135deg, #a5d6a7, #81c784);
    border: none;
    border-radius: 8px;
    padding: 12px 25px;
    color: #1b5e20;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s;
}

.btn-submit:hover {
    background: linear-gradient(135deg, #81c784, #66bb6a);
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

.btn-cancel {
    background: #f5f5f5;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 12px 25px;
    color: #666;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s;
}

.btn-cancel:hover {
    background: #e0e0e0;
}

/* Loading state */
.loading {
    opacity: 0.6;
    pointer-events: none;
}
/* Ajoutez ces styles dans la section CSS */
.password-strength .progress-bar {
    transition: width 0.3s ease;
}

.password-weak {
    background-color: #dc3545 !important;
}

.password-medium {
    background-color: #ffc107 !important;
}

.password-strong {
    background-color: #28a745 !important;
}

.password-very-strong {
    background-color: #20c997 !important;
}

.form-control.is-invalid {
    border-color: #dc3545 !important;
}

.form-control.is-valid {
    border-color: #28a745 !important;
}

.validation-feedback {
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

.text-success {
    color: #28a745 !important;
}

.text-warning {
    color: #ffc107 !important;
}

.text-danger {
    color: #dc3545 !important;
}

/* Responsive */
@media (max-width: 768px) {
    .form-row {
        flex-direction: column;
        gap: 0;
    }
    
    .form-container {
        width: 95%;
        margin: 20px;
    }
}

</style>

  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Start Navbar Links-->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
            <li class="nav-item d-none d-md-block"><a href="{{route('dashboard')}}" class="nav-link">Home</a></li>
            <li class="nav-item d-none d-md-block"><a href="{{route('contact')}}" class="nav-link">Contact</a></li>
          </ul>
          <!--end::Start Navbar Links-->
          <!--begin::End Navbar Links-->
          <ul class="navbar-nav ms-auto">
            <!--begin::Navbar Search-->
            <li class="nav-item">
              <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="bi bi-search"></i>
              </a>
            </li>
            <!--end::Navbar Search-->
            <!--begin::Messages Dropdown Menu-->
           
               
            <!--end::Messages Dropdown Menu-->
            <!--begin::Notifications Dropdown Menu-->
            <li class="nav-item dropdown">
              <a class="nav-link" data-bs-toggle="dropdown" href="#">
                <i class="bi bi-bell-fill"></i>
                <span class="navbar-badge badge text-bg-warning">!</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <span class="dropdown-item dropdown-header"> Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="bi bi-envelope me-2"></i>  new content
                  <span class="float-end text-secondary fs-7">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="bi bi-people-fill me-2"></i>  users requests
                  <span class="float-end text-secondary fs-7">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer"> See All Notifications </a>
              </div>
            </li>
            <!--end::Notifications Dropdown Menu-->
            <!--begin::Fullscreen Toggle-->
            <li class="nav-item">
              <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
              </a>
            </li>
            <!--end::Fullscreen Toggle-->
            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img
                  src="{{asset('assets/images/users.jpg')}}"
                  class="user-image rounded-circle shadow"
                  alt="User Image"
                />
                
                <span class="d-none d-md-inline">{{ auth()->user()->prenom }} {{ auth()->user()->nom }}</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <!--begin::User Image-->
                <li class="user-header bg-success-subtle">
                  <img
                    src="{{asset('assets/images/users.jpg')}}"
                    class="rounded-circle shadow"
                    alt="User Image"
                  />
                  <p>
                    {{ auth()->user()->prenom }} {{ auth()->user()->nom }} - Web Developer
                    <small>Member since Nov. 2025</small>
                  </p>
                </li>
                <!--end::User Image-->
                <!--begin::Menu Body-->
                <li class="user-body">
                  <!--begin::Row-->
                  <div class="row">
                    <div class="col-4 text-center"><a href="#">Followers</a></div>
                    <div class="col-4 text-center"><a href="#">Sales</a></div>
                    <div class="col-4 text-center"><a href="#">Friends</a></div>
                  </div>
                  <!--end::Row-->
                </li>
                <!--end::Menu Body-->
                <!--begin::Menu Footer-->
                <!-- Dans votre app.blade.php, modifiez la section user-footer -->
                <li class="user-footer">
                    <a href="{{route('setting')}}" class="btn btn-default btn-flat">Profile</a>
                    
                    <!-- Formulaire de déconnexion correct -->
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-default btn-flat float-end">Sign out</button>
                    </form>
                </li>
                                <!--end::Menu Footer-->
              </ul>
            </li>
            <!--end::User Menu Dropdown-->
            <!--begin::Create Account Button-->
            <li class="nav-item">
              <button class="nav-link btn-create-account" id="openFormBtn">
                <i class="bi bi-person-plus me-1"></i>Créer un compte
              </button>
            </li>
            <!--end::Create Account Button-->
          </ul>
          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
      </nav>
      <!--end::Header-->
      <!--begin::Sidebar-->
      <aside class="app-sidebar bg-success-subtle" data-bs-theme="light">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="{{route('index')}}" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{asset('assets/images/icon.png')}}"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Culture Bénin | {{ auth()->user()->role->nom }}</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >
             <li class="nav-header">CONTENT</li>
             
                
                <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-box-seam-fill"></i>
                  <p>
                   Contenu
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('typecontenu.index')}}" class="nav-link">
                     <i class="bi bi-list-check"></i>
                      <p>TypeContenu</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('contenu.index')}}" class="nav-link active">
                      <i class="bi bi-journal-text"></i>
                      <p>Contenu available</p>
                    </a>
                  </li>
                 <li class="nav-item">
                    <a href="{{route('commentaire.index')}}" class="nav-link active">
                     <i class="bi bi-chat-left-text"></i>
                      <p>Commentaire</p>
                    </a>
                  </li>
              </li>
                
              </ul>    
              <li class="nav-item">
                <a href="{{route('roles.index')}}" class="nav-link">
                <i class="bi bi-person-badge"></i>
                  <p>Role</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('regions.index')}}" class="nav-link">
                <i class="bi bi-person-badge"></i>
                  <p>Region</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('utilisateur.index')}}" class="nav-link">
                  <i class="bi bi-people"></i>
                  <p>Users</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('langues.index')}}" class="nav-link">
                 <i class="bi bi-globe"></i>
                  <p>Langues</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="nav-icon bi bi-box-seam-fill"></i>
                  <p>
                    Média
                     <i class="nav-arrow bi bi-chevron-right"></i>
                  
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('typemedia.index')}}"" class="nav-link">
                      <i class="bi bi-card-list"></i>
                      <p>TypeMédia</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('media.index')}}" class="nav-link">
                      <i class="bi bi-collection-play"></i>
                      <p>Media available</p>
                    </a>
                  </li>
                  </ul>
                 
              </li>
              <li class="nav-item">
                <a href="{{route('setting')}}" class="nav-link">
                  <i class="bi bi-gear-wide-connected"></i>
                  <p>Settings</p>
                </a>
              </li>
             
              
            
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
          @yield('content')
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
      <!--begin::Footer-->
      <footer class="app-footer">
        <!--begin::To the end-->
        <div class="float-end d-none d-sm-inline">Anything you want</div>
        <!--end::To the end-->
        <!--begin::Copyright-->
        <strong>
          Copyright &copy; 2014-2025&nbsp;
          <a href="{{route('dashboard')}}" class="text-decoration-none"> {{ auth()->user()->role->nom }}.io</a>.
        </strong>
        All rights reserved.
        <!--end::Copyright-->
      </footer>
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->

    <!-- OVERLAY FORMULAIRE CREATION COMPTE -->
    <div class="overlay" id="formOverlay">
      <div class="form-container">
        <div class="form-header">
          <h3><i class="bi bi-person-plus me-2"></i>Créer un nouveau compte</h3>
          <button class="close-btn" id="closeFormBtn">&times;</button>
        </div>
        <div class="form-body">
          <form id="createAccountForm" action="{{ route('utilisateur.store') }}" method="POST">
            @csrf
            
            <div class="form-row">
              <div class="form-col">
                <div class="form-group">
                  <label class="form-label" for="nom">Nom *</label>
                  <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
              </div>
              <div class="form-col">
                <div class="form-group">
                  <label class="form-label" for="prenom">Prénom *</label>
                  <input type="text" class="form-control" id="prenom" name="prenom" required>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="form-label" for="email">Email *</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <!-- Dans la section mot de passe, remplacez par : -->
          <div class="form-row">
              <div class="form-col">
                  <div class="form-group">
                      <label class="form-label" for="mot_de_passe">Mot de passe *</label>
                      <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" required minlength="6">
                      <div class="password-strength mt-2" style="display: none;">
                          <div class="progress" style="height: 5px;">
                              <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                          </div>
                          <small class="password-feedback"></small>
                      </div>
                  </div>
              </div>
              <div class="form-col">
                  <div class="form-group">
                      <label class="form-label" for="mot_de_passe_confirmation">Confirmer le mot de passe *</label>
                      <input type="password" class="form-control" id="mot_de_passe_confirmation" name="mot_de_passe_confirmation" required>
                      <div class="password-match mt-2" style="display: none;">
                          <small class="text-danger">Les mots de passe ne correspondent pas</small>
                      </div>
                  </div>
              </div>
          </div>

           <div class="form-row">
                <div class="form-col">
                    <div class="form-group">
                        <label class="form-label" for="id_role">Rôle *</label>
                        <select class="form-control" id="id_role" name="id_role" required>
                            <option value="">Chargement des rôles...</option>
                        </select>
                    </div>
                </div>
                <div class="form-col">
                    <div class="form-group">
                        <label class="form-label" for="sexe">Sexe</label>
                        <select class="form-control" id="sexe" name="sexe">
                            <option value="">Sélectionner</option>
                            <option value="masculin">masculin</option>
                            <option value="feminin">feminin</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-col">
                    <div class="form-group">
                        <label class="form-label" for="id_langue">Langue</label>
                        <select class="form-control" id="id_langue" name="id_langue">
                            <option value="">Chargement des langues...</option>
                        </select>
                    </div>
                </div>
            </div>
              
            </div>

           <div class="form-group">
              <label class="form-label" for="photo">Photo de profil</label>
              <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
              <small class="text-muted">Formats acceptés: JPG, JPEG, PNG, WEBP (max 2MB)</small>
          </div>

            <div class="form-group">
              <label class="form-label" for="statut">Statut</label>
              <select class="form-control" id="statut" name="statut">
                <option value="actif">Actif</option>
                <option value="inactif">Inactif</option>
                <option value="suspendu">Suspendu</option>
              </select>
            </div>

            <div class="form-actions">
              <button type="button" class="btn-cancel" id="cancelBtn">Annuler</button>
              <button type="submit" class="btn-submit">
                <i class="bi bi-check-lg me-1"></i>Créer le compte
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="{{asset('assets/admin/js/adminlte.js')}}"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined) {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    
<script>
document.addEventListener('DOMContentLoaded', function () {
    const overlay = document.getElementById('formOverlay');
    const openBtn = document.getElementById('openFormBtn');
    const closeBtn = document.getElementById('closeFormBtn');
    const cancelBtn = document.getElementById('cancelBtn');
    const roleSelect = document.getElementById('id_role');
    const langueSelect = document.getElementById('id_langue');
    const createAccountForm = document.getElementById('createAccountForm');

    // Fonction pour charger les rôles depuis l'API
    async function loadRoles() {
        try {
            roleSelect.innerHTML = '<option value="">Chargement des rôles...</option>';

            const response = await fetch('{{ route("api.roles") }}', {
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                }
            });

            if (!response.ok) {
                throw new Error('Erreur lors du chargement des rôles');
            }

            const roles = await response.json();

            roleSelect.innerHTML = '<option value="">Sélectionner un rôle</option>';
            roles.forEach(role => {
                const option = document.createElement('option');
                option.value = role.id;
                option.textContent = role.nom;
                roleSelect.appendChild(option);
            });

        } catch (error) {
            console.error('Erreur:', error);
            roleSelect.innerHTML = '<option value="">Erreur de chargement</option>';
        }
    }

    // Fonction pour charger les langues depuis l'API
    async function loadLangues() {
        try {
            langueSelect.innerHTML = '<option value="">Chargement des langues...</option>';

            const response = await fetch('{{ route("api.langues") }}', {
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                }
            });

            if (!response.ok) {
                throw new Error('Erreur lors du chargement des langues');
            }

            const langues = await response.json();

            langueSelect.innerHTML = '<option value="">Sélectionner une langue</option>';
            langues.forEach(langue => {
                const option = document.createElement('option');
                option.value = langue.id;
                option.textContent = langue.nom_langue;
                langueSelect.appendChild(option);
            });

        } catch (error) {
            console.error('Erreur:', error);
            langueSelect.innerHTML = '<option value="">Erreur de chargement</option>';
        }
    }
    // Ajoutez cette fonction dans votre script
function initPasswordValidation() {
    const passwordInput = document.getElementById('mot_de_passe');
    const confirmPasswordInput = document.getElementById('mot_de_passe_confirmation');
    const passwordStrength = document.querySelector('.password-strength');
    const passwordMatch = document.querySelector('.password-match');
    const progressBar = document.querySelector('.progress-bar');
    const passwordFeedback = document.querySelector('.password-feedback');

    function checkPasswordStrength(password) {
        let strength = 0;
        let feedback = '';

        // Longueur minimale
        if (password.length >= 8) strength += 1;
        
        // Contient des minuscules
        if (/[a-z]/.test(password)) strength += 1;
        
        // Contient des majuscules
        if (/[A-Z]/.test(password)) strength += 1;
        
        // Contient des chiffres
        if (/[0-9]/.test(password)) strength += 1;
        
        // Contient des caractères spéciaux
        if (/[^A-Za-z0-9]/.test(password)) strength += 1;

        // Définir les messages et couleurs
        switch(strength) {
            case 0:
            case 1:
                progressBar.style.width = '20%';
                progressBar.className = 'progress-bar password-weak';
                feedback = 'Faible';
                break;
            case 2:
                progressBar.style.width = '40%';
                progressBar.className = 'progress-bar password-weak';
                feedback = 'Faible';
                break;
            case 3:
                progressBar.style.width = '60%';
                progressBar.className = 'progress-bar password-medium';
                feedback = 'Moyen';
                break;
            case 4:
                progressBar.style.width = '80%';
                progressBar.className = 'progress-bar password-strong';
                feedback = 'Fort';
                break;
            case 5:
                progressBar.style.width = '100%';
                progressBar.className = 'progress-bar password-very-strong';
                feedback = 'Très fort';
                break;
        }

        return { strength, feedback };
    }

    function validatePassword() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        // Afficher/masquer la force du mot de passe
        if (password.length > 0) {
            passwordStrength.style.display = 'block';
            const { feedback } = checkPasswordStrength(password);
            passwordFeedback.textContent = `Force: ${feedback}`;
            passwordFeedback.className = 'password-feedback ' + 
                (feedback === 'Très fort' || feedback === 'Fort' ? 'text-success' : 
                 feedback === 'Moyen' ? 'text-warning' : 'text-danger');
        } else {
            passwordStrength.style.display = 'none';
        }

        // Valider la correspondance des mots de passe
        if (confirmPassword.length > 0) {
            if (password !== confirmPassword) {
                passwordMatch.style.display = 'block';
                confirmPasswordInput.classList.add('is-invalid');
                confirmPasswordInput.classList.remove('is-valid');
            } else {
                passwordMatch.style.display = 'none';
                confirmPasswordInput.classList.remove('is-invalid');
                confirmPasswordInput.classList.add('is-valid');
            }
        } else {
            passwordMatch.style.display = 'none';
            confirmPasswordInput.classList.remove('is-invalid', 'is-valid');
        }

        // Valider la force du mot de passe
        if (password.length > 0) {
            const { strength } = checkPasswordStrength(password);
            if (strength >= 3) {
                passwordInput.classList.remove('is-invalid');
                passwordInput.classList.add('is-valid');
            } else {
                passwordInput.classList.add('is-invalid');
                passwordInput.classList.remove('is-valid');
            }
        } else {
            passwordInput.classList.remove('is-invalid', 'is-valid');
        }
    }

    // Événements
    passwordInput.addEventListener('input', validatePassword);
    confirmPasswordInput.addEventListener('input', validatePassword);

    // Validation avant soumission
    document.getElementById('createAccountForm').addEventListener('submit', function(e) {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;
        const { strength } = checkPasswordStrength(password);

        if (password !== confirmPassword) {
            e.preventDefault();
            alert('Les mots de passe ne correspondent pas');
            return;
        }

        if (strength < 3) {
            e.preventDefault();
            alert('Le mot de passe est trop faible. Il doit contenir au moins 8 caractères avec des lettres majuscules, minuscules et des chiffres.');
            return;
        }

        if (password.length < 6) {
            e.preventDefault();
            alert('Le mot de passe doit contenir au moins 6 caractères');
            return;
        }
    });
}

// Initialiser la validation des mots de passe quand le formulaire s'ouvre
document.getElementById('openFormBtn').addEventListener('click', function() {
    setTimeout(initPasswordValidation, 100);
});

    // Ouvrir le formulaire
    openBtn.addEventListener('click', async function () {
        overlay.style.display = 'flex';
        document.body.style.overflow = 'hidden';

        // Charger les données dynamiques
        await Promise.all([
            loadRoles(),
            loadLangues()
        ]);
    });

    // Fermer le formulaire
    function closeForm() {
        overlay.style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    closeBtn.addEventListener('click', closeForm);
    cancelBtn.addEventListener('click', closeForm);

    // Fermer en cliquant en dehors du formulaire
    overlay.addEventListener('click', function (e) {
        if (e.target === overlay) {
            closeForm();
        }
    });

    // Fermer avec la touche Echap
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && overlay.style.display === 'flex') {
            closeForm();
        }
    });

    // Gestion de la soumission du formulaire
    createAccountForm.addEventListener('submit', function (e) {
    e.preventDefault();

    // Validation
    if (!roleSelect.value) {
        alert('Veuillez sélectionner un rôle');
        return;
    }

    const formData = new FormData(createAccountForm);
    const submitBtn = this.querySelector('.btn-submit');
    
    // Désactiver le bouton pendant la soumission
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="bi bi-arrow-repeat me-1"></i>Création en cours...';

    fetch('{{ route("utilisateur.store") }}', {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(err => { throw err; });
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            // Si c'est un manager, afficher un message spécifique
            if (data.is_manager) {
                alert('Compte manager créé avec succès! Le manager devra configurer l\'authentification à deux facteurs lors de sa première connexion.');
            } else {
                alert(data.message || 'Compte créé avec succès!');
            }
            
            closeForm();
            createAccountForm.reset();
            
            // Recharger la page pour voir le nouvel utilisateur
            setTimeout(() => {
                window.location.reload();
            }, 1500);
        } else {
            throw new Error(data.message || 'Erreur lors de la création du compte');
        }
    })
    .catch(error => {
        console.error('Erreur:', error);
        alert('Erreur: ' + (error.message || 'Une erreur est survenue'));
    })
    .finally(() => {
        // Réactiver le bouton
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="bi bi-check-lg me-1"></i>Créer le compte';
    });
  });
});
</script>
    <!--end::OverlayScrollbars Configure-->
    <!-- OPTIONAL SCRIPTS -->
    <!-- sortablejs -->
    <script
      src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
      crossorigin="anonymous"
    ></script>
    <!-- sortablejs -->
    <script>
     document.addEventListener('DOMContentLoaded', function() {
    const connectedSortable = document.querySelector('.connectedSortable');
    if (connectedSortable) {
        new Sortable(connectedSortable, {
            group: 'shared',
            handle: '.card-header',
        });
    }
});
    </script>
    <!-- apexcharts -->
   
    <!-- ChartJS -->
    <script>
      // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
      // IT'S ALL JUST JUNK FOR DEMO
      // ++++++++++++++++++++++++++++++++++++++++++

      const sales_chart_options = {
        series: [
          {
            name: 'Digital Goods',
            data: [28, 48, 40, 19, 86, 27, 90],
          },
          {
            name: 'Electronics',
            data: [65, 59, 80, 81, 56, 55, 40],
          },
        ],
        chart: {
          height: 300,
          type: 'area',
          toolbar: {
            show: false,
          },
        },
        legend: {
          show: false,
        },
        colors: ['#0d6efd', '#20c997'],
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: 'smooth',
        },
        xaxis: {
          type: 'datetime',
          categories: [
            '2023-01-01',
            '2023-02-01',
            '2023-03-01',
            '2023-04-01',
            '2023-05-01',
            '2023-06-01',
            '2023-07-01',
          ],
        },
        tooltip: {
          x: {
            format: 'MMMM yyyy',
          },
        },
      };

      const sales_chart = new ApexCharts(
        document.querySelector('#revenue-chart'),
        sales_chart_options,
      );
      sales_chart.render();
    </script>
    <!-- jsvectormap -->
    <script
      src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"
      integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/benin.js"
      crossorigin="anonymous"
    ></script>
    <!-- jsvectormap -->
    <script>
      // Benin map by jsVectorMap
      new jsVectorMap({
        selector: '#world-map',
        map: 'benin',
      });

      // Sparkline charts
      const option_sparkline1 = {
        series: [
          {
            data: [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };

      const sparkline1 = new ApexCharts(document.querySelector('#sparkline-1'), option_sparkline1);
      sparkline1.render();

      const option_sparkline2 = {
        series: [
          {
            data: [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };

      const sparkline2 = new ApexCharts(document.querySelector('#sparkline-2'), option_sparkline2);
      sparkline2.render();

      const option_sparkline3 = {
        series: [
          {
            data: [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };

      const sparkline3 = new ApexCharts(document.querySelector('#sparkline-3'), option_sparkline3);
      sparkline3.render();
    </script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    
    <!-- Script pour gérer l'overlay du formulaire -->
    <script>
        $(document).ready(function() {
            // Initialisation DataTables
            $('#datatable').DataTable({
                "pageLength": 10,
                "lengthMenu": [5, 10, 25, 50, 100],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
                }
            });

            // Gestion de l'overlay du formulaire
            const overlay = document.getElementById('formOverlay');
            const openBtn = document.getElementById('openFormBtn');
            const closeBtn = document.getElementById('closeFormBtn');
            const cancelBtn = document.getElementById('cancelBtn');
            const roleSelect = document.getElementById('id_role');
            const langueSelect = document.getElementById('id_langue');

            // Fonction pour charger les rôles depuis l'API
            async function loadRoles() {
                try {
                    roleSelect.innerHTML = '<option value="">Chargement des rôles...</option>';
                    
                    const response = await fetch('{{ route("api.roles") }}', {
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });
                    
                    if (!response.ok) {
                        throw new Error('Erreur lors du chargement des rôles');
                    }
                    
                    const roles = await response.json();
                    
                    roleSelect.innerHTML = '<option value="">Sélectionner un rôle</option>';
                    roles.forEach(role => {
                        const option = document.createElement('option');
                        option.value = role.id;
                        option.textContent = role.nom;
                        roleSelect.appendChild(option);
                    });
                    
                } catch (error) {
                    console.error('Erreur:', error);
                    roleSelect.innerHTML = '<option value="">Erreur de chargement</option>';
                }
            }

            // Fonction pour charger les langues depuis l'API
            async function loadLangues() {
                try {
                    langueSelect.innerHTML = '<option value="">Chargement des langues...</option>';
                    
                    const response = await fetch('{{ route("api.langues") }}', {
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });
                    
                    if (!response.ok) {
                        throw new Error('Erreur lors du chargement des langues');
                    }
                    
                    const langues = await response.json();
                    
                    langueSelect.innerHTML = '<option value="">Sélectionner une langue</option>';
                    langues.forEach(langue => {
                        const option = document.createElement('option');
                        option.value = langue.id;
                        option.textContent = langue.nom_langue;
                        langueSelect.appendChild(option);
                    });
                    
                } catch (error) {
                    console.error('Erreur:', error);
                    langueSelect.innerHTML = '<option value="">Erreur de chargement</option>';
                }
            }

            // Ouvrir le formulaire
            openBtn.addEventListener('click', async function() {
                overlay.style.display = 'flex';
                document.body.style.overflow = 'hidden';
                
                // Charger les données dynamiques
                await Promise.all([
                    loadRoles(),
                    loadLangues()
                ]);
            });

            // Fermer le formulaire
            function closeForm() {
                overlay.style.display = 'none';
                document.body.style.overflow = 'auto';
            }

            closeBtn.addEventListener('click', closeForm);
            cancelBtn.addEventListener('click', closeForm);

            // Fermer en cliquant en dehors du formulaire
            overlay.addEventListener('click', function(e) {
                if (e.target === overlay) {
                    closeForm();
                }
            });

            // Fermer avec la touche Echap
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && overlay.style.display === 'flex') {
                    closeForm();
                }
            });

            // Gestion de la soumission du formulaire
            document.getElementById('createAccountForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Validation supplémentaire
                if (!roleSelect.value) {
                    alert('Veuillez sélectionner un rôle');
                    return;
                }
                
                // Ici vous pouvez ajouter la logique de soumission AJAX si nécessaire
                // Pour l'instant, on simule une soumission réussie
                
                // Afficher un message de succès
                alert('Compte créé avec succès!');
                
                // Fermer le formulaire
                closeForm();
                
                // Réinitialiser le formulaire
                this.reset();
                
                // En production, vous voudrez probablement soumettre le formulaire normalement
                // this.submit();
            });
        });
    </script>

    <!--end::Script-->
    @stack('scripts')
  </body>
  <!--end::Body-->
</html>
