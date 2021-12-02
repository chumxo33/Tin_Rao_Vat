<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\AppConst;
use App\Http\Controllers\CategoryController;
use  App\Http\Requests\StoreUserArticleRequest;
use Intervention\Image\Image;
use Illuminate\Support\Facades\Storage;

class UserArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // App\Http\Controllers\User\UserArticleController.php
    public function index()
    {
        $articles = auth()->user()->articles()->paginate(AppConst::DEFAULT_PER_PAGE);
        return view('user.article.list')->with('articles', $articles);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // App\Http\Controllers\User\UserArticleController.php
    public function create()
    {
        // Lấy ra những thằng cha trong đó có con, và thực hiện truy vấn với cột dữ liệu (parent_id)
        $categories = Category::whereNull('parent_id')->with('children')->get();
        return view('user.article.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // App\Http\Controllers\User\UserArticleController.php
    // use  App\Http\Requests\StoreUserArticleRequest;
    public function store(StoreUserArticleRequest $request)
    {  
        $article = new Article;
        // Lấy tất cả các giá trị khi fill(fillable)
        $article->fill( $request->all() );

        auth()->user()->articles()->save($article);
        
        // attach tạo ra mối quan hệ nhiều nhiều giữa 2 cái
        // Article nó sẽ lưu Categories theo model article
        $article->categories()->attach($request->category_ids); 

        return redirect('/user/article/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
