@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">@lang('lang.button_return')</a>
                <div class="mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">@lang('lang.text_create_message') </h1>
                    <p>@lang('lang.text_fill')</p>

                    <hr>

                    <form method="POST">
                        @csrf
                        <div class="row">   
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#english" type="button" role="tab" aria-controls="home" aria-selected="true">English</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#french" type="button" role="tab" aria-controls="profile" aria-selected="false">French</button>
                                </li>

                            </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="control-group col-12">    
                                            <label for="title">@lang('lang.title_en')</label>
                                            <input type="text" id="title" class="form-control" name="title_en"
                                                placeholder="@lang('lang.placeholder_title_en')" required>
                                                
                                        </div>
                                        <div class="control-group col-12 mt-2">
                                            <label for="body">@lang('lang.body_eng')</label>
                                            <textarea id="body" class="form-control" name="body_en" placeholder="@lang('lang.placeholder_body_en')"
                                                    rows="" required></textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="french" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="control-group col-12">
                                            <label for="title_fr">@lang('lang.title_fr')</label>
                                            <input type="text" id="title_fr" class="form-control" name="title_fr"
                                                placeholder="@lang('lang.placeholder_title_fr')" required>
                                        </div>
                                        
                                        <div class="control-group col-12 mt-2">
                                            <label for="body_fr">@lang('lang.body_eng')</label>
                                            <textarea id="body_fr" class="form-control" name="body_fr" placeholder="@lang('lang.placeholder_body_fr')" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            
                            
                            <div class="control-group col-12 mt-2">
                                <label for="categorie">@lang('lang.category')</label>
                                <select id="categorie" class="form-control" name="categories_id" required>
                                    @foreach($categories as $categorie)
                                        <option value="{{$categorie->id}}">{{$categorie->categorie}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                @lang('lang.button_create_post')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



@endsection