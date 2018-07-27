<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\site\Post;
class SiteController extends Controller
{
    public function index(){    
        $posts = Post::whereIn('numero',[1,2,5])->get();
        
        return  view('site.home', compact('posts'));
    }
    
  
}
