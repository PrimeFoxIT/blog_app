@extends('admin.template.base')

@section('title', 'Tags')
@section('subtitle', 'Edit tag')

@section('content')
    <div class="row">
        <div class="col-12">
            {{ html()->modelForm($view->tag, 'PUT', route('admin.tags.update', ['id' => $view->tag->id]))->open() }}
                @include('admin.tags.form')
            {{ html()->closeModelForm() }}
        </div>
    </div>
@endsection
