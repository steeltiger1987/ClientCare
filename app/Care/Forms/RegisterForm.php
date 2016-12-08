<?php
namespace Care\Forms;

use Laracasts\Validation\FormValidator;

class RegisterForm extends FormValidator
{
    /**
     * Validation rules for registration form
     * @var array
     */
    protected $rules = [
        'name'     => 'required|alpha_spaces',
        'password' => 'required|min:6|confirmed',
        'email'    => 'required|email|unique:users',
    ];
} 