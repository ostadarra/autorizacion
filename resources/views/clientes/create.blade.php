@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Administración de clientes</h1>
@stop

@section('content')
    <form action="{{ route('cliente.store') }}" method="post">
        @csrf
        
        <x-adminlte-input value="{{ old('dni') }}" name="dni" label="DNI:" placeholder="Introduce el dni" label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input value="{{ old('apellidos') }}" name="apellidos" label="Apellidos:" placeholder="Introduce los apellidos" label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input value="{{ old('nombre') }}" name="nombre" label="Nombre:" placeholder="Introduce el nombre" label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input value="{{ old('email') }}" name="email" label="Email:" placeholder="Introduce el email" label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-button class="btn-flat" type="submit" label="Enviar" theme="primary" icon="fas fa-lg fa-save"/>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop