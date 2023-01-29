<!--Наследование-->
@extends('view')



@section('title')
    Авторизация
@endsection



@section('main_content')

    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-7">
            <div class="card" style="border-radius: 15px;">
                <div class="card-body p-5">
                    <h2 class="text-uppercase text-center mb-5">Авторизоваться</h2>

                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example1cg">Логин</label>
                            <input type="text" name="login" id="login" class="form-control form-control-lg" required placeholder="Введите логин"/><br>
                            @error('fio')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example4cg">Пароль</label>
                            <input type="password" name="password" id="password" class="form-control form-control-lg" required placeholder="Введите пароль"/><br>
                            @error('password')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4">
                            <input type="checkbox" id="remember" name="remember" class="form-check-input">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div><br>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-outline-dark">Авторизоваться</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>




@endsection
