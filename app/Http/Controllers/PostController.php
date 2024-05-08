<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\EditPostRequest;
use App\Models\Post;
use App\Services\Interfaces\IPostCategoryService;
use App\Services\Interfaces\IPostService;
use App\Services\Interfaces\ITagService;
use App\ViewModels\Posts\CreatePostPageViewModel;
use App\ViewModels\Posts\EditPostPageViewModel;
use App\ViewModels\Posts\PostListPageViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

class PostController extends Controller
{
    public function __construct(private readonly IPostService $postService,
                                private readonly IPostCategoryService $postCategoryService,
                                private readonly ITagService $postTagService)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewModel = new PostListPageViewModel($this->postService->getAll());

        return view('admin.posts.index', $viewModel);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $viewModel = new CreatePostPageViewModel($this->postCategoryService->getAll(), $this->postTagService->getAll());

        return view('admin.posts.create', $viewModel);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request)
    {
        try {
            $this->postService->create(Uuid::uuid4(), $request->getPostObject());
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->withInput()->withErrors('An error occurred while creating the post. Please try again.');
        }

        return redirect()->route('admin.posts')->withSuccess('Post created successfully.');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $viewModel = new EditPostPageViewModel($post, $this->postCategoryService->getAll(), $this->postTagService->getAll());

        return view('admin.posts.edit', $viewModel);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditPostRequest $request, string $id)
    {
        try {
            $this->postService->update(Uuid::fromString($id), $request->getPostObject());
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->withInput()->withErrors('An error occurred while updating the post. Please try again.');
        }

        return redirect()->route('admin.posts')->withSuccess('Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->postService->remove(Uuid::fromString($id));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->withErrors('An error occurred while deleting the post. Please try again.');
        }

        return redirect()->route('admin.posts')->withSuccess('Post deleted successfully.');
    }
}
