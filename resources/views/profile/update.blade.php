@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="h2 m-auto">Update your profile</h2>
        </div>
        <div class="card-footer">
            <form action="{{route('profile.update')}}" method="post">
            @csrf
            <!--NAME-->
                <div class="form-group">
                    <label for="nameInput">Full Name:</label>
                    <input required type="text" class="form-control @error('message') is-invalid @enderror" id="nameInput" placeholder="Full Name" value="{{$user->name}}"
                           name="name">
                </div>
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('message') }}</strong>
                </div>
                <!--EMAIL-->

                <div class="w-100 mb-3">
                    <label for="emailInput">Email Address:</label>
                    <input required type="email" class="form-control @error('email') is-invalid @enderror @error('message') is-invalid @enderror" id="emailInput" placeholder="Email Address" value="{{$user->email}}"
                           name="email" required>


                @if($errors->first('email'))
                    <div class="invalid-tooltip" role="alert">
                       <strong>{{$errors->first('email')}}</strong>
                    </div>
                @endif
                </div>

                <div class="form-row align-items-center">

                    <!--PHONE-->
                    <div class="col-md-6 mb-3">
                        <label for="phoneInput">Phone Number:</label>
                        <input type="tel" class="form-control" @error('phonenumber') is-invalid @enderror id="phoneInput"
                               placeholder="Phone Number" value="@if($user->phonenumber != NULL){{$user->phonenumber}}@endif"
                               name="phonenumber">

                        @if($errors->first('phonenumber'))
                            <div class="invalid-tooltip" role="alert">

                               <strong>{{ $errors->first('phonenumber') }}</strong>

                            </div>
                        @endif
                    </div>

                    <!--AGE-->
                    <div class="col-md-3 mb-3">
                        <label for="birthInput">Birth Date:</label>
                        <input type="date" class="form-control" id="birthInput" placeholder="Birth Date"
                               value="@if($user->birthdate != NULL){{$user->birthdate}}@endif" name="birthdate">
                    </div>

                    <!--GENDER-->
                    <div class="col-md-3 mb-3">
                        <label for="genderInput">Gender:</label>
                        <select class="form-control" id="genderInput" name="gender">
                            <option value="{{$user->gender}}" selected>@if($user->gender != NULL){{$user->gender}}@else None
                                Selected @endif</option>
                            @if($user->gender == "Male")
                                <option value="Female">Female</option>
                            @elseif($user->gender == "Female")
                                <option value="Male">Male</option>
                            @else
                                <option value="Female">Female</option>
                                <option value="Male">Male</option>
                            @endif
                        </select>
                    </div>
                </div>

                <button class="btn btn-outline-light" type="submit">Update</button>
            </form>
        </div>
    </div>


@endsection
