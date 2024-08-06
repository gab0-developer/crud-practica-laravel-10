 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
    Registrar cliente
</button>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Registrar cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>                  
        </div>


        <form action="{{route('cliente.store')}}" method="post" class="p-3">
            @csrf  {{-- token --}}
            {{-- <div class="text-center card-header">
                <h5>Registrar cliente</h5>
            </div> --}}
            <div class="inputs">


                <div class="group-input d-flex my-2">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user"></i></span>
                        <input type="number" name="dni_cliente" class="form-control"
                        value="{{ old('dni_cliente') }}" placeholder="Nro DNI" aria-label="Nro DNI" aria-describedby="addon-wrapping">
                    </div>
                </div> 
                <div class="group-input d-flex my-2">
                    @error('dni_cliente') {{-- indicamos el nombre del campo --}}
                        {{-- indicamos el mensaje de error  --}}
                        <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="group-input d-flex my-2">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user"></i></span>
                        <input type="text" name="nombre_cliente" class="form-control" placeholder="Nombre del cliente" aria-label="Nombre del cliente" aria-describedby="addon-wrapping"  value="{{ old('nombre_cliente') }}" >
                    </div>
                    @error('nombre_cliente') {{-- indicamos el nombre del campo --}}
                        {{-- indicamos el mensaje de error  --}}
                        <p style="color:red;">{{$message}}</p>
                    @enderror
                    <div class="input-group flex-nowrap ml-2">
                        <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user"></i></span>
                        <input type="text" name="apellido_cliente" class="form-control" placeholder="Apellido del cliente" aria-label="Apellido del cliente" aria-describedby="addon-wrapping" value="{{ old('apellido_cliente') }}">
                    </div>
                    @error('apellido_cliente') {{-- indicamos el nombre del campo --}}
                        {{-- indicamos el mensaje de error  --}}
                        <p style="color:red;">{{$message}}</p>
                    @enderror
                      
                </div> 
                <div class="group-input d-flex my-2">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fas fa-envelope-open"></i></span>
                        <input type="email" name="email_cliente" class="form-control" placeholder="Email del cliente" aria-label="Email del cliente" aria-describedby="addon-wrapping" value="{{ old('email_cliente') }}">
                    </div>
                    @error('email_cliente') {{-- indicamos el nombre del campo --}}
                        {{-- indicamos el mensaje de error  --}}
                        <p style="color:red;">{{$message}}</p>
                    @enderror
                    <div class="input-group flex-nowrap ml-2">
                        <span class="input-group-text" id="addon-wrapping"><i class="fa fa-phone"></i></span>
                        <input type="number" name="tlf_cliente" class="form-control" placeholder="Teléfono del cliente" aria-label="Teléfono del cliente" aria-describedby="addon-wrapping" value="{{ old('tlf_cliente') }}">
                    </div>
                    @error('tlf_cliente') {{-- indicamos el nombre del campo --}}
                        {{-- indicamos el mensaje de error  --}}
                        <p style="color:red;">{{$message}}</p>
                    @enderror
                      
                </div> 
                <div class="group-input d-flex my-2">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fa fa-street-view"></i></span>
                        <input type="text" name="direccion_cliente" class="form-control" placeholder="Dirección del cliente" aria-label="Dirección del cliente" aria-describedby="addon-wrapping" value="{{ old('direccion_cliente') }}">
                    </div>
                    @error('direccion_cliente') {{-- indicamos el nombre del campo --}}
                        {{-- indicamos el mensaje de error  --}}
                        <p style="color:red;">{{$message}}</p>
                    @enderror
                    <div class="input-group form-select form-select-lg ml-2">
                        <select name="estado_cliente" class="form-control form-select " aria-label="Default select example" value="{{ old('estado_cliente') }}">
                            <option selected disabled>Seleccionar estado civil</option>
                            <option value="soltero">Soltero</option>
                            <option value="casado">Casado</option>
                            <option value="no decirlo">prefiero no decirlo</option>
                        </select>
                    </div>
                    @error('estado_cliente') {{-- indicamos el nombre del campo --}}
                        {{-- indicamos el mensaje de error  --}}
                        <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                
            </div>
            {{-- <div class="mt-5 ">
                <input id="submit_cliente" type="submit" class="w-100 btn btn-success" value="Registrar cliente">
            </div> --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Registrar rol</button>
            </div>
        </form>

    </div>
</div>
</div>
    
    <div class="card">
        <div class="card-bod">
            
            
        </div>
    </div>

