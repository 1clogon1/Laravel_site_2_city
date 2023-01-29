<!--Наследование-->
@extends('view')



@section('title')
    Авторизация
@endsection

<style>
    .marginn{
        margin-top: 25px;
    }
</style>

@section('main_content')

    <div class="row justify-content-center">
        <h2 class="text-uppercase text-center mb-5">Профиль</h2>
    </div>

    <div class="row row-cols-1 row-cols-md-2 g-4">

        <div class="col">
            <div class="card ">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <h2 class="text-uppercase text-center mb-5">Данные</h2>
                    </div>
                    <div class="row row-cols-md-2 g-5">
                        <div class="col">

                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example1cg">ФИО</label><br>
                                @isset($user_fio)<label class="form-label" for="form3Example1cg"><h4>{{$user_fio}}</h4></label>@endisset
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example1cg">Логин</label><br>
                                @isset($user_login)<label class="form-label" for="form3Example1cg"><h4>{{$user_login}}</h4></label>@endisset
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example1cg">Почта</label><br>
                                @isset($user_email)<label class="form-label" for="form3Example1cg"><h4>{{$user_email}}</h4></label>@endisset
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example1cg">Количество ваших заявок</label><br>
                                <label class="form-label" for="form3Example1cg"><h4>100</h4></label>
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example1cg">Решено заявок</label><br>
                                <label class="form-label" for="form3Example1cg"><h4>46</h4></label>
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example1cg">Отклонено</label><br>
                                <label class="form-label" for="form3Example1cg"><h5>54</h5></label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card marginn">
            <div class="card-body">
                <div class="row justify-content-center">
                    <h2 class="text-uppercase text-center mb-5">Создание категории</h2>
                </div>
                <form action="{{route('create_category')}}" method="post">
                    @csrf
                    <div class="form-outline mb-1">
                        <label class="form-label" for="form3Example1cg">Название категории</label>
                        <input type="text" name="name" id="name" class="form-control form-control-lg" required
                               placeholder="Введите категории"/><br>
                        @error('name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-dark">Создать</button>
                    </div>

                </form>
            </div>
        </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <h2 class="text-uppercase text-center mb-5">Создание заявки</h2>
                    </div>
                    <div id='success_message'></div>

                    <ul id='saveform_errList'>

                    </ul>
                    <form action="{{route('create_orders')}}" method="post">
                        @csrf
                        <div class="form-outline mb-1">
                            <label class="form-label" for="form3Example1cg">Название</label>
                            <input type="text" name="name" id="name" class="name form-control form-control-lg" required
                                   placeholder="Введите название"/><br>
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-outline mb-1">
                            <label class="form-label" for="form3Example4cg">Описание</label>
                            <textarea type="text" name="description" id="description"
                                      class="description form-control form-control-lg" required
                                      placeholder="Опишите проблему"></textarea><br>
                            @error('description')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-1">
                            <label class="form-label" for="form3Example1cg">category_id</label>
                            <input type="text" name="category_id" id="category_id" class="category_id form-control form-control-lg"
                                   placeholder="Введите название" required/><br>
                            @error('category_id')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-3">
                            <label class="form-label" for="form3Example4cg">Категория</label>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    Выберите категорию проблемы
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Категория 1</a></li>
                                    <li><a class="dropdown-item" href="#">Категория 2</a></li>
                                    <li><a class="dropdown-item" href="#">Категория 3</a></li>
                                </ul>
                            </div><br>
                            @error('category_id')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-outline mb-10">
                            <label class="form-label" for="form3Example1cg">Фотографи проблемы(до 10 мб)</label>
                            <input type="file" name="image" id="image" class="image form-control form-control-lg" required/><br>
                            @error('image')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="add_application btn btn-outline-dark">Создать</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th scope="col">Номер</th>
            <th scope="col">Название</th>
            <th scope="col">Описание</th>
            <th scope="col">Функции</th>
        </tr>
        </thead>
        <tbody>
        @php $i=1; @endphp

            <tr>
                <td>{{$i++}}</td>
                <td>name</td>
                <td>description</td>
                <td>
                        <a class="delete_application me-3 py-2 text-dark text-decoration-none"
                           href="">&#128465;</a>

                        <a class="edit_application me-3 py-2 text-dark text-decoration-none"
                           href="">&#9997;</a>
                </td>
            </tr>

        </tbody>
    </table>
@endsection


@section('script')
    <script>
        $(document).ready(function (){
            fetchapplicaton();//Вызываем функцияю вывода при кажом использование данного скрипта
            function fetchapplicaton(){
                $.ajax({
                    type: "GET",
                    url: "/application",
                    data: data,
                    dataType: "json",
                    success: function (response){
                        console.log(response.application);

                    }
                });
            }

            $(document).on('click','.add_application',function (e){
                e.preventDefault();
                //Передача данных
                var data ={
                    'name':$('.name').val(),
                    'description':$('.description').val(),
                    'category_id':$('.category_id').val(),
                    //'image':$('.image').val(),
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
                    url: "/profile/application",
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
                            //window.location = "/profile"
                             $('#success_message').html("");
                             $('#success_message').addClass('alert alert-success');
                             $('#success_message').text(response.message)
                             $('#success_message').modal('hide');
                             $('#success_message').find('input').val("");


                        }
                    }
                });
            });
        });
    </script>
@endsection




