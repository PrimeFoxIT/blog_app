@extends('admin.template.base')

@section('title', 'Post Categories')
@section('subtitle', 'Post Categories List')

@section('card-buttons')
    <a href="{{ route('admin.post-categories.create') }}" class="btn btn-primary">Add new</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th class="no-sort">#</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($view->postCategories as $category)
                        <tr>
                            <td>
                                {{ $category->name }}
                            </td>
                            <td>
                                <a href="{{ route('admin.post-categories.edit', ['category' => $category]) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('admin.post-categories.destroy', ['id' => $category]) }}" class="btn btn-danger">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
