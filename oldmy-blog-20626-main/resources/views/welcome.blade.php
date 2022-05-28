@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h1 class="display-one mt-5">@lang('lang.home_title')</h1>
                <p>@lang('lang.home_sub_title')</p>
                <a href="{{ route('blog') }}" class="btn btn-outline-primary">@lang('lang.home_enter')</a>
            </div>
        </div>
    </div>
@endsection