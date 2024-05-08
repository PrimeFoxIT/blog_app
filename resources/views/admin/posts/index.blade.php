@extends('admin.template.base')

@section('title', 'Posts')
@section('subtitle', 'Posts List')

@section('card-buttons')
    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Add new</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Tags</th>
                    <th>Published</th>
                    <th class="no-sort">#</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($view->posts as $post)
                        <tr>
                            <td>
                                {{ $post->title }}
                            </td>
                            <td>
                                {{ $post->category->name }}
                            </td>
                            <td>
                                @foreach($post->tags as $tag)
                                    <span class="badge badge-primary">{{ $tag->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if ($post->published_at != null)
                                    {{ $post->published_at->format('d/m/Y H:i') }}
                                    @if ($post->published_at->isFuture())
                                        <span class="badge badge-warning">Scheduled</span>
                                    @endif
                                @else
                                    No
                                @endif
                            <td>
                                <a href="{{ route('admin.posts.edit', ['post' => $post]) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('admin.posts.destroy', ['id' => $post]) }}" class="btn btn-danger">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
