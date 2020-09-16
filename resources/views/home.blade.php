@extends('layouts.app')

@section('to-main')

    <li class="nav-link">
        <a href="{{route('main')}}">На главную</a>
    </li>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Личный кабинет
                </div>
                    <div class="container card-body">
                        <div class="form-group row">
                            <label class="col-sm-3" for="name">Пользователь</label>
                            <input disabled class="col-sm-9" name="name" type="text" class="form-control" id="password" placeholder="{{Auth::user()->name}}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="password">Email</label>
                            <input disabled class="col-sm-9" name="password" type="password" class="form-control" id="password" placeholder="{{Auth::user()->email}}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="">Аватар</label>
                            <img class="col-sm-4" src="{{asset('images/avatar.jpg')}}" class="img-fluid" alt="Аватар">
                        </div>
                        <div class="form-group row float-right">
                            <div class="col-sm-12">
                                <form action="{{route('editUser')}}" method="POST">
                                    @csrf

                                    <div class="form-group row">
                                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id" />
                                        <button type="submit" class="btn btn-primary float-right">Изменить</button>
                                    </div>
                                </form>
                                {{--                            <input type="file" class="form-control-file" id="exampleFormControlFile1">--}}
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
