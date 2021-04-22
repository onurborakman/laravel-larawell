@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="h2 m-auto">{{__('Add a New Job')}}</h2>
        </div>
        <div class="card-body">
            <form action="{{route('job.history.add')}}" method="post">
            @csrf
            <!--TITLE-->
                <div class="form-group">
                    <label for="titleInput">Title:</label>
                    <input required type="text" class="form-control @error('message') is-invalid @enderror" id="titleInput" placeholder="Title" name="title">
                </div>
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('message') }}</strong>
                </div>
                <!--LOCATION-->
                <div class="form-group">
                    <label for="locationInput">Location:</label>
                    <input required type="text" class="form-control @error('message') is-invalid @enderror" id="locationInput" placeholder="Location" name="location">
                </div>
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('message') }}</strong>
                </div>
                <!--DESCRIPTION-->
                <div class="form-group">

                    <label for="degreeInput">Description:</label><br>
                    <textarea required class="form-control @error('message') is-invalid @enderror" name="description" id="descriptionInput" rows="5"
                              placeholder="Description"></textarea>

                </div>
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('message') }}</strong>
                </div>
                <div class="form-row align-items-center">
                    <!--START DATE-->
                    <div class="col-md-6 mb-3">
                        <label for="startInput">Start Date:</label>
                        <input required type="date" class="form-control @error('message') is-invalid @enderror" id="startInput" placeholder="Start Date" name="start_date">
                    </div>
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('message') }}</strong>
                    </div>
                    <!--END DATE-->
                    <div class="col-md-6 mb-3">
                        <label for="endInput">End Date:</label>
                        <input type="date" class="form-control" id="endInput" placeholder="End Date" name="end_date">
                    </div>
                </div>
                <button class="btn btn-outline-light" type="submit">Add</button>
            </form>
        </div>
    </div>


@endsection
