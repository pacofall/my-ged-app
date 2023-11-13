@extends('layouts.base')

@section('content')

<h1>Search documents</h1>

<h3 class="mt-4 mt-4">Filter by: </h3>


<form class="row p-3 mt-3 mb-3" style="border:1px solid #999; border-radius: 5px">
    @csrf
        <div class="col row">
            <label for="category" class="col-5 col-form-label">Category type</label>
            <div class="col">
                <select name="category_id" class="form-select" id="category">
                    <option selected>Choose...</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col row">
            <label for="created_by" class="col-5 col-form-label">Created by</label>
            <div class="col">
                <input name="created_by" type="text" class="form-control" id="created_by" placeholder="created by">
            </div>
        </div>
        <div class="col row">
            <label for="name" class="col-5 col-form-label">Name</label>
            <div class="col">
                <input name="name" type="text" class="form-control" id="name" placeholder="Name or title document">
            </div>
        </div>

        <div class="col ">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>

</form>


<table class="table table-striped">
    <thead>
    <th>id</th>
    <th>name</th>
    <th>category</th>
    <th>created by</th>
    <th></th>
    </thead>
    <tbody>
    @foreach ($documents as $document)
    <tr>
        <td>{{ $document->id }}</td>
        <td>{{ $document->name }}</td>
        <td>{{ $document->category->name }}</td>
        <td><i class="bi bi-0-circle"></i>
            {{ $document->createdBy->name }}</td>
        <td style="text-align: right;">
            <a href="{{ route('document-show-page', ['doc' => $document]) }}" class="card-link"><i class="bi bi-pen"></i></a>
            <a href="#" class="card-link"><i class="bi bi-trash3"></i></a>
            <a href="#" class="card-link"><i class="bi bi-share"></i></a>

        </td>
    </tr>
    @endforeach
    </tbody>
</table>


{{--<div class="row">--}}
{{--@foreach ($documents as $document)--}}

{{--<div class="card m-3 p-0" style="width: 18rem;">--}}
{{--    <img src="https://picsum.photos/id/{{ $document->id }}/320/240" class="card-img-top" alt="...">--}}
{{--    <div class="card-body">--}}
{{--        <h5 class="card-title">{{ $document->name }}</h5>--}}
{{--        <p class="card-text">{{ Str::limit($document->description , 75, $end='...') }}</p>--}}

{{--    </div>--}}
{{--    <ul class="list-group list-group-flush">--}}
{{--        <li class="list-group-item"><b>id:</b> {{ $document->id }}</li>--}}
{{--        <li class="list-group-item"><b>category:</b> {{ $document->category->name }}</li>--}}
{{--        <li class="list-group-item"><b>source:</b> {{ $document->source }}</li>--}}
{{--        <li class="list-group-item"><b>access type:</b> {{ $document->access }}</li>--}}
{{--    </ul>--}}
{{--    <div class="card-body">--}}
{{--        <a href="{{route('document-show-page', ['doc' => $document])}}" class="card-link"><i class="bi bi-pen"></i></a>--}}
{{--        <a href="#" class="card-link"><i class="bi bi-trash3"></i></a>--}}
{{--        <a href="#" class="card-link"><i class="bi bi-share"></i></a>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endforeach--}}
{{--</div>--}}

@endsection
