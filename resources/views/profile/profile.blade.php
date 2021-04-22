@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="h2 m-auto">{{__('Your Profile')}}</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>{{__('Full Name:')}}</th>
                    <td>{{$user->name}}</td>
                </tr>
                <tr>
                    <th>{{__('Email Address:')}}</th>
                    <td>{{$user->email}}</td>
                </tr>
                <tr>
                    <th>{{__('Birth Date:')}}</th>
                    <td>
                        @if($user->birthdate == NULL)
                        {{__('No information given')}}
                        @else
                            {{$user->birthdate}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>{{__('Phone Number:')}}</th>
                    <td>
                        @if($user->phonenumber == NULL)
                        {{__('No information given')}}
                        @else
                            {{$user->phonenumber}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>{{__('Gender:')}}</th>
                    <td>
                        @if($user->gender == NULL)
                        {{__('No information given')}}
                        @else
                            {{$user->gender}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>{{__('Role:')}}</th>
                    <td>
                        @if($user->isAdmin == NULL)
                        {{__('User')}}
                        @else
                        {{__('Admin')}}
                        @endif
                    </td>
                </tr>
            </table>
            <a href="{{route('update')}}" class="btn btn-outline-light">{{__('Update Profile')}}</a>
        </div>

    </div>

@endsection
