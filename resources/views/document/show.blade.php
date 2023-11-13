@extends('layouts.base')

@section('content')

    @error("error-download")
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror


<h2>Page Details document - </h2>

<p>This page show Details of document with id provide</p>


{{--    @can("read-document", $document )--}}
{{--        USER CAN SHOW DOCUMENT--}}
{{--    @endcan--}}

<div class="card" style="width: 18rem;">
    <img src="https://99designs-blog.imgix.net/blog/wp-content/uploads/2016/04/wwf.jpg?auto=format&q=60&fit=max&w=930" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $document->name }}</h5>
        <p class="card-text">{{ $document->description }}</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><b>id:</b> {{ $document->id }}</li>
        <li class="list-group-item"><b>category:</b> {{ $document->category->name }}</li>
        <li class="list-group-item"><b>source:</b> {{ $document->source }}</li>
        <li class="list-group-item"><b>access type:</b> {{ $document->access }}</li>
        <li class="list-group-item"><b>file:</b> {{ $document->path }}</li>
    </ul>
    <div class="card-body  justify-content-center">
        <a disabled href="{{ route("document-action-download",["doc"=>$document]) }}" class="card-link"><i class="bi bi-download"></i></a>
        <a href="{{ Gate::allows('download') ? '' :  route("document-action-download",["doc"=>$document]) }}" class="card-link"><i class="bi bi-pen"></i></a>
        <a href="#" class="card-link"><i class="bi bi-trash3"></i></a>
        <a href="#" class="card-link"><i class="bi bi-share"></i></a>
    </div>
</div>



@endsection
