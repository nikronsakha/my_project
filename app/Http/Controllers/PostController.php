<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class PostController extends Controller
{

    public function main()
    {

        return view('main');


    }

    public function index()
    {
        $posts= Post::all();

        //dd($posts->tags);
        return view('posts.posts',compact('posts'));


    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create' , compact('categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tag_id' =>'',
        ]);
        $tags = $data['tag_id'];
        unset($data['tag_id']);

        $post = Post::create($data);

        $post->tags()->attach($tags);

//       foreach ($tags as $tag ) {
//            PostTag::firstOrcreate([
//                'tag_id' => $tag,
//                'post_id' => $post->id,
//            ]);
//        }

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }


    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories' , 'tags'));
    }


    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tag_id' =>'',
        ]);
        $tags = $data['tag_id'];
        unset($data['tag_id']);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }


    public function destroy(Post $post)
    {

        $post->delete();
        return redirect()->route('post.index');
    }

}




