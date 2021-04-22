@extends('layouts.app')

@section('admin.content')
    @if(Auth::user()->isAdmin == 1)
        <table class="table table-dark table-hover table-responsive-xl">
            <thead>
            <tr class="table-bordered border-light">
                <th>ID</th>
                <th>Name</th>
                <th>Contact Phone Number</th>
                <th>Contact Email Address</th>
                <th colspan="3">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($applicants as $applicant)
                <tr>
                    <td>{{$applicant->user->id}}</td>
                    <td>{{$applicant->user->name}}</td>
                    <td>{{$applicant->user->phonenumber}}</td>
                    <td>{{$applicant->user->email}}</td>
                    <td align="center">
                        <form action="{{route('visit.profile', $applicant->user->id)}}">
                            <button class="btn btn-info" type="submit">{{__('Portfolio')}}</button>
                        </form>
                    </td>
                    @if($applicant->status == NULL)
                    <td align="center">
                        <form action="{{route('admin.job.approve')}}" method="post">
                            @csrf
                            <input type="hidden" value="{{$applicant->id}}" name="id">
                            <button class="btn btn-success" type="submit">{{__('Approve')}}</button>
                        </form>
                    </td>
                    <td align="center">
                        <form action="{{route('admin.job.reject')}}" method="post">
                            @csrf
                            <input type="hidden" value="{{$applicant->id}}" name="id">
                            <button class="btn btn-danger" type="submit">{{__('Reject')}}</button>
                        </form>
                    </td>
                    @elseif($applicant->status == "Rejected")
                        <td align="center">
                            <form action="{{route('admin.job.approve')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$applicant->id}}" name="id">
                                <button class="btn btn-success" type="submit">{{__('Approve')}}</button>
                            </form>
                        </td>
                        <td align="center">
                            <button class="btn btn-danger" disabled>{{__('Rejected')}}</button>
                        </td>
                        @elseif($applicant->status == "Approved")
                        <td align="center">
                        <button class="btn btn-success" disabled>{{__('Approved')}}</button>
                        </td>
                        <td align="center">
                            <form action="{{route('admin.job.reject')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$applicant->id}}" name="id">
                                <button class="btn btn-danger" type="submit">{{__('Reject')}}</button>
                            </form>
                        </td>
                        @endif
                </tr>
            @endforeach

            </tbody>

        </table>
    @else
        <h1 class="h1" align="center">Unauthorized Access</h1>
    @endif
@endsection
