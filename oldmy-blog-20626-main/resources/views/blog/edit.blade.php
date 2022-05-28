@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">@lang('lang.button_return')</a>
                <div class="mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">Modifier l'article </h1>
                    <p>Modifier et soumettre ce formulaire pour mettre à jour un article </p>
                    <hr>
                    <form method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="title">Titre du message</label>
                                <input type="text" id="title" class="form-control" name="title"
                                       placeholder="Entrer le titre du message" value="{{ $post->title }}" required>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="body">Corps du message</label>
                                <textarea id="body" class="form-control" name="body" placeholder="Entrer le corps du message"
                                          rows="" required>{{ $post->body }}</textarea>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Mettre à jour l'article
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection