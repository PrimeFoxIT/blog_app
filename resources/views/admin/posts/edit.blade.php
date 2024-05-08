@extends('admin.template.base')

@section('title', 'Posts')
@section('subtitle', 'Edit post')

@section('content')
    <div class="row">
        <div class="col-12">
            {{ html()->modelForm($view->post, 'PUT', route('admin.posts.update', ['id' => $view->post->id]))->acceptsFiles()->open() }}
                @include('admin.posts.form')
            {{ html()->closeModelForm() }}
        </div>
    </div>
@endsection
