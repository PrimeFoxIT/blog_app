<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CreateTagRequest;
use App\Models\Tag;
use App\Services\Interfaces\ITagService;
use App\ViewModels\Tags\EditTagPageViewModel;
use App\ViewModels\Tags\TagListPageViewModel;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

class TagController extends Controller
{
    public function __construct(private readonly ITagService $tagService)
    {

    }

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $viewModel = new TagListPageViewModel(
            $this->tagService->getAll()
        );

        return view('admin.tags.index', $viewModel);
    }

    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.tags.create');
    }

    public function store(CreateTagRequest $request)
    {
        $uuid = Uuid::uuid4();

        try {
            $this->tagService->create($uuid, $request->getTagData());
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('admin.tags.create')->withErrors('An error occurred while creating the tag');
        }


        return redirect()->route('admin.tags')->withSuccess('Tag created successfully');
    }

    public function edit(Tag $tag): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $viewModel = new EditTagPageViewModel($tag);

        return view('admin.tags.edit', $viewModel);
    }

    public function update(CreateTagRequest $request, $id)
    {
        try {
            $this->tagService->update(Uuid::fromString($id), $request->getTagData());
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('admin.tags.edit', ['tag' => $id])->withErrors('An error occurred while updating the tag');
        }

        return redirect()->route('admin.tags')->withSuccess('Tag updated successfully');
    }

    public function destroy($id)
    {
        try {
            $this->tagService->remove(Uuid::fromString($id));
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('admin.tags')->withErrors('An error occurred while removing the tag');
        }

        return redirect()->route('admin.tags')->withSuccess('Tag removed successfully');
    }
}
