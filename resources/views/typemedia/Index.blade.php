@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="fw-bold">Listes des Types media</h3>
                <a  href="{{route('typemedia.create')}}" class="btn btn-sm bg-success-subtle float-end">Add typemedia</a>
            </div>

            <!-- Barre de recherche -->
            <div class="mb-4">
                <input type="text" id="searchInput" class="form-control"
                       placeholder="Rechercher un typemedia...">
            </div>
        </div>
    </div>
</div>

<div class="row">
    @foreach ($typemedias as $typemedia)
        <div class="col-12 col-sm-6 col-md-3 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="info-box">
                    <span class="info-box-icon text-bg-primary shadow-sm">
                        <i class="bi bi-collection-play"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">{{ $typemedia->nom }}</span>
                        <span class="info-box-number">{{ $typemedia->prix }} fcfa</span>
                    </div>
                </div>

                <!-- Actions alignées en bas -->
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('typemedia.show', $typemedia->id) }}" class="text-primary">
                        <i class="bi bi-eye-fill fs-12"></i>
                    </a>

                    <a href="{{ route('typemedia.edit', $typemedia->id) }}" class="text-warning">
                        <i class="bi bi-pencil-square fs-12"></i>
                    </a>
                    @if(auth()->user()->id_role == 3)
                    <form action="{{ route('typemedia.destroy', $typemedia->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-link text-danger p-0"
                                onclick="return confirm('Supprimer ce type de media ?')">
                            <i class="bi bi-trash-fill fs-12"></i>
                        </button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- SCRIPT DE RECHERCHE LIVE -->
<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        let search = this.value.toLowerCase();
        let cards = document.querySelectorAll('.info-box');

        cards.forEach(card => {
            let name = card.querySelector('.info-box-text').textContent.toLowerCase();
            card.closest('.col-12').style.display = name.includes(search) ? 'block' : 'none';
        });
    });
</script>
@endsection
