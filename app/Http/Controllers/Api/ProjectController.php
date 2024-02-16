<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //metodo
    public function index()
    {
        // prendiamo tutti i dati di projects
        //$projects = Project::all();

        //prendiamo tuti i dati di projects anche delle tabelle collegate
        $projects = Project::with('type', 'technology')->get();

        // ritorna i dati in file json
        return response()->json([
            'status' => true,
            'data' => $projects,
        ]);
    }
}
