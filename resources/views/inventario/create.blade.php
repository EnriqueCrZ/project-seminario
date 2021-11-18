@extends('layouts.admin')

@section('titulo')
    Crear Producto
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
                <form action="{{route('inventario.store')}}" method="POST" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="product_code">Cod. Producto</label>
                        <input class="form-control String" type="text" name="product_code" id="product_code"
                               value="{{old('product_code')}}" maxlength="60"
                               required="required">
                        @if($errors->has('product_code'))
                            <p class="text-danger">{{$errors->first('product_code')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="spare_part">Nombre de Producto</label>
                        <input class="form-control String" type="text" name="spare_part" id="spare_part"
                               value="{{old('spare_part')}}" maxlength="60"
                               required="required">
                        @if($errors->has('spare_part'))
                            <p class="text-danger">{{$errors->first('spare_part')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="provider_address">Marca</label>
                        <input class="form-control String" type="text" name="branch" id="branch"
                               value="{{old('branch')}}" required="required"
                        >
                        @if($errors->has('branch'))
                            <p class="text-danger">{{$errors->first('branch')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="price">Precio</label>
                        <input class="form-control String" type="text" name="price" id="price"
                               value="{{old('price')}}" required="required"
                        >
                        @if($errors->has('price'))
                            <p class="text-danger">{{$errors->first('price')}}</p>
                        @endif
                    </div>
                   <div class="form-group">
                        <label for="stock">Stock</label>
                        <input class="form-control String" type="text" name="stock" id="stock"
                               value="{{old('stock')}}" required="required" onkeydown="return check(event)"
                        >
                        @if($errors->has('stock'))
                            <p class="text-danger">{{$errors->first('stock')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="provider_id_provider">Proveedor</label>
                        <select class="form-control" name="provider_id_provider" id="provider_id_provider">
                            @foreach($providers as $provider)
                                <option
                                    value="{{$provider->id_provider}}">{{$provider->provider_name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('provider_id_provider'))
                            <p class="text-danger">{{$errors->first('provider_id_provider')}}</p>
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
    <script>
            function check(e) {
                tecla = (document.all) ? e.keyCode : e.which;

                //Tecla de retroceso para borrar, siempre la permite
                if (tecla == 8) {
                    return true;
                }

                // Patron de entrada, en este caso solo acepta numeros y letras
                patron = /[0-9.]/;
                tecla_final = String.fromCharCode(tecla);
                return patron.test(tecla_final);
            };
    </script>
@endsection
