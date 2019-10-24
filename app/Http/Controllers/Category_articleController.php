<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category_article;

class Category_articleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_articles = Category_article::select()->get();
        return view('admin.category_article.list',['category_articles'=>$category_articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category_article.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule= [
            "name" => "required",
        ];
        $request->validate($rule);
        $category_article = $request->all();
        $category_article['status'] = 1;
        Category_article::create($category_article);
        return redirect()->route('admin.category_article_index');
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
    public function edit($id)
    {
        $category_article = Category_article::find($id);
        return view('admin.category_article.form',[ 'category_article' => $category_article ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rule= [
            "name" => "required",
        ];
        $request->validate($rule);
        $category_article = Category_article::find($id);
        $category_article->update($request->all());
        return redirect()->route('admin.category_article_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category_article = Category_article::find($id);
        $category_article->delete();
        return redirect()->route('admin.category_article_index');
    }
}
