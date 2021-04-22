@extends('layouts.app')

@section('admin.content')
    @if(Auth::user()->isAdmin == 1)

        <table class="table table-dark table-hover table-responsive-xl m-0" style="overflow: scroll">
            <thead>
            <tr class="table-bordered border-light">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Email Verified</th>
                <th>Role</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Gender</th>
                <th>Birth Date</th>
                <th>Phone Number</th>
                <th colspan="2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if($user->email_verified_at == NULL)
                            NO
                        @else
                            YES
                        @endif
                    </td>
                    <td>
                        @if($user->isAdmin == 1)
                            ADMIN
                        @else
                            USER
                        @endif
                    </td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                    <td>
                        @if($user->gender == NULL)
                            Information not provided
                        @else
                            {{$user->gender}}
                        @endif
                    </td>
                    <td>
                        @if($user->birthdate == NULL)
                            Information not provided
                        @else
                            {{$user->birthdate}}
                        @endif
                    </td>
                    <td>
                        @if($user->phonenumber == NULL)
                            Information not provided
                        @else
                            {{$user->phonenumber}}
                        @endif
                    </td>
                    @if($user->isAdmin != 1)
                        @if($user->deleted_at == NULL)
                            <td align="center">
                                <form action="{{route('admin.user.suspend')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$user->id}}" name="id">
                                    <button class="btn btn-warning" type="submit">Suspend</button>
                                </form>
                            </td>
                            <!--action('UserController@showSuspend')}}-->
                        @else
                            <td align="center">
                                <form action="{{route('admin.user.reactivate')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$user->id}}" name="id">
                                    <button class="btn btn-success" type="submit">Reactivate</button>
                                </form>
                            </td>
                        @endif
                        <td align="center">
                            <form action="{{route('admin.user.delete')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$user->id}}" name="id">
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <th colspan="12">
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
