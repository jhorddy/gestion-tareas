@extends('layouts.app')

@section('content')
    <div style="margin-top: 20px;">
        <h1 style="color: #333; font-size: 24px;">Editar Tarea</h1>

        @if($errors->any())
            <div style="background-color: #f2dede; color: #a94442; border: 1px solid #ebccd1; padding: 10px; margin-bottom: 15px;">
                <ul style="margin-bottom: 0;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tareas.update', $tarea->id) }}" method="POST" style="max-width: 400px;">
            @csrf
            @method('PUT')
            <div style="margin-bottom: 10px;">
                <label for="nombre" style="display: block; margin-bottom: 5px;">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="{{ $tarea->nombre }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 10px;">
                <label for="calificacion" style="display: block; margin-bottom: 5px;">Calificación:</label>
                <input type="text" name="calificacion" id="calificacion" value="{{ $tarea->calificacion }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 4px;">Actualizar</button>
        </form>
    </div>
@endsection
