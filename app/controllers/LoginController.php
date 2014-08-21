<?php

class LoginController extends Controller {

    public function login() {
        return View::make('login.login', ['user' => new User()]);
    }

    public function attemp() {
        if (Auth::attempt([
                    'email' => Input::get('email'),
                    'password' => Input::get('password')
                        ], (bool) Input::get('lembrar'))) {

            return Redirect::action('InicioAdministracaoController@listar');
        }
        Input::flash();
        Session::flash('erro', 'Não foi possível logar');
        return Redirect::action('LoginController@login');
    }

    public function logout() {
        Auth::logout();
        return Redirect::action('LoginController@login');
    }

}
