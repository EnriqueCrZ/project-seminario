@extends('layouts.admin')

@section('titulo')
    Crear Piloto
@endsection

@section('main-content')
    <div class="container">
        <div class="card">

            {{--<div class="card-header">
                <div class="col-md-12 text-secondary d-flex justify-content-center text-blue text-uppercase">
                    <h3>Crear proveedor</h3>
                </div>
            </div>--}}
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
                <form action="{{route('piloto.store')}}" method="POST" novalidate>
                    @csrf

                    <div class="form-group">
                        <label for="complete_name">Nombre de Piloto</label>
                        <input class="form-control String" type="text" name="complete_name" id="complete_name"
                               value="{{old('complete_name')}}" maxlength="60"
                               required="required">
                        @if($errors->has('nombre'))
                            <p class="text-danger">{{$errors->first('complete_name')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="provider_address">Dirección</label>
                        <input class="form-control String" type="text" name="address" id="address"
                               value="{{old('address')}}" required="required"
                        >
                        @if($errors->has('address'))
                            <p class="text-danger">{{$errors->first('address')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="license">NIT</label>
                        <input class="form-control String" type="text" name="license" id="license"
                               value="{{old('license')}}" required="required"
                        >
                        @if($errors->has('lisence'))
                            <p class="text-danger">{{$errors->first('license')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Telefono</label>
                        <input class="form-control String" type="text" name="phone_number" id="phone_number"
                               value="{{old('phone_number')}}" required="required"
                        >
                        @if($errors->has('phone_number'))
                            <p class="text-danger">{{$errors->first('phone_number')}}</p>
                        @endif
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-outline-info" type="submit">Crear</button>
                        <a href="{{ url()->previous() }}" class="btn btn-outline-danger">Regresar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
