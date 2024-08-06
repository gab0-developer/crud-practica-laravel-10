@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Clientes registrados</h1>
@stop

@section('content')

    {{-- 

    auth()->check(): Verifica si hay un usuario autenticado.
    auth()->user()->can('crear'): Verifica si el usuario tiene el permiso 'crear'.
    auth()->user()->hasRole('administrador'): Verifica si el usuario tiene el rol 'administrador'.
    --}}

    {{-- @if(auth()->check() && auth()->user()->can(['crear']) && auth()->user()->hasRole(['administrador','tecnico']))
        <div class="mb-3">
            @include('clientes.registercliente')
        </div> 
    
    @endif --}}
    

    @can(['crear'])
        <div class="mb-3">
            @include('clientes.registercliente')
        </div>
    @endcan

    <div class="card">
        <div class="card-body">
            {{-- Setup data for datatables --}}
            @php
            $heads = [
                'ID',
                'DNI',
                'NOMBRE',
                'APELLIDO',
                'EMAIL',
                ['label' => 'TELEFONO', 'width' => 10],
                ['label' => 'DIRECCION', 'width' => 5],
                'ESTADO',
                ['label' => 'Actions', 'no-export' => true, 'width' => 5],
            ];

            $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </button>';
            $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>';
            $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </button>';

            $config = [
                
            ];
            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table1" :heads="$heads">
                @foreach($clientes as $client)
                    <tr>
                        <td>{{$client->id}}</td>
                        <td>{{$client->dni}}</td>
                        <td>{{$client->nombre}}</td>
                        <td>{{$client->apellido}}</td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->telefono}}</td>
                        <td>{{$client->direccion}}</td>
                        <td>{{$client->estado}}</td>
                        <td class="d-flex"> 
                            
                            @if(auth()->check() && auth()->user()->can(['editar']) && auth()->user()->hasRole(['administrador','tecnico']))
                                <a href="{{route('cliente.edit',$client)}}">{!! $btnEdit !!}</a>
                            @endif
                            
                            @if(auth()->check() && auth()->user()->can(['eliminar']) && auth()->user()->hasRole(['administrador','tecnico']))
    
                                <form action="{{route('cliente.destroy',$client)}}" method="post" class="form_eliminar">
                                    @csrf
                                    @method('delete')
                                    {!! $btnDelete !!}
                                </form>
                            @endif
                            
                            @if(auth()->check() && auth()->user()->can(['ver']) && auth()->user()->hasRole(['administrador','tecnico']))
                                {!! $btnDetails !!}
                            @endif
                            
                            
                            {{-- {{$client->id}} --}}
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>

    {{--has: verifica si existe la clave, en este caso success y devuelve true o false dependiendo   --}}
    @if (Session::has('success')) 
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: '{{ Session::get('success') }}',
                    confirmButtonText: 'Aceptar'
                });
            });
        </script>
    @endif

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="{{asset('assets/css/app.css')}}"> --}}
@stop

@section('js')
    <script> 

        $(document).ready(function(){
            $('.form_eliminar').submit(function(e){
                e.preventDefault();
                Swal.fire({
                    title: "Esta seguro de eliminar el cliente?",
                    text: "Este cliente será eliminado permanentemente!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, eliminar!"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                        // if (this.submit()) {
                        //     Swal.fire({
                        //     title: "Eliminado!",
                        //     text: "Cliente eliminado exitosamente.",
                        //     icon: "success"
                        //     });
                            
                        // }
                        
                    }
                });
            });
        })

        // let form_eliminar = document.querySelectorAll('.form_eliminar');
        // form_eliminar.addEventListener('submit', (e) =>{
        //     e.preventDefault();
        //     Swal.fire({
        //         title: "Esta seguro de eliminar el cliente?",
        //         text: "Este cliente será eliminado permanentemente!",
        //         icon: "warning",
        //         showCancelButton: true,
        //         confirmButtonColor: "#3085d6",
        //         cancelButtonColor: "#d33",
        //         confirmButtonText: "Si, eliminar!"
        //         }).then((result) => {
        //         if (result.isConfirmed) {
        //             this.submit();
        //             // Swal.fire({
        //             // title: "Eliminado!",
        //             // text: "Cliente eliminado exitosamente.",
        //             // icon: "success"
        //             // });
        //         }
        //     });
        // })
    </script>
@stop