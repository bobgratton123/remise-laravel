@extends('layouts.app')
@section('content')
    <main class="signup-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 pt-4">
                    <div class="card">
                        <h3 class="card-header text-center">@lang('lang.text_register_user')</h3>
                        <div class="card-body">
                            <form action="{{ route('custom.registration')}}" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="@lang('lang.text_name')" class="form-control" name="name" value="{{old('name')}}" required>
                                    @if($errors->has('name'))
                                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                        {{ $errors->first('name') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="email" placeholder="@lang('lang.text_email')" class="form-control" name="email" value="{{old('email')}}"  required>
                                    @if($errors->has('email'))
                                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                        {{ $errors->first('email') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="@lang('lang.text_password')" class="form-control" name="password" required>
                                    @if($errors->has('password'))
                                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                        {{ $errors->first('password') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="@lang('lang.text_adresse')" class="form-control" name="adresse" value="{{old('adresse')}}" required>
                                    @if($errors->has('adresse'))
                                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                        {{ $errors->first('adresse') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="@lang('lang.text_phone')" class="form-control" name="phone" value="{{old('phone')}}" required>
                                    @if($errors->has('phone'))
                                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                        {{ $errors->first('phone') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="date" placeholder="@lang('lang.text_date_de_naissance')" class="form-control" name="date_de_naissance" value="{{old('date_de_naissance')}}" required>
                                    @if($errors->has('phone'))
                                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                        {{ $errors->first('date_de_naissance') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                </div>
                                <div class="d-grid mx-auto">
                                    <button class="btn btn-dark btn-block">@lang('lang.text_sign_up')</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection