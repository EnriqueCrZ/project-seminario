@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <div class="card">

            <div class="card-header">
                <div class="col-md-12 text-secondary d-flex justify-content-center text-blue text-uppercase">
                    <h3>Editar proveedor</h3>
                </div>
            </div>
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
                <form action="{{route('proveedor.update',$inventory->id_inventory)}}" method="POST" novalidate>
                    @csrf
                    @method('POST')

                    <div class="form-group">
                        <label for="provider_name">Codigo del Producto</label>
                        <input class="form-control String" type="text" name="product_code" id="product_code"
                               value="{{old('product_code',$inventory->product_code)}}" maxlength="60"
                               required="required">
                        @if($errors->has('product_code'))
                            <p class="text-danger">{{$errors->first('product_code')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="spare_part">Nombre del Producto</label>
                        <input class="form-control String" type="text" name="spare_part" id="spare_part"
                               value="{{old('spare_part',$inventory->spare_part)}}" required="required"
                        >
                        @if($errors->has('spare_part'))
                            <p class="text-danger">{{$errors->first('spare_part')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="price">Email</label>
                        <input class="form-control String" type="text" name="price" id="price"
                               value="{{old('email',$inventory->price)}}" required="required"
                        >
                        @if($errors->has('price'))
                            <p class="text-danger">{{$errors->first('price')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="branch">Marca</label>
                        <input class="form-control String" type="text" name="branch" id="branch"
                               value="{{old('branch',$provider->nit)}}" required="required"
                        >
                        @if($errors->has('branch'))
                            <p class="text-danger">{{$errors->first('branch')}}</p>
                        @endif
                    </div>
                   {{--
                   Corregir esta partes :(
                   <div class="form-group">
                        <label for="stock">Cantidad</label>
                        <input class="form-control String" type="text" name="telefono" id="telefono"
                               value="{{old('telefono',$provider->telefono)}}" required="required"
                        >
                        @if($errors->has('telefono'))
                            <p class="text-danger">{{$errors->first('telefono')}}</p>
                        @endif
                    </div>
                    --}}
                    <div class="btn-group">
                        <button class="btn btn-outline-info" type="submit">Actualizar</button>
                        <a href="{{ url()->previous() }}" class="btn btn-outline-danger">Regresar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
