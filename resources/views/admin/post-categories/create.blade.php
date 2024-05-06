@extends('admin.template.base')

@section('title', 'Post Categories')
@section('subtitle', 'Add category')

@section('content')
    <div class="row">
        <div class="col-12">
            {{ html()->form('POST', route('admin.post-categories.store'))->open() }}
                @include('admin.post-categories.form')
            {{ html()->form()->close() }}
        </div>
    </div>
@endsection
