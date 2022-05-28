@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">@lang('lang.text_intro_forum') </h1>
                        <p>@lang('lang.text_enjoy_forum') </p>
                    </div>
                    <div class="col-4">
                        <p>@lang('lang.menu_create_msg')</p>
                        <a href="{{ route('blog.create') }}" class="btn btn-primary btn-sm">@lang('lang.button_create_msg')</a>
                    </div>
                </div>
                <ul>
                    @forelse($posts as $post)
                        <li><a href="{{ route('blog.show', $post->id) }}">{{ ucfirst($post->title_en)}}</a></li>
                    @empty
                        <li>Aucun article</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection