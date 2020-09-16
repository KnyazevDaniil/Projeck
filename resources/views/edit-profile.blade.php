@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Личный кабинет
                    </div>
                    <div class="container card-body">
                        <form action="{{route('saveProfile')}}" method="POST">
                        <div class="form-group row">
                                @csrf

{{--                                <div class="form-group row">--}}
                                    <input type="hidden" value="{{Auth::user()->id}}" name="user_id" />
{{--                                    <button type="submit" class="btn btn-primary float-right">Изменить</button>--}}
{{--                                </div>--}}
                            <label class="col-sm-3" for="name">Пользователь</label>
                            <input class="col-sm-9" name="name" type="text" class="form-control" id="password" value="{{$user->name}}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="Email">Email</label>
                            <input disabled class="col-sm-9" name="Email" type="password" class="form-control" id="password" placeholder="{{Auth::user()->email}}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="">Аватар</label>
                            <img class="col-sm-4" src="{{asset('images/avatar.jpg')}}" class="img-fluid" alt="Responsive image">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success float-right">Сохранить</button>
                                {{--                            <input type="file" class="form-control-file" id="exampleFormControlFile1">--}}
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
