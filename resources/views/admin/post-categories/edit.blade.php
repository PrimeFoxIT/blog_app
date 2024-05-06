@extends('admin.template.base')

@section('title', 'Post Categories')
@section('subtitle', 'Edit category')

@section('content')
    <div class="row">
        <div class="col-12">
            {{ html()->modelForm($view->category, 'PUT', route('admin.post-categories.update', ['id' => $view->category->id]))->open() }}
                @include('admin.post-categories.form')
            {{ html()->closeModelForm() }}
        </div>
    </div>
@endsection
