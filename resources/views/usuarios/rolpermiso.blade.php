@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Permisos del rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>{{ $rol->name }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('roles.update', $rol) }}" method="post">
                @csrf
                @method('put')
                @foreach ($permisos as $permiso)
                    <div>
                        <input type="checkbox" name="permissions[]" value="{{ $permiso->name }}"
                        {{ $rol->hasPermissionTo($permiso) ? 'checked' : '' }}>
                        <label>{{ $permiso->name }}</label>
                    </div>   
                @endforeach
                <x-adminlte-button type="submit" label="Asignar permisos" theme="primary" icon="fas fa-key"/>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
