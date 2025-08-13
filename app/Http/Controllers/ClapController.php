<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClapController extends Controller
{
    public function clap(Post $post)
    {
        $hasClapped = $post->claps()->where('user_id', Auth::id())->exists();
        if ($hasClapped) {
            // If the user has already clapped, we can remove the clap
            $post->claps()->where('user_id', Auth::id())->delete();
            return response()->json([
                'clapsCount' => $post->claps->count(),
            ]);
        }else {
            // If the user has not clapped, we can add a clap
            $post->claps()->firstOrCreate([
                'user_id' => Auth::id(),
            ]);
        }

        return response()->json([
            'clapsCount' => $post->claps->count(),
        ]);
    }
}
