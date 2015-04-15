<?php

class UsersController extends BaseController
{

    public function getRegister() {
        return View::make('users/register');
    }

    public function postRegister() {
        $rules = User::$validation;

        $validation = Validator::make(Input::all(), $rules);

        if ($validation->fails()) {
            return Redirect::to('users/register')->withErrors($validation)->withInput();
        }

        $user = new User();
        $user->fill(Input::all());
        $id = $user->register();
        return $this->getMessage(Lang::get('user.registration_complete'));
    }

    public function getActivate($userId, $activationCode) {
        // Получаем указанного пользователя
        $user = User::find($userId);
        if (!$user) {
            return $this->getMessage(Lang::get('user.invalid_link_activate'));
        }

        // Пытаемся его активировать с указанным кодом
        if ($user->activate($activationCode)) {
            // В случае успеха авторизовываем его
            Auth::login($user);
            // И выводим сообщение об успехе
            return $this->getMessage(Lang::get('user.account_activated'), "/");
        }

        // В противном случае сообщаем об ошибке
        return $this->getMessage(Lang::get('user.invalid_link_activate_or_account_activated'));
    }

    public function getLogin() {
        return View::make('users/login');
    }

    public function postLogin() {
        // Формируем базовый набор данных для авторизации
        // (isActive => 1 нужно для того, чтобы аторизоваться могли только
        // активированные пользователи)
        $creds = array(
            'password' => Input::get('password'),
            'isActive'  => 1,
        );

        // В зависимости от того, что пользователь указал в поле username
        // дополняем авторизационные данные
        $username = Input::get('username');
        if (strpos($username, '@')) {
            $creds['email'] = $username;
        } else {
            $creds['username'] = $username;
        }

        // Пытаемся авторизовать пользователя
        if (Auth::attempt($creds, Input::has('remember'))) {
            Log::info("User [{$username}] successfully logged in.");
            return Redirect::intended();
        } else {
            Log::info("User [{$username}] failed to login.");
        }

        $alert = Lang::get('user.invalid_combination_or_account_not_activated');

        // Возвращаем пользователя назад на форму входа с временной сессионной
        // переменной alert (withAlert)
        return Redirect::back()->withAlert($alert);
    }

    public function getLogout() {
        Auth::logout();
        return Redirect::to('/');
    }

} 
