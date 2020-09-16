<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function submit(CommentRequest $req)
    {
        $comment = new Comment();
        $comment->user_id = $req->input('user_id');
        $comment->news_id = $req->input('news_id');
        $comment->text = $req->input('text');

        $comment->save();

        return redirect()->back()->with('success', 'Комментарий добавлен');
    }

    public function deleteComment(Request $req)
    {

        // Удаление комментария
        $comment = Comment::find($req->comment_id);
        $comment->delete();

        return redirect()->back()->with('success', 'Комментарий удален');
    }
}
