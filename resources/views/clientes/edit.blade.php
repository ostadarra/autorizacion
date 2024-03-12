@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Administración de clientes</h1>
@stop

@section('content')
    <form action="{{ route('cliente.update', $cliente->id) }}" method="post">
        @csrf
        @method('put')
        
        <x-adminlte-input value="{{ $cliente->dni }}" name="dni" label="DNI:" label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input value="{{ $cliente->apellidos }}" name="apellidos" label="Apellidos:" label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input value="{{ $cliente->nombre }}" name="nombre" label="Nombre:" label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input value="{{ $cliente->email }}" name="email" label="Email:" label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-button class="btn-flat" type="submit" label="Actualizar" theme="primary" icon="fas fa-lg fa-save"/>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop