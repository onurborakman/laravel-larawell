@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="h2 m-auto">{{__('Post a Job')}}</h2>
        </div>
        <div class="card-body">
            <form action="{{route('job.add')}}" method="post">
            @csrf
            <!--TITLE-->
                <div class="form-group">
                    <label for="titleInput">{{__('Title:')}}</label>
                    <input type="text" class="form-control @error('message') is-invalid @enderror" id="titleInput" placeholder="Title" name="title" required>
                </div>
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('message') }}</strong>
                    </div>
            <!--DESCRIPTION-->
                <div class="form-group">

                    <label for="degreeInput">{{__('Description:')}}</label><br>
                    <textarea class="form-control @error('message') is-invalid @enderror" name="description" id="descriptionInput" rows="5"
                              placeholder="Description" required></textarea>
                </div>
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('message') }}</strong>
                    </div>
                <div class="form-row align-items-center">
                    <div class="col-md-6 mb-3">
                        <!--COMPANY-->
                        <label for="companyInput">{{__('Company Name:')}}</label>
                        <input type="text" class="form-control @error('message') is-invalid @enderror" id="companyInput" placeholder="Company Name"
                               name="company" required>
                    </div>
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('message') }}</strong>
                        </div>
                <!--LOCATION-->
                    <div class="col-md-6 mb-3">
                        <label for="locationInput">{{__('Location:')}}</label>
                        <input type="text" class="form-control @error('message') is-invalid @enderror" id="locationInput" placeholder="Location"
                               name="location" required>
                    </div>
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('message') }}</strong>
                        </div>
                    <div class="col-md-4 mb-3">
                        <!--TYPE-->
                        <label for="typeInput">{{__('Type:')}}</label>
                        <select class="form-control" id="typeInput" name="type">
                            <option value="Remote">Remote</option>
                            <option value="On-Premise">On Premise</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <!--PAY-->
                        <label for="payInput">{{__('Pay Range:')}}</label>
                        <input type="text" class="form-control @error('pay_range') is-invalid @enderror @error('message') is-invalid @enderror" id="payInput" placeholder="Pay Range" name="pay_range" required>
                        <span class="invalid-tooltip" role="alert">
                            <strong>
                                @if($errors->has('pay_range'))
                                    {{__('Please only enter numbers')}}
                                @endif
                            </strong>
                        </span>

                    </div>

                    <div class="col-md-4 mb-3">
                        <!--EMPLOYMENT-->
                        <label for="employmentInput">{{__('Employment Type:')}}</label>
                        <select class="form-control" id="employmentInput" name="employment">
                            <option value="Full-Time">{{__('Full-Time')}}</option>
                            <option value="Part-Time">{{__('Part Time')}}</option>
                            <option value="Contract">{{__('Contract')}}</option>
                            <option value="Temporary">{{__('Temporary')}}</option>
                            <option value="Volunteer">{{__('Volunteer')}}</option>
                            <option value="Internship">{{__('Internship')}}</option>
                            <option value="Other">{{__('Other')}}</option>
                        </select>
                    </div>
                    <!-- CONTACT PHONE NUMBER -->
                    <div class="col-md-6 mb-3">
                        <label for="phoneInput">{{__('Contact Phone Number:')}}</label>
                        <input type="text" class="form-control @error('phonenumber') is-invalid @enderror @error('message') is-invalid @enderror" id="phoneInput" placeholder="Contact Phone Number"
                               name="phonenumber" required>
                        <span class="invalid-tooltip" role="alert">
                            <strong>
                                @if($errors->has('phonenumber'))
                                    {{__('Please only enter numbers')}}
                                    @endif
                            </strong>
                        </span>
                    </div>

                <!-- CONTACT EMAIL ADDRESS -->
                    <div class="col-md-6 mb-3">
                        <label for="emailInput">{{__('Contact Email Address:')}}</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="emailInput" placeholder="Contact Email Address"
                               name="email" required>
                        <span class="invalid-tooltip" role="alert">
                            <strong>
                                {{$errors->first('email')}}
                            </strong>
                        </span>
                    </div>

                </div>
                <button class="btn btn-outline-light" type="submit">{{__('Post')}}</button>
            </form>
        </div>
    </div>
@endsection
