<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {

      /*
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
        $posts = News::where('title', $cond_title)->orderBy('updated_at', 'desc')->get();
      } else {
        $posts = News::all()->sortByDesc('updated_at');
      }
      */
      $posts = News::all()->sortByDesc('updated_at');

      if (count($posts) > 0) {
        $headline = $posts->shift();
      } else {
        $headline = null;
      }

      /*
      return view('news.index', ['cond_title' => $cond_title, 'posts' => $posts, 'headline' => $headline]);
      */
      return view('news.index', ['posts' => $posts, 'headline' => $headline]);
    }

}
