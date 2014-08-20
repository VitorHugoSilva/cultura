<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    protected $fillable = ['email', 'password'];
    protected $table = 'users';
    public static $rules = [
        'email' => 'required|max:40|unique:users|email'
    ];
    public static $meta = [
        'email' => 'text|Email|Preencha o email',
    ];

    public function beforeValidate() {
//        $this->attributes['password'] = Hash::make('senhaPadraoTeste');
        if (User::whereEmail($this->email)->notThis()->count()) {
            $this->errors()->add('email', 'Este email já está cadastrado!');
        }
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    public function setPasswordAttribute($pass) {
        $this->attributes['password'] = Hash::make($pass);
    }

}
