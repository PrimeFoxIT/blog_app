@extends('admin.template.base')

@section('title', 'Posts')
@section('subtitle', 'Add post')

@section('content')
    <div class="row">
        <div class="col-12">
            {{ html()->form('POST', route('admin.posts.store'))->acceptsFiles()->open() }}
                @include('admin.posts.form')
            {{ html()->form()->close() }}
        </div>
    </div>
@endsection
