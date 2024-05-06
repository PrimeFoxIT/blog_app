@extends('admin.template.base')

@section('title', 'Tags')
@section('subtitle', 'Edit tag')

@section('content')
    <div class="row">
        <div class="col-12">
            {{ html()->form('POST', route('admin.tags.store'))->open() }}
                @include('admin.tags.form')
            {{ html()->form()->close() }}
        </div>
    </div>
@endsection
