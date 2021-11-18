<!-- Modal -->
<div class="modal fade" id="modalMantenimiento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Orden de Trabajo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="card-body">
                    <form action="{{route('mantenimiento.guardar')}}" method="post" id="formMant">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-row">
                            <div class="row">
                            <div class="form-group">
                                <label for="service_number">#OT</label>
                                <input class="form-control String" type="text" name="service_number" id="service_number">
                            </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="vehiculo">Vehiculo</label>
                                    <select class="form-control" name="vehiculo" id="vehiculo">
                                        @foreach($vehiculos as $vehiculo)
                                            <option
                                                value="{{$vehiculo->id_vehicle}}">{{$vehiculo->brand}} {{$vehiculo->line}} {{$vehiculo->model}} - {{$vehiculo->plate}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="responsable">Solicitante</label>
                                    <input class="form-control String" type="text" name="responsable" id="responsable">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="start_date">Fecha Ingreso</label>
                                    <input class="form-control" type="date" id="start_date" name="start_date"
                                           min="2021-11-18">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="service_date">Fecha Entrega</label>
                                    <input class="form-control" type="date" id="service_date" name="service_date"
                                           min="2021-11-18">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="btn-group">
                                <span class="btn btn-outline-danger" data-dismiss="modal" aria-label="Close">Cancelar</span>
                                <button type="button" class="btn btn-outline-info" onclick="saveMant()">Generar Mantenimiento</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>

        </div>
    </div>
</div>

