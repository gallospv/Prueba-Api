<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use App\Models\category;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return category::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreCategoryRequest $request)
    {
        $category = new category;
        $category->code = $request->code;
        $category->title = $request->title;
        $category->description = $request->description;
        $category->idparentcategory = $request-> idparentcategory;
        $category->save();
        return [
            'message' => "Los datos se almacenaron correctamente",
            'data' => $category
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return category::findOrfail($id)->get();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {

        $category = category::where('id', $id)
            ->update($request->all());
        return [
            'message' => "Los datos se actualizaron correctamente",
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = category::find($id);
        $category->delete();
        return [
            'message' => "Categoria eliminada correctamente",
            'data' => $category
        ];
    }
}
