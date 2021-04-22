@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="h2 m-auto">{{$group->title}}
                @if(in_array(Auth::id(), $members))
                    <form action="{{route('group.leave')}}" method="POST" style="display: inline">
                        @csrf
                        <input type="hidden" value="{{$group->id}}" name="id">
                        <button type="submit" class="btn btn-danger">{{__('Leave')}}</button>
                    </form>
                @else
                    <form action="{{route('group.join')}}" method="POST" style="display: inline">
                        @csrf
                        <input type="hidden" value="{{$group->id}}" name="id">
                        <button type="submit" class="btn btn-success">{{__('Join')}}</button>
                    </form>
                @endif

                @if(Auth::id() == $group->owner)
                    <form action="{{route('group.edit')}}" method="GET" style="display: inline">
                        @csrf
                        <input type="hidden" value="{{$group->id}}" name="id">
                        <button type="submit" class="btn btn-outline-light float-right">{{__('Edit')}}</button>
                    </form>
                @endif
            </h2>
        </div>
        <div class="card-body">
            {{$group->description}}
            <br>

        </div>

    </div>
    <br>
    <div class="card">
        <div class="card-header">
            <h2 class="h2 m-auto">{{__('Members')}}</h2>
        </div>
        <div class="card-body">
            @foreach($group->members as $member)
                <a href="{{route('visit.profile', $member->user->id)}}">{{$member->user->name}}</a><br>
            @endforeach
        </div>

    </div>

@endsection
