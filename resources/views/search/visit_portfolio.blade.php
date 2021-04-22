@extends('layouts.app')

@section('content')
    <!-- PERSONAL INFORMATION -->
    <div class="card">
        <div class="card-header">
            <h2 class="h2 m-auto">
            {{__('Personal Information')}}
            </h2>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Full Name:</th>
                    <td>{{$user->name}}</td>
                </tr>
                <tr>
                    <th>Contact Email:</th>
                    <td>{{$user->email}}</td>
                </tr>
                <tr>
                    <th>Birth Date:</th>
                    <td>
                        @if($user->birthdate == NULL)
                            No information given
                        @else
                            {{$user->birthdate}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Contact Phone Number:</th>
                    <td>
                        @if($user->phonenumber == NULL)
                            No information given
                        @else
                            {{$user->phonenumber}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Gender:</th>
                    <td>
                        @if($user->gender == NULL)
                            No information given
                        @else
                            {{$user->gender}}
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <br>
    <!-- SKILLS -->
    <div class="card">
        <div class="card-header">
            <h2 class="h2 m-auto">
            {{__('Skills')}}
            </h2>
        </div>
        <div class="card-body">
            @foreach($skills as $skill)
                <div class="card">
                    <div class="card-body">
                        <h2 class="h2 m-auto" style="display: inline">{{$skill->name}}</h2>
                    </div>
                </div>
                <br>
            @endforeach
        </div>
    </div>
    <br>
    <!-- EDUCATION -->
    <div class="card">
        <div class="card-header">
            <h2 class="h2 m-auto">
            {{__('Education')}}
            </h2>
        </div>
        <div class="card-body">
            @foreach($education as $edu)
                <div class="card">
                    <div class="card-header">
                        <h2 class="h2 m-auto">
                        {{$edu->school}}
                        </h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>{{__('Location:')}}</th>
                                <td>{{$edu->location}}</td>
                            </tr>
                            <tr>
                                <th>{{__('Degree:')}}</th>
                                <td>{{$edu->degree}}</td>
                            </tr>
                            <tr>
                                <th>{{__('Start Date:')}}</th>
                                <td>{{$edu->start_date}}</td>
                            </tr>
                            <tr>
                                <th>{{__('End Date:')}}</th>
                                <td>
                                    @if($edu->end_date == NULL)
                                        {{__('Continues')}}
                                    @else
                                        {{$edu->end_date}}
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <br>
            @endforeach
        </div>
    </div>
    <br>
    <!-- JOB HISTORY -->
    <div class="card">
        <div class="card-header">
            <h2 class="h2 m-auto">
            {{__('Job History')}}
            </h2>
        </div>
        <div class="card-body">
            @foreach($jobHistory as $job)
                <div class="card">
                    <div class="card-header">

                        {{$job->title}}

                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>{{__('Location:')}}</th>
                                <td>{{$job->location}}</td>
                            </tr>
                            <tr>
                                <th>{{__('Description:')}}</th>
                                <td>{{$job->description}}</td>
                            </tr>
                            <tr>
                                <th>{{__('Start Date:')}}</th>
                                <td>{{$job->start_date}}</td>
                            </tr>
                            <tr>
                                <th>{{__('End Date:')}}</th>
                                <td>
                                    @if($job->end_date == NULL)
                                        {{__('Continues')}}
                                    @else
                                        {{$job->end_date}}
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <br>
            @endforeach
        </div>
    </div>
@endsection
