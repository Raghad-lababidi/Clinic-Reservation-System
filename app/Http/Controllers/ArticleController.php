<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
class ArticleController extends Controller
{

	public function index()
    {
        $articles = Article::all();

        $response['data'] = $articles;
        $response['message'] = "This is all articles";
        $response['status_code'] = 200;
        return response()->json($response,200) ;
    }
    public function store(Request $request)
    {
       $article =new Article;
           $image_name = rand() . "." . $request->image->
                getClientOriginalExtension();
              $article->image =  $image_name;
              $request->image->move('image', $image_name);
           $article->title = $request->title;
           $article->description = $request->description;
           $article->save();

            $response['data'] = $article;
            $response['message'] = "store success";
            $response['status_code'] = 200;
            return response()->json($response,200) ;   
    }
}
