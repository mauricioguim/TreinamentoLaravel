<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostAdmController extends Controller
{

    /**
     * @var Post
     */

    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {

        $posts = $this->post->paginate(5);


        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(PostRequest $request)
    {
        $this->post->create($request->all());

        return redirect()->route('admin.posts.index');
    }

    public function edit($id)
    {
        $post = $this->post->find($id);

        return view('admin.posts.edit', compact('post'));
    }

    public function update(PostRequest $request, $id)
    {
        $this->post->find($id)->update($request->all());

        return redirect()->route('admin.posts.index');
    }

    public function destroy($id)
    {
        $this->post->find($id)->delete();
        
        return redirect()->route('admin.posts.index');
    }
}
