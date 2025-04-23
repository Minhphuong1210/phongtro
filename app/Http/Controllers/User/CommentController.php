<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
class CommentController extends Controller
{
   

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required|string|max:1000',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        $comment = Comment::create([
            'user_id' => auth()->id(),
            'comment' => $request->content,
            'parent_id' => $request->parent_id, 
            'phong_tro_id'=>$request->phong_tro_id,
        ]);



        return response()->json([
            'comment' => $comment->comment,
            'user' => $comment->user->name,
            'created_at' => $comment->created_at->diffForHumans(),
            'parent_id' => $comment->parent_id,
            'id' => $comment->id,
        ]);
    }
}