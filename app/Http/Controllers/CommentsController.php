<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller {
    public function addComment(Request $request) {
        $movie_id = $request->input('movie_id');
        $content = $request->input('content');
        $result = ['success' => false];
        if (!Auth::check()) {
            $result['error'] = 'NO_AUTH';
            return json_encode($result);
        }
        $movie = Movie::find($movie_id);
        if ($movie == null) {
            $result['error'] = 'NO_MOVIE';
        }
        $comment = new Comment();
        $comment->content = $content;
        $comment->user_id = Auth::id();
        $comment->movie_id = $movie_id;
        $comment->save();
        $result['success'] = true;
        $result['comment'] = ['author' => $comment->author->name,
            'content' => $comment->content,
            'profile_picture' => $comment->author->get_profile_picture()];
        return $result;
    }

}
