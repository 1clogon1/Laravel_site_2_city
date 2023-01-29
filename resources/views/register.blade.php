<!--Наследование-->
@extends('view')



@section('title')
    Регистрация
@endsection


@section('main_content')

                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-7">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Регистрация</h2>

                                <div class="form-group">

                                    <ul id='saveform_errList'>

                                    </ul>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1cg">ФИО</label>
                                        <input type="text" name="fio" id="fio" class="fio form-control form-control-lg" required placeholder="Введите ФИО"/><br>
                                        @error('fio')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror

                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1cg">Логин</label>
                                        <input type="text" name="login" id="login" class="login form-control form-control-lg" required placeholder="Введите логин"/><br>
                                        @error('login')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror

                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3cg">Email</label>
                                        <input type="email" name="email" id="email" class="email form-control form-control-lg" required placeholder="Введите Email"/><br>
                                        @error('email')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Пароль</label>
                                        <input type="password" name="password" id="password" class="password form-control form-control-lg" required placeholder="Введите пароль"/><br>
                                        @error('password')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Повторите пароль</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="password_confirmation form-control form-control-lg" required placeholder="Повторите пароль"/><br>
                                        @error('password_confirmation')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input type="checkbox" class="checkbox" id="checkbox" required>
                                        <label class="checkbox form-check-label" for="exampleCheck1">Даю согласие на обработку своих данных</label><br>
                                        @error('checkbox')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-outline-dark add_user">Зарегистрироваться</button>

                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">У вас уже есть аккаунт?<a  href="{{route('login')}}"
                                                                                                            class="fw-bold text-body"><u>Авторизоваться</u></a></p>

                                </div>

                            </div>


                        </div>
                    </div>
                </div>




@endsection

@section('script')
    <script>
        $(document).ready(function (){
            $(document).on('click','.add_user',function (e){
                e.preventDefault();
                //Передача данных
                var data ={
                    'fio':$('.fio').val(),
                    'login':$('.login').val(),
                    'email':$('.email').val(),
                    'password':$('.password').val(),
                }
                //console.log(data);
                //Проверка токена
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //Передача запроса
                $.ajax({
                    type: "POST",
                    url: "/register",
                    data: data,
                    dataType: "json",
                    success: function (response){
                        //console.log(response);
                        if(response.status == 400){
                            $('#saveform_errList').html("");
                            $('#saveform_errList').addClass('alert alert-danger');
                            $.each(response.errors, function (key, err_value) {
                                $('#saveform_errList').append('<li>' + err_value + '</li>');
                            });
                        }
                        else{
                            window.location = "/profile"
                           /* $('#success_message').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message)
                            $('#success_message').modal('hide');
                            $('#success_message').find('input').val("");*/


                        }
                    }
                });
            });
        });
    </script>
@endsection
