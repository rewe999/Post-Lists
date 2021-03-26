@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8 mx-auto">
                <h2 class="h3 mb-4 page-title">Settings</h2>
                <h1 class="alert-success">{{\Illuminate\Support\Facades\Session::get('passwordChanges')}}</h1>
                <div class="my-4">
                    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Profile</a>
                        </li>
                    </ul>
                        <div class="row mt-5 align-items-center">
                            <div class="col-md-3 text-center mb-5">
                                <div class="avatar avatar-xl">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="..." class="avatar-img rounded-circle" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <h4 class="mb-1">{{$user->name}}</h4>
                                    </div>
                                </div>
                                <div class="row mb-4 pt-3">
                                    <div class="col-md-7">
                                        <p class="text-muted">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit nisl ullamcorper, rutrum metus in, congue lectus. In hac habitasse platea dictumst. Cras urna quam, malesuada vitae risus at,
                                            pretium blandit sapien.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <div class="form-row">
                            <form method="POST" action="{{route('user.edit.name')}}">
                                @csrf
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" name="name" value="{{$user->name}}" />
                                </div>
                                @error('name')
                                <p class="alert-danger">{{$message}}</p>
                                @enderror
                                <button type="submit" class="btn btn-primary">Zmień Imię</button>
                            </form>
                        </div>
                        <hr class="my-4" />

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <form method="POST" action="{{route('user.edit.password')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="inputPassword4">Old Password</label>
                                        <input type="password" class="form-control" id="inputPassword5" name="old_password"/>
                                    </div>
                                    @error('old_password')
                                        <p class="alert-danger">{{$message}}</p>
                                    @enderror
                                    <div class="form-group">
                                        <label for="inputPassword5">New Password</label>
                                        <input type="password" class="form-control" id="inputPassword5" name="new_password"/>
                                    </div>
                                    @error('new_password')
                                        <p class="alert-danger">{{$message}}</p>
                                    @enderror
                                    <div class="form-group">
                                        <label for="inputPassword6">Confirm Password</label>
                                        <input type="password" class="form-control" id="inputPassword6" name="confirm_password"/>
                                    </div>
                                    @error('confirm_password')
                                        <p class="alert-danger">{{$message}}</p>
                                    @enderror
                                        <button type="submit" class="btn btn-primary">Zmień hasło</button>
                                </form>
                            </div>

                            <div class="col-md-6">
                                <p class="mb-2">Password requirements</p>
                                <p class="small text-muted mb-2">To create a new password, you have to meet all of the following requirements:</p>
                                <ul class="small text-muted pl-4 mb-0">
                                    <li>Minimum 8 character</li>
                                    <li>At least one special character</li>
                                    <li>At least one number</li>
                                    <li>Can’t be the same as a previous password</li>
                                </ul>
                            </div>
                        </div>
                </div>
            </div>
        </div>

    </div>
    <style>
        body{
            color: #8e9194;
            background-color: #f4f6f9;
        }
        .avatar-xl img {
            width: 110px;
        }
        .rounded-circle {
            border-radius: 50% !important;
        }
        img {
            vertical-align: middle;
            border-style: none;
        }
        .text-muted {
            color: #aeb0b4 !important;
        }
        .text-muted {
            font-weight: 300;
        }
        .form-control {
            display: block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1.5;
            color: #4d5154;
            background-color: #ffffff;
            background-clip: padding-box;
            border: 1px solid #eef0f3;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
    </style>
@endsection
