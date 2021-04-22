@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="h2 m-auto">
                {{$job->title}}
                @if($apply == TRUE)
                    <button class="btn btn-primary btn-sm float-right ml-2" disabled>{{__('Applied')}}</button>
                @else
                <form action="{{route('job.apply', $job->id)}}" method="post" style="display: inline">
                    @csrf
                    <input type="hidden" name="id" value="{{$job->id}}">
                    <button class="btn btn-primary btn-sm float-right ml-2" type="submit">{{__('Apply')}}</button>
                </form>
                @endif
            </h2>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Company:</th>
                    <td>{{$job->company}}</td>
                </tr>
                <tr>
                    <th>Description:</th>
                    <td>{{$job->description}}</td>
                </tr>
                <tr>
                    <th>Location:</th>
                    <td>{{$job->location}}</td>
                </tr>
                <tr>
                    <th>Type:</th>
                    <td>{{$job->type}}</td>
                </tr>
                <tr>
                    <th>Pay Range:</th>
                    <td>{{$job->pay_range}}</td>
                </tr>
                <tr>
                    <th>Employment Type:</th>
                    <td>{{$job->employment}}</td>
                </tr>
                <tr>
                    <th>Contact Phone Number:</th>
                    <td>{{$job->phonenumber}}</td>
                </tr>
                <tr>
                    <th>Contact Email Address:</th>
                    <td>{{$job->email}}</td>
                </tr>
            </table>
        </div>
    </div>
    </div>
@endsection
