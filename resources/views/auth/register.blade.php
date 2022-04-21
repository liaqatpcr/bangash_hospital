@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">{{__('Name Of The User')}} <span class="text-red">*</span></label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">{{__('Email Address')}} <span class="text-red">*</span></label>
                            <input required id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">{{__('Password')}} <span class="text-red">*</span></label>
                            <input required value="" id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{__('Contact No :')}} </label>
                            <input required type="text" class="form-control" name="contactno"
                                placeholder="Enter Your Contact No...">
                        </div>

                        <div class="form-group">
                            <label>{{__('Education :')}} </label>
                            <input required type="text" class="form-control" name="education"
                                placeholder="Enter Your Education...">
                        </div>
                        <div class="form-group">
                            <label>{{__('skills :')}} </label>
                            <input required type="text" class="form-control" name="skills"
                                placeholder="Enter Your Skills...">
                        </div>
                        <div class="form-group">
                            <label>{{__('notes :')}} </label>
                            <input required type="text" class="form-control" name="notes"
                                placeholder="Enter Your Notes...">
                        </div>


                        <div class="form-group">
                            <label for="user-type">{{ __('User Type') }} <span class="text-red">*</span></label>
                            <select required id="user-type" type="select" class="form-control" name="user_type"
                                required>
                                <option value="admin">Administrator</option>
                                <option value="doctor">Doctor</option>
                                <option value="pharmacist">Pharmacist</option>
                                <option selected value="general">General Staff</option>
                            </select>
                        </div>

                        <!-- /.box-body -->

                        <div>

                            <button type="submit" class="pull-right btn btn-primary">{{__('Register')}}</button>

                        </div>

                    </div>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection