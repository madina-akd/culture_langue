<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Espace Auteur | Histoires du Bénin</title>
    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->
    <!--begin::Primary Meta Tags-->
    <meta name="title" content="Espace Auteur | Histoires du Bénin" />
    <meta name="author" content="Culture et Langue Bénin" />
    <meta
      name="description"
      content="Espace auteur pour publier des histoires, contes et recettes du Bénin"
    />
    <!--end::Primary Meta Tags-->
    <!--begin::Accessibility Features-->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="{{asset('assets/admin/css/adminlte.css')}}" as="style" />
    <!--end::Accessibility Features-->
    <!--begin::Fonts-->
    <script src="https://cdn.tailwindcss.com"></script>
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
            <a class="text-xl font-bold text-amber-800" href="{{ route('index') }}">Benin Découverte</a>
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
            <li class="nav-item d-none d-md-block">
              <a href="{{ route('auteur.dashboard') }}" class="nav-link">Tableau de Bord</a>
            </li>
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

            <!--begin::Notifications Dropdown Menu-->
            <li class="nav-item dropdown">
              <a class="nav-link" data-bs-toggle="dropdown" href="#">
                <i class="bi bi-bell-fill"></i>
                <span class="navbar-badge badge text-bg-warning" id="notification-count">0</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <span class="dropdown-item dropdown-header">Notifications</span>
                <div class="dropdown-divider"></div>
                <div id="notifications-list">
                  <a href="#" class="dropdown-item">
                    <i class="bi bi-info-circle me-2"></i>Aucune notification
                  </a>
                </div>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">Voir toutes les notifications</a>
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
                  src="{{ asset('assets/admin/img/avatar5.png') }}"
                  class="user-image rounded-circle shadow"
                  alt="Image de l'auteur"
                />
                <span class="d-none d-md-inline" id="user-name">
                  {{ Auth::guard('auteur')->user()->prenom ?? 'Auteur' }} {{ Auth::guard('auteur')->user()->nom ?? '' }}
                </span>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <!--begin::User Image-->
                <li class="user-header bg-success-subtle">
                  <img
                    src="{{ asset('assets/admin/img/avatar5.png') }}"
                    class="rounded-circle shadow"
                    alt="Image de l'auteur"
                  />
                  <p>
                    <span id="user-fullname">
                      {{ Auth::guard('auteur')->user()->prenom ?? 'Auteur' }} {{ Auth::guard('auteur')->user()->nom ?? '' }}
                    </span>
                    <small>Auteur depuis {{ Auth::guard('auteur')->user()->date_inscription ? \Carbon\Carbon::parse(Auth::guard('auteur')->user()->date_inscription)->format('M Y') : 'maintenant' }}</small>
                  </p>
                </li>
                <!--end::User Image-->
                <!--begin::Menu Footer-->
                <li class="user-footer">
                  <a href="{{ route('auteur.profile') }}" class="btn btn-default btn-flat">Profil</a>
                  <a href="{{ route('auteur.logout') }}" class="btn btn-default btn-flat float-end" 
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Déconnexion
                  </a>
                  <form id="logout-form" action="{{ route('auteur.logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </li>
                <!--end::Menu Footer-->
              </ul>
            </li>
            <!--end::User Menu Dropdown-->
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
          <a href="{{route('dash')}}" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{asset('assets/images/icon.png')}}"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Auteur </span>
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
              <!-- Tableau de Bord -->
              <li class="nav-item">
                <a href="{{ route('auteur.dashboard') }}" class="nav-link {{ request()->routeIs('auteur.dashboard') ? 'active' : '' }}">
                  <i class="nav-icon bi bi-speedometer2"></i>
                  <p>Tableau de Bord</p>
                </a>
              </li>

              <li class="nav-header">MES CONTENUS</li>

              <!-- Histoires & Contes -->
              <li class="nav-item">
                <a href="{{ route('auteur.contenu.index', ['type' => 'histoire']) }}" 
                   class="nav-link {{ request()->get('type') == 'histoire' ? 'active' : '' }}">
                  <i class="nav-icon bi bi-journal-text"></i>
                  <p>Histoires & Contes</p>
                </a>
              </li>

              <!-- Recettes -->
              <li class="nav-item">
                <a href="{{ route('auteur.contenu.index', ['type' => 'recette']) }}" 
                   class="nav-link {{ request()->get('type') == 'recette' ? 'active' : '' }}">
                  <i class="nav-icon bi bi-egg-fried"></i>
                  <p>Recettes</p>
                </a>
              </li>

              <!-- Traditions -->
              <li class="nav-item">
                <a href="{{ route('auteur.contenu.index', ['type' => 'tradition']) }}" 
                   class="nav-link {{ request()->get('type') == 'tradition' ? 'active' : '' }}">
                  <i class="nav-icon bi bi-people-fill"></i>
                  <p>Traditions</p>
                </a>
              </li>

              <!-- Nouveau Contenu -->
              <li class="nav-item">
                <a href="{{ route('auteur.contenu.create') }}" 
                   class="nav-link {{ request()->routeIs('auteur.contenu.create') ? 'active' : '' }}">
                  <i class="nav-icon bi bi-plus-circle"></i>
                  <p>Nouveau Contenu</p>
                </a>
              </li>
              <!-- Après la section "MES CONTENUS" -->
                <li class="nav-header">MÉDIAS</li>

                <!-- Médias -->
                <li class="nav-item">
                    <a href="{{ route('auteur.media.index') }}" 
                    class="nav-link {{ request()->routeIs('auteur.media.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-images"></i>
                        <p>Mes Médias</p>
                    </a>
                </li>

                <!-- Nouveau Média -->
                <li class="nav-item">
                    <a href="{{ route('auteur.media.create') }}" 
                    class="nav-link {{ request()->routeIs('auteur.media.create') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-cloud-upload"></i>
                        <p>Ajouter un Média</p>
                    </a>
                </li>

              <li class="nav-header">COMPTE</li>

              <!-- Profil -->
              <li class="nav-item">
                <a href="{{ route('auteur.profile') }}" class="nav-link {{ request()->routeIs('auteur.profile') ? 'active' : '' }}">
                  <i class="nav-icon bi bi-person"></i>
                  <p>Mon Profil</p>
                </a>
              </li>

              <!-- Retour au site -->
              <li class="nav-item">
                <a href="{{ route('index') }}#contenus" class="nav-link" target="_blank">
                  <i class="nav-icon bi bi-house"></i>
                  <p>Retour au Site</p>
                </a>
              </li>

            </ul>
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
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
      </main>
      <!--end::App Main-->

      <!--begin::Footer-->
      <footer class="app-footer">
        <div class="float-end d-none d-sm-inline">
          <strong>Espace Auteur</strong>
        </div>
        <strong>
          Copyright &copy; 2024 
          <a href="{{ route('index') }}" class="text-decoration-none">Culture et Langue Bénin</a>.
        </strong>
        Tous droits réservés.
      </footer>
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->

    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    
    <!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)-->
    
    <!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)-->
    
    <!--begin::Required Plugin(AdminLTE)-->
    <script src="{{ asset('assets/admin/js/adminlte.js') }}"></script>
    <!--end::Required Plugin(AdminLTE)-->
    
    <!--begin::OverlayScrollbars Configure-->
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
    <!--end::OverlayScrollbars Configure-->

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // Initialisation DataTables
            $('.datatable').DataTable({
                "pageLength": 10,
                "lengthMenu": [5, 10, 25, 50, 100],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
                }
            });

            // Gestion des notifications
            function updateNotifications() {
                // Simuler des notifications (à remplacer par une vraie API)
                const notifications = [];
                
                if (notifications.length > 0) {
                    $('#notification-count').text(notifications.length).show();
                    let notificationsHtml = '';
                    notifications.forEach(notif => {
                        notificationsHtml += `
                            <a href="#" class="dropdown-item">
                                <i class="${notif.icon} me-2"></i>${notif.message}
                                <span class="float-end text-secondary fs-7">${notif.time}</span>
                            </a>
                            <div class="dropdown-divider"></div>
                        `;
                    });
                    $('#notifications-list').html(notificationsHtml);
                } else {
                    $('#notification-count').hide();
                    $('#notifications-list').html(`
                        <a href="#" class="dropdown-item">
                            <i class="bi bi-info-circle me-2"></i>Aucune notification
                        </a>
                    `);
                }
            }

            updateNotifications();
        });
    </script>

    <!-- Scripts spécifiques à la page -->
    @stack('scripts')
    
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>