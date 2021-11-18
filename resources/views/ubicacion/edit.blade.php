@extends('layouts.admin')

@section('titulo')
    Editar Ubicacion {{$location->name}}
@endsection

@section('main-content')
    <div class="container">
        <div class="card">

            <div class="card-body">

                @if ( ! $errors->isEmpty() )
                    <div class="row">
                        @foreach ( $errors->all() as $error )
                            <div class="col-md-6 col-md-offset-2 alert alert-danger">{{ $error }}</div>
                        @endforeach
                    </div>
                @elseif ( Session::has( 'message' ) )
                    <div class="row">
                        <div class="col-md-6 col-md-offset-2 alert alert-success">{{ Session::get( 'message' ) }}</div>
                    </div>
                @else
                    <p>&nbsp;</p>
                @endif
                <form action="{{route('ubicacion.update',$location->id_location)}}" method="POST" novalidate>
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="complete_name">Nombre de la Ubicacion</label>
                        <input class="form-control String" type="text" name="name" id="name"
                               value="{{old('name',$location->name)}}" maxlength="60"
                               required="required">
                        @if($errors->has('nombre'))
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="latitude">Latitud</label>
                        <input class="form-control String" type="text" name="latitude" id="latitude"
                               value="{{old('nit',$location->nit)}}" required="required"
                        >
                        @if($errors->has('latitude'))
                            <p class="text-danger">{{$errors->first('latitude')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="longitude">Logitud</label>
                        <input class="form-control String" type="text" name="longitude" id="longitude"
                               value="{{old('longitude',$location->logitude)}}" required="required"
                        >
                        @if($errors->has('longitude'))
                            <p class="text-danger">{{$errors->first('longitude')}}</p>
                        @endif
                    </div>

                    <div class="btn-group">
                        <button class="btn btn-outline-info" type="submit">Actualizar</button>
                        <a href="{{ url()->previous() }}" class="btn btn-outline-danger">Regresar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
