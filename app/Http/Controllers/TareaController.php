<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use OpenApi\Annotations as OA;
use OpenApi\Annotations\PathItem;
/**
 * @OA\Info(
 *     title="Documentación de la API de Tareas",
 *     version="1.0.0"
 * )
 */
class TareaController extends Controller
{

/**
 * @OA\Get(
 *     path="/tareas",
 *     summary="Obtener todas las tareas",
 *     tags={"Tareas"},
 *     @OA\Response(
 *         response=200,
 *         description="Lista de tareas",
 *         @OA\JsonContent()
 *     )
 * )
 */
public function index()
{
    $tareas = Tarea::all();
    return Inertia::render('TareaIndex', ['tareas' => $tareas]);
}

/**
 * @OA\Post(
 *     path="/tareas",
 *     summary="Crear una nueva tarea",
 *     tags={"Tareas"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="descripcion", type="string"),
 *             @OA\Property(property="nombre", type="string")
 *         )
 *     ),
 *     @OA\Response(
 *         response=302,
 *         description="Tarea creada exitosamente",
 *         @OA\JsonContent()
 *     )
 * )
 */
public function store(Request $request)
{
    $request->validate([
        'descripcion' => 'required',
        'nombre' => 'required',
    ]);
    Tarea::create($request->all());
    return Redirect::route('tareas.index');
}

/**
 * @OA\Get(
 *     path="/tareas/{tarea}",
 *     summary="Obtener los detalles de una tarea",
 *     tags={"Tareas"},
 *     @OA\Parameter(
 *         name="tarea",
 *         in="path",
 *         description="ID de la tarea",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Detalles de la tarea",
 *         @OA\JsonContent()
 *     )
 * )
 */
public function show(Tarea $tarea)
{
    //
}

/**
 * @OA\Put(
 *     path="/tareas/{tarea}",
 *     summary="Actualizar una tarea existente",
 *     tags={"Tareas"},
 *     @OA\Parameter(
 *         name="tarea",
 *         in="path",
 *         description="ID de la tarea",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="descripcion", type="string"),
 *             @OA\Property(property="nombre", type="string")
 *         )
 *     ),
 *     @OA\Response(
 *         response=302,
 *         description="Tarea actualizada exitosamente",
 *         @OA\JsonContent()
 *     )
 * )
 */
public function update(Request $request, Tarea $tarea)
{
    $tarea = Tarea::findOrFail($tarea->id);
    $tarea->nombre = $request->nombre;
    $tarea->descripcion = $request->descripcion;
    $tarea->save();
    return Redirect::route('tareas.index');
}

/**
 * @OA\Delete(
 *     path="/tareas/{tarea}",
 *     summary="Eliminar una tarea",
 *     tags={"Tareas"},
 *     @OA\Parameter(
 *         name="tarea",
 *         in="path",
 *         description="ID de la tarea",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=302,
 *         description="Tarea eliminada exitosamente",
 *         @OA\JsonContent()
 *     )
 * )
 */
public function destroy(Tarea $tarea)
{
    $tarea->delete();
    return Redirect::route('tareas.index');
}
}
