@extends('layouts.app')

@section('admin.content')
    @if(Auth::user()->isAdmin == 1)
        <table class="table table-dark table-hover table-responsive-xl">
            <thead>
            <tr class="table-bordered border-light">
                <th>ID</th>
                <th>Title</th>
                <th>Company</th>
                <th>Description</th>
                <th>Location</th>
                <th>Type</th>
                <th>Pay Range</th>
                <th>Employment Type</th>
                <th>Contact Phone Number</th>
                <th>Contact Email Address</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th colspan="3">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $job)
                <tr>
                    <td>{{$job->id}}</td>
                    <td>{{$job->title}}</td>
                    <td>{{$job->company}}</td>
                    <td>{{$job->description}}</td>
                    <td>{{$job->location}}</td>
                    <td>{{$job->type}}</td>
                    <td>{{$job->pay_range}}</td>
                    <td>{{$job->employment}}</td>
                    <td>{{$job->phonenumber}}</td>
                    <td>{{$job->email}}</td>
                    <td>{{$job->created_at}}</td>
                    <td>{{$job->updated_at}}</td>
                    <td align="center">
                        <form action="{{route('admin.job.applicants', $job->id)}}" method="get">
                            @csrf
                            <input type="hidden" value="{{$job->id}}" name="id">
                            <button class="btn btn-info" type="submit">Applicants</button>
                        </form>
                    </td>
                    <td align="center">
                        <form action="{{route('admin.job.edit')}}" method="get">
                            @csrf
                            <input type="hidden" value="{{$job->id}}" name="id">
                            <button class="btn btn-info" type="submit">Edit</button>
                        </form>
                    </td>
                    <td align="center">
                        <form action="{{route('admin.job.delete')}}" method="post">
                            @csrf
                            <input type="hidden" value="{{$job->id}}" name="id">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
            <tfoot>
            <tr>
                <th colspan="15">
                    <div class="row justify-content-center">
                        {{$list->links()}}
                    </div>
                </th>
            </tr>
            </tfoot>
        </table>
    @else
        <h1 class="h1" align="center">Unauthorized Access</h1>
    @endif
@endsection
