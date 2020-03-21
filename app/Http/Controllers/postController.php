<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class postController extends Controller
{
    public function search($val){
       return $result=Post::where('title','LIKE','%'.$val.'%')->get();
    }
    public function getpost(){
        return Post::paginate(5);
    }
}
