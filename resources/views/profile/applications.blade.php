@extends('layouts.app')

@section('content')
    @if($applications)
    @foreach($applications as $application)
        <div class="card">
            <div class="card-header">
                <h2 class="h2 m-auto" style="display: inline"><a href="{{route('visit.job', $application->job->id)}}">{{$application->job->title}}</a></h2>
                @if($application->status == NULL)
                    <div class="float-right text-info">{{__('Status: Under Review')}}</div>
                @elseif($application->status == "Rejected")
                <div class="float-right text-danger">Status: {{$application->status}}</div>
                @else
                    <div class="float-right text-success">Status: {{$application->status}}</div>
                    @endif
            </div>
            <div class="card-body">
                {{$application->job->description}}
            </div>
        </div>
        <br>
    @endforeach
    @endif

@endsection
