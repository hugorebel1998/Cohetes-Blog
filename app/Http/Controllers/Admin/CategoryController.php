<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{


    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        
        return view('admin.categories.index');
    }

    public function categoryAll()
    {
        $categorias = Category::all();
        return response()->json([
           'categorias' => $categorias 
        ]);

    }

    public function store(Request $request)
    {
        $validador = Validator::make($request->all(), [
            'nombre' => 'required|min:3',
            'estatus' => 'required|in:En existencia,Sin existencia',
            'descripcion' => 'required'
        ]);



        if ($validador->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validador->messages(),
            ]);
        }
         else {
            $categoria = new Category;
            $categoria->name = Str::title($request->nombre);
            $categoria->slug = Str::slug($request->nombre);
            $categoria->status = $request->estatus;
            $categoria->description = $request->descripcion;
           
           if($categoria->save())
            // toastr()->success('Nueva categoria registrada');
            return response()->json([
                'status' => 200,
                'message' => 'Categoria registrada con exito'
            ]);
        }
    }

    public function edit($category)
    {
        $categoria = Category::findOrFail($category);
        dd($categoria);
    }
}
