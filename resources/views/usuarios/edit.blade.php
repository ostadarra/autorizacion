@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Roles del usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>{{ $usuario->name }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('usuarios.update', $usuario) }}" method="post">
                @csrf
                @method('put')
                @foreach ($roles as $rol)
                    <div>
                        <input type="checkbox" name="roles[]" value="{{ $rol->id }}"
                        {{ $usuario->hasAnyRole($rol->id) ? 'checked' : '' }}>
                        <label>{{ $rol->name }}</label>
                    </div>   
                @endforeach
                <x-adminlte-button type="submit" label="Asignar roles" theme="primary" icon="fas fa-key"/>
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
