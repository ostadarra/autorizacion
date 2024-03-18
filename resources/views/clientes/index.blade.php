@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado de clientes</h1>
@stop

@section('content')
    <div class="card">
        @can('Crear cliente')    
            <div class="card-header">
                <a href="{{ route('cliente.create') }}" class="btn btn-primary float-right mt-2 mr-4">Nuevo</a>
            </div>
        @endcan
        <div class="card-body">
            {{-- Setup data for datatables --}}
            @php
            $heads = ['ID','DNI','Apellidos','Nombre','Email',
                ['label' => 'Acciones', 'no-export' => true, 'width' => 10],
            ];

            $btnEdit = '';
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
                @foreach($clientes as $cliente)
                    <tr>
                       <td>{{ $cliente->id }}</td>
                       <td>{{ $cliente->dni }}</td>
                       <td>{{ $cliente->apellidos }}</td>
                       <td>{{ $cliente->nombre }}</td>
                       <td>{{ $cliente->email }}</td>
                       <td>
                        <div class="d-flex align-items-center">
                                <a href="{{ route('cliente.edit', $cliente->id) }}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>
                                @can('Eliminar cliente')
                                    <form action="{{ route('cliente.destroy', $cliente) }}" method="post" class="formEliminar">
                                        @csrf   
                                        @method('delete')
                                        {!!$btnDelete!!}
                                    </form>
                                @endcan
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
