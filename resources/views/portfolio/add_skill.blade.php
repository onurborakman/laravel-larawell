@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="h2 m-auto">{{__('Add a New Skill')}}</h2>
        </div>
        <div class="card-body">
            <form action="{{route('skill.add')}}" method="post">
            @csrf
            <!--NAME-->
                <div class="form-group">
                    <label for="nameInput">Name:</label>
                    <input required type="text" class="form-control @error('message') is-invalid @enderror" id="nameInput" placeholder="Name" name="name">
                </div>
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('message') }}</strong>
                </div>
                <button class="btn btn-outline-light" type="submit">Add</button>
            </form>
        </div>
    </div>


@endsection
