@php use App\Models\Document; @endphp
@extends('layouts.base')

@section('title', "Add new document")

@section('content')

    <h2>Page ADD document - </h2>


    Page for add a new  documents (Eq Form..!!!)

    <ul>
        <li>Provide a datable with list all document of user owner and share with me</li>
    </ul>


    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row justify-content-center" >

        <form action="{{ route("document-action-add") }}" method="post" class="col-8" enctype="multipart/form-data"
              style="padding: 50px; border-radius: 8px; border: 1px solid #848fa6; box-shadow: 1px 4px 1px 1px #848fa6;">
            @csrf

            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name :</label>
                <div class="col-sm-10">
                    <input name="name" type="text" class="form-control" id="name" placeholder="Name or title document">
                </div>
            </div>

            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Description:</label>
                <div class="col-sm-10">
                <textarea name="description" rows="3" class="form-control" id="description"
                          placeholder="Small description of content'S document..."></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <label for="category" class="col-sm-2 col-form-label">Category type:</label>
                <div class="col-sm-10">
                    <select name="category_id" class="form-select" id="category">
                        <option selected>Choose...</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="source" class="col-sm-2 col-form-label">Source of document: </label>
                <div class="col-sm-10">
                    <input name="source" type="text" class="form-control" id="source"
                           placeholder="Source eq. Company name">
                </div>
            </div>

            <div class="row mb-3">
                <label for="created_by" class="col-sm-2 col-form-label">Created by</label>
                <div class="col-sm-10">
                    <input name="created_by" type="text" class="form-control" id="created_by"
                           placeholder="Current user">
                </div>
            </div>

            <div class="row mb-3">
                <label for="file" class="col-sm-2 col-form-label">File document:</label>
                <div class="col-sm-10">
                    <input name="file" type="file" class="form-control-file" id="file">
                </div>


            </div>

            <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Type access</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="access" id="access-public" value="{{Document::ACCESS_PUBLIC}}" checked>
                        <label class="form-check-label" for="access-public">
                            Public
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="access" id="access-private" value="{{Document::ACCESS_PUBLIC}}">
                        <label class="form-check-label" for="access-private">
                            Private
                        </label>
                    </div>
                    <div class="form-check disabled">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
                        <label class="form-check-label" for="gridRadios3">
                            Third disabled radio
                        </label>
                    </div>
                </div>
            </fieldset>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
@endsection
