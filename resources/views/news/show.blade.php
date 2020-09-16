@extends('layouts.app')

@section('to-main')

    <li class="nav-link">
        <a href="{{route('main')}}">На главную</a>
    </li>
@endsection

@section('change-news')
{{--    Меню--}}

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-primary" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Управление новостью</a>
        <div class="dropdown-menu">
            <form action="{{route('edit')}}" method="POST">
                @csrf

                <div class="form-group row">
                    <input type="hidden" value="{{$news->id}}" name="news_id" />
                    <input type="hidden" value="{{$news->title}}" name="title" />
                    <input type="hidden" value="{{$news->preview}}" name="preview" />
                    <input type="hidden" value="{{$tag->id}}" name="tag" />
                    <input type="hidden" value="{{$news->description}}" name="description" />
{{--                    <div class="col-sm-9 col-lg-10 offset-sm-3 offset-lg-2">--}}
                        <button type="submit" class="btn btn-link ml-4">Изменить новость</button>
{{--                    </div>--}}
                </div>
            </form>

            {{-- Удаление новости--}}
            <form action="{{route('deleteNews')}}" method="POST">
                @csrf

                <div class="form-group row">
                    <input type="hidden" value="{{$news->id}}" name="news_id" />
                    <input type="hidden" value="{{$news->title}}" name="title" />
                    <input type="hidden" value="{{$news->preview}}" name="preview" />
                    <input type="hidden" value="{{$tag->id}}" name="tag" />
                    <input type="hidden" value="{{$news->description}}" name="description" />
{{--                    <div class="col-sm-9 col-lg-10 offset-sm-3 offset-lg-2">--}}
{{--                    @if($comment->user_id = Auth::user()->id)--}}
                        <button type="submit" class="btn btn-link ml-4">Удалить новость</button>
{{--                    </div>--}}
{{--                    @endif--}}
                </div>
            </form>

            {{--a class="dropdown-item" href="#!">Action</a>
            <a class="dropdown-item" href="#!">Another action</a>--}}
        </div>
    </li>
@endsection

@section('content')
<div class="container">

{{--    Блок новости--}}
    <strong class="d-inline-block mb-2 text-primary">{{$tag ->name}}</strong>
	<h1>{{ $news->title }}</h1>
	<h6>{{$news->created_at->format('d.m.Y')}}</h6>
	 {!! $news->description !!}

{{--    Блок комментариев--}}
    <div class="alert alert-primary" role="alert">
        <strong>Комментарии ({{count($comments)}})</strong>
    </div>

{{--    Форсма Оставить комментарий если пользователь авторизован--}}

    @if (Auth::check())

        @include('inc.messages')

        <form action="{{route('create-comment')}}" method="POST">
            @csrf

            <div class="form-group row">
                <input type="hidden" value="{{Auth::user()->id}}" name="user_id" />
                <input type="hidden" value="{{$news->id}}" name="news_id" />
                <label for="comment" class="col-sm-3 col-lg-2 col-form-label">Заголовок</label>
                <div class="col-sm-9 col-lg-10">
                    <textarea required name="text" class="form-control" placeholder="Я считаю..."></textarea>
                </div>
            </div>


            <div class="form-group row">
                <div class="col-sm-9 col-lg-10 offset-sm-3 offset-lg-2">
                    <button type="submit" class="btn btn-success">Добавить комментарий</button>
                </div>
            </div>
        </form>


    @endif

{{--    Вывести все комментарии--}}
    @foreach($comments as $comment)

        <div class="media shadow-lg p-3 mb-5 bg-white">
            <img class="d-flex align-self-start mr-3 rounded-circle" src="http://bootdey.com/img/Content/user_1.jpg" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0">{{$comment->user()->find($comment->user_id) -> name}}</h5>
                <h6 class="text-muted ">{{$comment->created_at}}</h6>
                <p>{{$comment->text}}</p>
            </div>

            {{-- Отображать кнопку только владельцу комментария, либо администратору--}}
            @if(Auth::check() && ($comment->user_id == Auth::user()->id || Auth::user()->admin == 1))
                {{-- Удалить комментарий--}}
                <form action="{{route('deleteComment')}}" method="POST">
                    @csrf

                    <div class="form-group row">
                        <input type="hidden" value="{{$comment->id}}" name="comment_id" />
                            <button type="submit" class="btn btn-danger">Удалить</button>

                    </div>
                </form>
            @endif
        </div>

    @endforeach

</div>
@endsection
