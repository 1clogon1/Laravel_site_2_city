<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    public function create2()
    {
        //dd(session()->all());//Просмотр всех данных
        //dd(old());//Просмотр страх введенных данных
        return view('login');
    }
    public function store2(Request $request)
    {
        //Проверка данных
        $credentials= $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);

        //При неудачном входе возвращает нас назад
        if(!Auth::attempt($credentials, $request->boolean('remember'))){//$request->boollean('remember') - второй аргумент для проверки люди нажили остаться в системе или нет, если нажмем то в базе появится токен, а на сайте новы куки храняший данный токен
            throw  ValidationException::withMessages([//Вариант валидации вместо нижних 4 строк, если пользователь не был найден то перенаправить его на страницу входа и выведет сообщение, то есть не в ручную все прописывать, а использовать встроенное
                //'email'=>'Введенные данные для входа не соответствуют ни одной записи в базе'
                'login'=>trans('auth.failed')//Считываем фразу ошибки из системы(так как там они хранятся заранее, но можно и сои слова добавить)
            ]);
        }
        $request->session()->regenerate();//Обновляет сессию пользователя при ацетификации(то есть обновляет токен)

        if ($request->email =='admin'){
            return redirect()->route('admin');
        }
        else{
            return view('welcome');
        }
    }

    public function destroy2(Request $request){
        Auth::logout();//Удаляем сессию с данным пользователем
        //После выхода делаем следующее
        $request->session()->invalidate();//Генерируем новый индикатор для сессии пользователя
        $request->session()->regenerateToken();//И в целях безопасности генерируем новое значение для @csrf токена, чтобы не повторялся и злоумышленник по одной и то йже сессии не выкидывал бы пользователей, @csrf токен - это токен который проверяет с того ли аккаунта(сессии) отправили запрос на выход из аккаунта

        return redirect()->route('welcome');//После выхода из аккаунта перенаправляем пользователя на страницу welcome
    }
}
