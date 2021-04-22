@extends('layouts.app')

@section('content')
    <!-- Portfolios -->
    <div class="card">
        <div class="card-header">
            <h2 class="h2 m-auto">
                {{__('Portfolios')}}
            </h2>
        </div>

        <div class="card-body">

            @foreach($profiles as $profile)
                <div class="card">
                    <div class="card-body">
                        <h2 class="h2 m-auto" style="display: inline">{{$profile->name}}</h2>
                        <form style="display: inline" action="{{route('visit.profile', $profile->id)}}">
                            <button class="btn btn-info float-right" type="submit">{{__('Visit Portfolio')}}</button>
                        </form>
                    </div>
                </div>
                <br>
            @endforeach
                <div class="row justify-content-center">
                    {{$profiles->links()}}
                </div>
        </div>
    </div>
    <br>
    <!-- Jobs -->
    <div class="card">
        <div class="card-header">
            <h2 class="h2 m-auto">
                {{__('Jobs')}}
            </h2>
        </div>

        <div class="card-body">
            @foreach($jobs as $job)
                <div class="card">
                    <div class="card-header">
                        <h2 class="h2 m-auto" style="display: inline">
                            {{$job->title}}
                        </h2>
                        <form style="display: inline" action="{{route('visit.job', $job->id)}}">
                            <button class="btn btn-info float-right" type="submit">{{__('More Details')}}</button>
                        </form>
                    </div>
                    <div class="card-body">
                        {{__('Company: ')}}{{$job->company}}<br>
                        {{__('Location: ')}}{{$job->location}}<br>
                        {{__('Type: ')}}{{$job->type}}<br>
                        {{__('Employment Type: ')}}{{$job->employment}}
                    </div>

                </div>
                <br>
            @endforeach
                <div class="row justify-content-center">
                    {{$jobs->links()}}
                </div>
        </div>

    </div>

    <br>
    <!-- Skills -->
    <div class="card">
        <div class="card-header">
            <h2 class="h2 m-auto">
                People with "{{$search}}" as a Skill
            </h2>
        </div>

        <div class="card-body">
            @foreach($skills as $skill)
                <div class="card">
                    <div class="card-body">
                        <h2 class="h2 m-auto" style="display: inline">{{$skill->user->name}}</h2>
                        <form style="display: inline" action="{{route('visit.profile', $skill->user->id)}}">
                            <button class="btn btn-info float-right" type="submit">{{__('Visit Portfolio')}}</button>
                        </form>
                    </div>
                </div>
                <br>
            @endforeach
                <div class="row justify-content-center">
                    {{$skills->links()}}
                </div>
        </div>

    </div>
    <br>
    <!-- Groups -->
    <div class="card">
        <div class="card-header">
            <h2 class="h2 m-auto">
                {{__('Groups')}}
            </h2>
        </div>

        <div class="card-body">

            @foreach($groups as $group)
                <div class="card">
                    <div class="card-header">
                        <h2 class="h2 m-auto" style="display: inline">
                            {{$group->title}}
                        </h2>
                        <form style="display: inline" action="{{route('group.page', $group->id)}}">
                            <button class="btn btn-info float-right" type="submit">{{__('Visit Group Page')}}</button>
                        </form>
                    </div>
                    <div class="card-body">
                        {{__('Description: ')}}{{$group->description}}
                    </div>

                </div>
                <br>
            @endforeach
                <div class="row justify-content-center">
                    {{$groups->links()}}
                </div>
        </div>

    </div>
@endsection
