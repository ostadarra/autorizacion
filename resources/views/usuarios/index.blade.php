@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Administración de Usuarios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            {{-- Setup data for datatables --}}
            @php
            $heads = ['ID','Nombre', 'Email',
                ['label' => 'Acciones', 'no-export' => true, 'width' => 10],
            ];

            $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>';
            $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </button>';

            $config = [
                'language' => [
                    'url' => '//cdn.datatables.net/plug-ins/2.0.0/i18n/es-ES.json'
                ]
            ];
            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
                @foreach($usuarios as $usuario)
                    <tr>
                       <td>{{ $usuario->id }}</td>
                       <td>{{ $usuario->name }}</td>
                       <td>{{ $usuario->email }}</td>
                       <td>
                        <div class="d-flex align-items-center"> 
                                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>
                                <form action="{{ route('usuarios.destroy', $usuario) }}" method="post" class="formEliminar">
                                    @csrf   
                                    @method('delete')
                                    {!!$btnDelete!!}
                                </form>
                            </div>  
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>           
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    $(document).ready(function(){
        $('.formEliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: "¿Estás seguro?",
                text: "¡Esta operación no se puede revertir!",
                // icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Borrar"
                }).then((result) => {
                console.log(result);
                if (result.value == true) {
                    this.submit();
                }
                });
        })
    })
</script>
@if(session('mensaje'))
    <script>
        $(document).ready(function(){
            let mensaje = "{{ session('mensaje') }}";
            Swal.fire({
                'title': 'Resultado',
                'text': mensaje,
                'icon': 'success'
            })
        })
    </script>
@endif
@stop
