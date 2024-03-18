@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Administración de Permisos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <x-adminlte-button label="Nuevo" theme="primary" data-toggle="modal" data-target="#modalPurple" icon="fas fa-key" class="float-right bg-primary"/>
        </div>
        <div class="card-body">
            {{-- Setup data for datatables --}}
            @php
            $heads = ['ID','Nombre',
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
                @foreach($permisos as $permiso)
                    <tr>
                        <td>{{ $permiso->id }}</td>
                        <td>{{ $permiso->name }}</td>
                        <td>
                            <div class="d-flex align-items-center">  
                                <a href="{{ route('permisos.edit', $permiso->id) }}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>
                                <form action="{{ route('permisos.destroy', $permiso) }}" method="post" class="formEliminar">
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
        {{-- Custom --}}
        <x-adminlte-modal id="modalPurple" title="Nuevo Permiso" theme="primary"
            icon="fas fa-bolt" size='lg' disable-animations>
            <form action="{{ route('permisos.store') }}" method="post">
                @csrf
                <div class="row">
                    <x-adminlte-input name="name" label="Permiso" placeholder="Nombre del permiso"
                        fgroup-class="col-md-6" disable-feedback/>
                </div>
                <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
            </form> 
        </x-adminlte-modal>
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
