@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <div class="card">

            <div class="card-header">
                <div class="col-md-12 text-secondary d-flex justify-content-center text-blue text-uppercase">
                    <h3>Crear proveedor</h3>
                </div>
            </div>
            <div class="card-body">

                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    </ul @endif
                <form action="{{route('proveedor.store')}}" method="POST" novalidate>
                    @csrf

                    <div class="form-group">
                        <label for="provider_name">Nombre de Proveedor</label>
                        <input class="form-control String" type="text" name="provider_name" id="provider_name"
                               value="{{old('provider_name')}}" maxlength="60"
                               required="required">
                        @if($errors->has('nombre'))
                            <p class="text-danger">{{$errors->first('provider_name')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="provider_address">Dirección</label>
                        <input class="form-control String" type="text" name="provider_address" id="provider_address"
                               value="{{old('codigo_empleado')}}" required="required"
                        >
                        @if($errors->has('codigo_empleado'))
                            <p class="text-danger">{{$errors->first('codigo_empleado')}}</p>
                        @endif
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">Crear</button>
                        <a href="{{ url()->previous() }}" class="btn btn-danger">Regresar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
