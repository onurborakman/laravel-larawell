@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="h2 m-auto">{{__('Create a Group')}}</h2>
        </div>
        <div class="card-body">
            <form action="{{route('group.create')}}" method="post">
            @csrf
            <!--TITLE-->
                <div class="form-group">
                    <label for="titleInput">{{__('Title:')}}</label>
                    <input type="text" class="form-control @error('message') is-invalid @enderror" id="titleInput" placeholder="Title"
                           name="title" required>
                </div>
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('message') }}</strong>
                </div>
                <!--DESCRIPTION-->
                <div class="form-group">

                    <label for="degreeInput">Description:</label><br>
                    <textarea class="form-control @error('message') is-invalid @enderror" name="description" id="descriptionInput" rows="5"
                              placeholder="Description" required></textarea>

                </div>
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('message') }}</strong>
                </div>
                <button class="btn btn-outline-light" type="submit">Create</button>
            </form>
        </div>
    </div>


@endsection
