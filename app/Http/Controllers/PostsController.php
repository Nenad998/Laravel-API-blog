<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function getAllPosts()
    {
        $posts = Post::paginate(8);
        return $posts;
    }

    public function getPostById($id)
    {
        $post = Post::findOrFail($id);
        return $post;
    }

    public function getPostsByUser($userId)
    {
        $posts = Post::where('user_id', $userId)->paginate(8);
        return $posts;
    }

    public function getPostsByCategory($categoryId)
    {
        $posts = Post::whereHas('categories', function (Builder $query) use($categoryId) {
            $query->where('category_id', $categoryId);
        })->paginate(8);

        return $posts;
    }

    public function getPostsBySearchTerm($keyword)
    {
        $posts = Post::where('title', 'like', '%' . $keyword . '%')->paginate(8);
        return $posts;
    }

    // CRUD

    public function createNewPost(Request $request)
    {
        Post::create($request->all());
    }

    public function updatePost(Request $request, $id)
    {
        $post = Post::find($id);
        $post->update($request->all());

        return $post;
    }

    public function deletePost($id)
    {
        $post = Post::destroy($id);

        return $post;
    }
}
