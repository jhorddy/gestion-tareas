<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Tarea; 
use Carbon\Carbon;
class TareaController extends Controller
{
    public function index()
    {
        $tareas = Tarea::all();
        $currentDateTime = Carbon::now()->format('d/m/Y');
        return view('tareas.index', compact('tareas','currentDateTime'));
    }

    public function create()
    {
        return view('tareas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required', 

            'calificacion'=> 'required', 

        ]);

        Tarea::create($request->all());

        return redirect()->route('tareas.index')->with('success', 'Tarea creada exitosamente.');
    }

    public function edit($id)
    {
        $tarea = Tarea::find($id);
        return view('tareas.edit', compact('tarea'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',

            'calificacion'=> 'required', 
        ]);

        $tarea = Tarea::find($id);
        $tarea->update($request->all());

        return redirect()->route('tareas.index')->with('success', 'Tarea actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $tarea = Tarea::find($id);
        $tarea->delete();

        return redirect()->route('tareas.index')->with('success', 'Tarea eliminada exitosamente.');
    }
}
