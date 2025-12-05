@extends('admin.layouts.app')
@section('content')
 <div class="row">
              <div class="col-md-12">
                <div class="card mb-4">
                  <div class="card-header"><h3 class="fw-bold">Listes des typecontenus </h3>
                   <a  href="{{route('typecontenu.create')}}" class="btn btn-sm bg-success-subtle float-end">Add TypeContenu</a>
                      
                </div>
                  
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered" id="datatable">
                      <thead>
                        <tr>
                         
                          <th>Nom TypeContenu</th>
                          
                          <th >Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                       @foreach ($typecontenus as $typecontenu)
                         
                            <tr>
                            <td>{{$typecontenu->nom}}</td>
                            
                            <td>
                                <a href="{{ route('typecontenu.show', $typecontenu->id) }}"  class="text-primary"><i class="bi bi-eye-fill fs-12"></i></a>
                                <a href="{{route('typecontenu.edit', $typecontenu->id)}}"  class=" text-warning"><i class="bi bi-pencil-square fs-12"></i></a>
                                @if(auth()->user()->id_role == 3)
                                <form action="{{ route('typecontenu.destroy', $typecontenu->id) }}" method="POST" style="display:inline;">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-link text-danger " onclick="return confirm('Are you sure?')"><i class="bi bi-trash-fill fs-12"></i></button>
                                </form>
                                @endif
                               

                            </td>
                          
                            </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                 
                </div>
@endsection