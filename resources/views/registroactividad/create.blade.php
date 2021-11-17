@extends('layouts.admin')

@section('titulo')
    Asignar actividad
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
                <form action="{{route('registroactividad.guardar')}}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="descripcion">Descripcion</label>
                            <input class="form-control String" type="text" name="descripcion" id="descripcion"
                                   value="{{old('descripcion')}}" maxlength="60"
                                   required="required">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="piloto">Piloto</label>
                            <select class="form-control" name="piloto" id="piloto">
                                @foreach($pilots as $pilot)
                                    <option
                                        value="{{$pilot->id_pilot}}">{{$pilot->complete_name}} - {{$pilot->license}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="vehiculo">Vehiculo</label>
                            <select class="form-control" name="vehiculo" id="vehiculo">
                                @foreach($vehicles as $vehicle)
                                    <option
                                        value="{{$vehicle->id_vehicle}}">{{$vehicle->brand}} {{$vehicle->line}} {{$vehicle->model}} - {{$vehicle->plate}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="plataforma">Gondola/Plataforma</label>
                            <select class="form-control" name="plataforma" id="plataforma">
                                @foreach($platforms as $platform)
                                    <option
                                        value="{{$platform->id_vehicle}}">{{$platform->brand}} {{$platform->line}} {{$platform->model}} - {{$platform->plate}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="origen">Origen</label>
                            <select class="form-control" name="origen" id="origen">
                                @foreach($locations as $origin)
                                    <option value="{{$origin->id_location}}">{{$origin->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="destino">Destino</label>
                            <select class="form-control" name="destino" id="destino">
                                @foreach($locations as $destiny)
                                    <option value="{{$destiny->id_location}}">{{$destiny->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Agregar</button>
                        <a href="{{ url()->previous() }}" class="btn btn-danger">Regresar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
