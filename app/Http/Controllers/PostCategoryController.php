<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostCategoryRequest;
use App\Http\Requests\EditPostCategoryRequest;
use App\Models\PostCategory;
use App\Services\Interfaces\IPostCategoryService;
use App\ViewModels\PostCategories\CreatePostCategoryPageViewModel;
use App\ViewModels\PostCategories\EditPostCategoryPageViewModel;
use App\ViewModels\PostCategories\PostCategoryListPageViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

class PostCategoryController extends Controller
{
    public function __construct(private readonly IPostCategoryService $postCategoryService)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewModel = new PostCategoryListPageViewModel($this->postCategoryService->getAll());

        return view('admin.post-categories.index', $viewModel);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $viewModel = new CreatePostCategoryPageViewModel($this->postCategoryService->getParentCategories());

        return view('admin.post-categories.create', $viewModel);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostCategoryRequest $request)
    {
        try {
            $this->postCategoryService->create(Uuid::uuid4(), $request->getPostCategoryObject());
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->withErrors('An error occurred while creating the post category.');
        }

        return redirect()->route('admin.post-categories')->withSuccess('Post category created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostCategory $category)
    {
        $viewModel = new EditPostCategoryPageViewModel($category, $this->postCategoryService->getParentCategories());

        return view('admin.post-categories.edit', $viewModel);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditPostCategoryRequest $request, string $id)
    {
        try {
            $this->postCategoryService->update(Uuid::fromString($id), $request->getPostCategoryObject());
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->withErrors( 'An error occurred while updating the post category.');
        }

        return redirect()->route('admin.post-categories')->withSuccess('Post category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->postCategoryService->remove(Uuid::fromString($id));
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->withErrors('An error occurred while deleting the post category.');
        }

        return redirect()->route('admin.post-categories')->withSuccess('Post category deleted successfully.');
    }
}
