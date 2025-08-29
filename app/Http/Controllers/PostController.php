<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(private PostService $service){}

    /**
     * Все посты
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = $this->service->getAllPosts();
        return view('posts.index', compact('posts'));
    }

    /**
     * Пост с комментариями
     *
     * @param int $id Id поста
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {
        $post = $this->service->getPostWithCommentsById($id);
        if (!$post) {
            abort(404, 'Пост не найден');
        }

        return view('posts.show', compact('post'));
    }

    /**
     * Форма для создания поста
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Создание нового поста
     *
     * @param StorePostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePostRequest $request)
    {
        $this->service->createPost($request->validated());

        return redirect()->route('posts.index')->with('success', 'Пост добавлен');
    }
}
