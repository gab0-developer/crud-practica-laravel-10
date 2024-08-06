{{-- mensaje de la clase sesion, para poder acceder a los mensajes --}}
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
{{-- @if ($message= Session::get('success'))
    <div style="width:50%; margin:auto;border: 1px solid greeen;color:white;background:green">
        <p>{{$message}}</p>
    </div>
@endif --}}
@if ($message= Session::get('destroy'))
    <div style="width:50%; margin:auto;border: 1px solid greeen;color:white;background:violet">
        <p>{{$message}}</p>
    </div>
@endif
