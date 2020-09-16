@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Добавление новости</div>

                    <div class="card-body">

{{--                        @if ($errors->any())--}}
{{--                            <div class="alert alert-danger">--}}
{{--                                <ul>--}}
{{--                                    @foreach($errors as $error)--}}
{{--                                        <li>{{$error}}</li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        @endif--}}
                        <form action="{{route('create-form')}}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-lg-3 col-form-label">Заголовок</label>
                                <div class="col-sm-9 col-lg-9">
                                    <textarea required name="title" class="form-control" placeholder="Заголовок новости"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="preview" class="col-sm-3 col-lg-3 col-form-label">Анонс новости</label>
                                <div class="col-sm-9 col-lg-9">
                                    <textarea  required name="preview" class="form-control" placeholder="Краткое содержание новости"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-sm-3 col-lg-3 col-form-label">Описание</label>
                                <div class="col-sm-9 col-lg-9">
                                    <textarea id="editor-body" required name="description" class="form-control" placeholder="Описание новости"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tag" class="col-sm-3 col-lg-3 col-form-label">Тема</label>
                                <div class="col-sm-9 col-lg-9">
                                    <select required name="tag" class="custom-select">
{{--                                        <option selected>Выберите тему</option>--}}
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="right">
                                <button type="submit" class="btn btn-success col-lg-3 float-right" name="button">Добавить новость</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
