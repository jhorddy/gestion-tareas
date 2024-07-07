@extends('layouts.app')

@section('content')
    <h1 style="color: #333; font-size: 24px;">Crear Tarea</h1>

    @if($errors->any())
        <div style="background-color: #ffcccc; padding: 10px; margin-bottom: 15px;">
            <ul style="color: #cc0000;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tareas.store') }}" method="POST">
        @csrf
        <label for="nombre" style="display: block; margin-bottom: 10px;">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" style="padding: 5px; border: 1px solid #ccc; width: 300px;">
         
        <br> <br> 

        <label for="calificacion" style="display: block; margin-bottom: 10px;">calificacion:</label>
        <input type="text" name="calificacion" id="calificacion" value="{{ old('calificacion') }}" style="padding: 5px; border: 1px solid #ccc; width: 300px;">
        
        <br> <br> 
        <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; margin-top: 10px;">Crear</button>
    </form>
@endsection
