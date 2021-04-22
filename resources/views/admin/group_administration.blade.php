@extends('layouts.app')

@section('admin.content')
    @if(Auth::user()->isAdmin == 1)
        <table class="table table-dark table-hover table-responsive-xl">
            <thead>
            <tr class="table-bordered border-light">
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th colspan="2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $group)
                <tr>
                    <td>{{$group->id}}</td>
                    <td>{{$group->title}}</td>
                    <td>{{$group->description}}</td>
                    <td>{{$group->created_at}}</td>
                    <td>{{$group->updated_at}}</td>
                    <td align="center">
                        <form action="{{route('group.edit')}}" method="get">
                            @csrf
                            <input type="hidden" value="{{$group->id}}" name="id">
                            <button class="btn btn-info" type="submit">Edit</button>
                        </form>
                    </td>
                    <td align="center">
                        <form action="{{route('group.delete')}}" method="post">
                            @csrf
                            <input type="hidden" value="{{$group->id}}" name="id">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
            <tfoot>
            <tr>
                <th colspan="7">
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
