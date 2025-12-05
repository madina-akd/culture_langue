@extends('admin.layouts.app')
@section('content')
<!--begin::App Content Header-->
<div class="app-content-header">
  <!--begin::Container-->
  <div class="container-fluid">
    <!--begin::Row-->
    <div class="row">
      <div class="col-sm-6"><h3 class="mb-0">Dashboard</h3></div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
      </div>
    </div>
    <!--end::Row-->
  </div>
  <!--end::Container-->
</div>
<!--end::App Content Header-->

<!--begin::App Content-->
<div class="app-content">
  <!--begin::Container-->
  <div class="container-fluid">
    <!-- Stats Cards -->
    <div class="row mb-4">
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-white text-success h-100">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Contenus</div>
                <div class="h5 mb-0 font-weight-bold">{{ $totalContenus }}</div>
              </div>
              <div class="col-auto">
                <i class="bi bi-journal-text fa-2x text-success-50"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-white text-info h-100">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Utilisateurs</div>
                <div class="h5 mb-0 font-weight-bold">{{ $totalUtilisateurs }}</div>
              </div>
              <div class="col-auto">
                <i class="bi bi-people fa-2x text-info-50"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-white text-warning h-100">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Langues</div>
                <div class="h5 mb-0 font-weight-bold">{{ $totalLangues }}</div>
              </div>
              <div class="col-auto">
                <i class="bi bi-globe fa-2x text-warning-50"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-white text-primary h-100">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Régions</div>
                <div class="h5 mb-0 font-weight-bold">{{ $totalRegions }}</div>
              </div>
              <div class="col-auto">
                <i class="bi bi-map fa-2x text-primarys-50"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Charts Row -->
    <div class="row mb-4">
      <!-- Contenus par Région -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background: #e8f5e9;">
            <h6 class="m-0 font-weight-bold text-primary">Nombre de contenus par région</h6>
          </div>
          <div class="card-body">
            <div class="chart-area">
              <canvas id="contenusRegionChart" height="250"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Utilisateurs par Rôle -->
      <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background: #e8f5e9;">
            <h6 class="m-0 font-weight-bold text-primary">Utilisateurs par Rôle</h6>
          </div>
          <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
              <canvas id="utilisateursRoleChart" height="250"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- User Profile and Recent Data -->
    <div class="row">
      <!-- User Profile -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card shadow h-100">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background: #e8f5e9;">
            <h6 class="m-0 font-weight-bold text-primary">Profil Admin</h6>
          </div>
          <div class="card-body">
            <div class="text-center">
              <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem; border-radius: 50%;" 
                   src="{{ Auth::user()->photo ? asset('assets/images/'.auth()->user()->photo)  : asset('assets/images/users.jpg') }}" 
                   alt="Admin Profile">
            </div>
            <h4 class="text-center font-weight-bold text-primary">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</h4>
            <p class="text-center text-muted">{{ Auth::user()->role->nom ?? 'Administrateur' }}</p>
            <div class="text-center">
              <a href="{{ route('setting') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-pencil me-1"></i>Modifier le profil
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Tableau des utilisateurs par rôle -->
      <div class="col-xl-8 col-md-6 mb-4">
        <div class="card shadow h-100">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background: #e8f5e9;">
            <h6 class="m-0 font-weight-bold text-primary">Utilisateurs par Rôle</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-hover" id="datatable" width="100%" cellspacing="0">
                <thead class="thead-light">
                  <tr>
                    <th>Rôle</th>
                    <th>Nombre d'utilisateurs</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($usersByRole as $role)
                  <tr>
                    <td>{{ $role['nom'] }}</td>
                    <td>{{ $role['utilisateurs_count'] }}</td>
                    <td>
                      <a href="{{ route('utilisateur.index') }}?role={{ $role['id'] ?? '' }}" class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-eye me-1"></i>Voir
                      </a>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="3" class="text-center">Aucune donnée disponible</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div>
  <!--end::Container-->
</div>
<!--end::App Content-->
@endsection

@push('scripts')
<!-- ChartJS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- jsVectorMap -->
<link href="https://cdn.jsdelivr.net/npm/jsvectormap/dist/css/jsvectormap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/jsvectormap/dist/js/jsvectormap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsvectormap/dist/maps/benin.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, initializing charts...');
    
    // Chart des contenus par région
    const contenusRegionCtx = document.getElementById('contenusRegionChart');
    if (contenusRegionCtx) {
        new Chart(contenusRegionCtx, {
            type: 'bar',
            data: {
                labels: @json($contentsByRegion->pluck('nom')),
                datasets: [{
                    label: 'Nombre de contenus',
                    data: @json($contentsByRegion->pluck('contenus_count')),
                    backgroundColor: 'rgba(76, 175, 80, 0.7)',
                    borderColor: 'rgba(76, 175, 80, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    }

    // Chart des utilisateurs par rôle
    const utilisateursRoleCtx = document.getElementById('utilisateursRoleChart');
    if (utilisateursRoleCtx) {
        new Chart(utilisateursRoleCtx, {
            type: 'doughnut',
            data: {
                labels: @json($usersByRole->pluck('nom')),
                datasets: [{
                    data: @json($usersByRole->pluck('utilisateurs_count')),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 159, 64, 0.7)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });
    }

    // Carte du Bénin
    const beninMap = document.getElementById('benin-map');
    if (beninMap) {
        new jsVectorMap({
            selector: '#benin-map',
            map: 'benin',
            backgroundColor: '#f8fdf8',
            regionStyle: {
                initial: {
                    fill: '#a5d6a7',
                    stroke: '#81c784',
                    strokeWidth: 1
                },
                hover: {
                    fill: '#4caf50'
                }
            }
        });
    }

    // DataTables
    $('#datatable').DataTable({
        "pageLength": 5,
        "lengthMenu": [5, 10, 25, 50],
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
        }
    });
});
</script>
@endpush