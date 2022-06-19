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
        $categorias = Category::all();
        return view('admin.categories.index', compact('categorias'));
    }

    public function store(CategoryRequest $request)
    {


        $categoria = new Category();
        $categoria->name = Str::title($request->nombre);
        $categoria->slug = Str::slug($request->nombre);
        $categoria->status = $request->estatus;
        $categoria->description = $request->descripcion;

        // dd($categoria);
        if ($categoria->save()) {
            toastr()->success('Nueva categoria registrada');
            return redirect()->back();
        } else {
            toastr()->error('Algo salio mal!!');
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $categoria = Category::findOrFail($id);
        $request->validate([
            'nombre'      => 'required|unique:categories,name,' . $categoria->id,
            'estatus' => 'required|in:En existencia,Sin existencia',
            // 'description' => "required"
        ]);
        $categoria->name = Str::title($request->nombre);
        $categoria->slug = Str::slug($request->nombre);
        $categoria->status = $request->estatus;
        $categoria->description = $request->descripcion;

        // dd($categoria);

        if ($categoria->save()) {
            toastr()->info($categoria->name . ' ' . 'Actualizada.');
            return redirect()->back();
        } else {
            toastr()->error('Algo salio mal!!');
            return redirect()->back();
        }
    }
    public function delete($id)
    {
        $categoria = Category::findOrFail($id);
        if ($categoria->delete()){

            toastr()->success('Categoria eliminada con exito');
            return redirect()->back();
        }else{
            toastr()->error('Algo salio mal!!');
            return redirect()->back();

        }
    }
            
}
