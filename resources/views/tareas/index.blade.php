@extends('layouts.app')

@section('content')
    <center>
        <h1 style="color: #333; font-size: 24px;">Lista de Tareas - {{ date('d/m/Y') }}</h1>
    </center>
    <a href="{{ route('tareas.create') }}" style="display: inline-block; background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; margin-bottom: 10px;">Crear Tarea</a>

    @if(session('success'))
        <div style="background-color: #dff0d8; border: 1px solid #ccc; color: #3c763d; padding: 10px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <ul style="list-style-type: none; padding: 0;">
        @foreach($tareas as $tarea)
            <li style="margin-bottom: 10px; padding: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                <span>{{ $tarea->nombre }}</span>
                <span style="margin-left: 10px;">Calificación: {{ $tarea->calificacion }}</span>
                
                <!-- Botón para editar -->
                <form action="{{ route('tareas.edit', $tarea->id) }}" method="GET" style="display:inline;">
                    @csrf
                    <button type="submit" style="background-color: #337ab7; color: white; border: none; padding: 5px 10px; cursor: pointer; margin-left: 10px; text-decoration: none;">Editar</button>
                </form>
                
                <!-- Formulario para eliminar -->
                <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background-color: #d9534f; color: white; border: none; padding: 5px 10px; cursor: pointer; margin-left: 10px;">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
