@extends('admin.layouts.app')
@section('content')
 <div class="row">
              <div class="col-md-12">
                <div class="card mb-4">
                  <div class="card-header"><h3 class="fw-bold">Listes des langues </h3>
                
                    
                <a href="{{route('langues.create')}}" class="btn bg-success-subtle float-end">
                    <i class="bi bi-plus-lg"></i> Add Language
                </a>   
                </div>
                  
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered" id="datatable">
                      <thead>
                        <tr>
                          <th>Code langue</th>
                          <th>Nom langue</th>
                          
                          <th >Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                       @foreach ($langues as $langue)
                         
                            <tr>
                            <td>{{$langue->code_langue}}</td>
                            <td>{{$langue->nom_langue}}</td>
                            <td>
                                <a href="{{ route('langues.show', $langue->id) }}"  class="text-primary"><i class="bi bi-eye-fill fs-12"></i></a>
                                <a href="{{route('langues.edit', $langue->id)}}"  class="text-warning"><i class="bi bi-pencil-square fs-12"></i></a>
                                @if(auth()->user()->id_role == 3)
                                <form action="{{ route('langues.destroy', $langue->id) }}" method="POST" style="display:inline;">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-link text-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-trash-fill fs-12"></i></button>
                                </form>
                                @endif
                               

                            </td>
                          
                            </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-end">
                      
                      <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                  </div>
                </div>
@endsection