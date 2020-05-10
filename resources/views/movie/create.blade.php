@extends('movie.base')
@section('action-content')
<style type="text/css">
div.stars {
  width: 270px;
  display: inline-block;
}

input.star { display: none; }

label.star {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}

input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}

input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}

input.star-1:checked ~ label.star:before { color: #F62; }

label.star:hover { transform: rotate(-15deg) scale(1.3); }

label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}
</style>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<section class="content">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <label class="control-label">Creación</label>
            </div>
            <div class="card-body">
                <div class="pl-lg-4">
                        <form action="{{route('movie.store')}}" method="post" id="guard">
                            @csrf
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Nombre') }}</label>
                                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre') }}" value="{{ old('name') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'nombre'])
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Descripción') }}</label>
                                <textarea name="descripcion" class="form-control" id="descripcion" cols="30" rows="10"></textarea>
                                @include('alerts.feedback', ['field' => 'descripcion'])
                            </div>
                            <div class="form-group{{ $errors->has('ano') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Año de Publicación') }}</label>
                                <input type="text" name="ano" id="input-name" class="form-control form-control-alternative{{ $errors->has('ano') ? ' is-invalid' : '' }}" placeholder="{{ __('ano') }}" value="{{ old('ano') }}" required autofocus>

                                @include('alerts.feedback', ['field' => 'ano'])
                            </div>
                            <div class="form-group {{$errors->has('categoria')}}">
                                <label class="control-label">Género</label>
                                <select name="id_categoria" id="id_categoria" class="form-control">
                                    <option value="0">Seleccione</option>
                                    @foreach($categoria as $value)
                                      <option value="{{$value->id}}">{{$value->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group {{$errors->has('tipo')}}">
                                <label class="control-label">Tipo</label>
                                <select name="id_tipo" id="id_tipo" class="form-control">
                                    <option value="0">Seleccione</option>
                                    @foreach($tipo as $value)
                                      <option value="{{$value->id}}">{{$value->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group {{$errors->has('input-sta')}}">
                            <input type="hidden" name="raiting" id="raiting">
                            <label class="control-label" for="">Calificación</label>
                            </div>
                            <div class="stars">
                                <form action="">
                                    <input class="star star-5" id="star-5" type="radio" name="star"/>
                                    <label class="star star-5" for="star-5"></label>
                                    <input class="star star-4" id="star-4" type="radio" name="star"/>
                                    <label class="star star-4" for="star-4"></label>
                                    <input class="star star-3" id="star-3" type="radio" name="star"/>
                                    <label class="star star-3" for="star-3"></label>
                                    <input class="star star-2" id="star-2" type="radio" name="star"/>
                                    <label class="star star-2" for="star-2"></label>
                                    <input class="star star-1" id="star-1" type="radio" name="star"/>
                                    <label class="star star-1" for="star-1"></label>
                                </form>
                            </div>

                            <div class="form-group {{$errors->has('estado')}}">
                                <label class="control-label">Estado</label>
                                <select name="estado" id="estado" class="form-control">
                                    <option value="0">INACTIVO</option>
                                    <option value="1">ACTIVO</option>
                                </select>
                            </div>
                            <button type="button" onclick="guardar()" class="btn btn-default" id="guardar">GUARDAR</button>
                        </form>
                        
                </div>
            </div>
        </div>    
    </div>
</section>
<script type="text/javascript">
    $(':radio').change(function() {
    console.log('New star rating: ' + this.value);
        $("#raiting").val(this.value);
    });
    function guardar(){
            document.getElementById('guard').submit();
    }
</script>
@endsection
