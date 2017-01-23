<?php namespace App\Http\Controllers;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $Posts = Post::all();

        return response()->json($Posts);
    }

    /**
     * Get the specified post.
     *
     * @return Response
     */
    public function getPost($key_type,$id)
    {
        $Posts = Post::find($key_type,$id);

        return response()->json($Posts);
    }

    /**
     * Create a new post.
     *
     * @return Response
     */
    public function createPost(Request $request)
    {
        $Posts = Post::create($request->all());

        return response()->json($Posts);
    }

    /**
     * Delete the specified post.
     *
     * @param  int  $post_id
     * @return Response
     */
    public function deletePost($post_id)
    {
        $Posts = Post::find('post_id',$post_id);
        $Posts->delete(); 

        return response()->json('success');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $post_id
     * @return Response
     */
    public function updatePost(Request $request,$post_id)
    {
        $Post  = Post::find('post_id',$post_id);
        $Post->title = $request->input('title');
        $Post->body = $request->input('body');
        $Post->tags = $request->input('tags');
        $Post->save();

        return response()->json($Post);
    }

    /**
     * Count the specified post or tag.
     *
     * @param  int  $post_id
     * @return Response
     */
    public function countPost($key_type,$id)
    {
        $Posts = Post::count($key_type,$id);

        return response()->json($Posts);
    }
}
