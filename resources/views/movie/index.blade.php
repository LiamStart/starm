@extends('movie.base')
@section('action-content')
<!-- Ventana modal editar -->

  <!-- Main content -->
  <section class="content">
     <div class="col-md-12">
        <div class="card">
              <div class="card-header card-header-primary">
                    <h4 class="card-title ">Movie</h4>
                    <p class="card-category">Gestión de Movies</p> 
                    <div class="col-md-4">
                     <a href="{{route('movie.create')}}" class="btn btn-default">Crear</a>
                    </div>
              </div>
              
              <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead class="">
                      <th>Nombre</th>
                      <th>Creado</th>
                      <th>Estado</th>
                      <th>Editar</th>
                </thead>
                <tbody>
                  @foreach($movie as $value)
                  <tr>
                      <td>{{$value->nombre}}</td>
                      <td>{{$value->created_at}}</td>
                      <td>@if(($value->estado)!=0) ACTIVO @else INACTIVO @endif</td>
                      <td><a href="{{route('movie.edit',['id'=>$value->id])}}" class="btn btn-default">Editar</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
     </div>
  </section>
  <!-- /.content -->

@endsection
