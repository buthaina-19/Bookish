<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('home',[
            'featuredPosts'=> Post::posted()->featured()->latest('posted_at')-> take(3)->get(),
            'latestPosts'=> Post::posted()->latest('posted_at')-> take(9)->get()

        ]);
    }
}
