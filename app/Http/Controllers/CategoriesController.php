<?php

namespace App\Http\Controllers;

use App\Category;
use Session;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('admin.categories.index')->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required'
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->save();

//            Category::create($request->all());// another way of store

        Session::flash('success', 'You successfully Create a Category.');
        return redirect()->route('category.index');

//        return redirect()->route('category.index')->with('success', 'Product Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
//        $category = Category::find($category);
//        return  view('admin.categories.edit')->with('category', $category);

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
//        $category = Category::find($category);// no need to id find
        $category->name = $request->name;
        $category->save();

//        $category->update($request->all());/// update process

        Session::flash('success', 'You successfully Updated the Category.');
        return redirect()->route('category.index');

//        return redirect()->route('category.index')->with('success', 'Product updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
//        $category = Category::find($category);
        $category->delete();

        Session::flash('success', 'You successfully Deleted the Category.');
        return redirect()->route('category.index');

//        return redirect()->route('category.index')->with('success', 'Product Deleted Successfully');
    }
}
