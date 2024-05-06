@extends('admin.template.base')

@section('title', 'Tags')
@section('subtitle', 'Tags List')

@section('card-buttons')
    <a href="{{ route('admin.tags.create') }}" class="btn btn-primary">Add new</a>
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
                    @foreach($view->tags as $tag)
                        <tr>
                            <td>
                                {{ $tag->name }}
                            </td>
                            <td>
                                <a href="{{ route('admin.tags.edit', ['tag' => $tag]) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('admin.tags.destroy', ['id' => $tag]) }}" class="btn btn-danger">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
