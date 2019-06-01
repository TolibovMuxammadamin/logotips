<?php

namespace Logotips\Http\Controllers;

use Logotips\Category;
use Logotips\Http\Requests\Category\CategoriesRequest;

class CategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index', [
            'categories' => Category::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        auth()->user()->categories()->create([
            'name' => $request->name,
            'slug' => str_slug($request->name)
        ]);

        session()->flash('success', 'Категория Добавлена успешна');

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if($category->author->id !== auth()->user()->id)
        {
            return redirect()->back();
        }

        else 
        {
            return view('categories.create', [
                'category' => $category
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesRequest $request, Category $category)
    {
        auth()->user()->categories()->update([
            'name' => $request->name,
            'slug' => str_slug($request->name)
        ]);

        session()->flash('success', 'Категория Изменена');

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        session()->flash('success', 'Категория Удалена');

        return redirect()->back();
    }
}
