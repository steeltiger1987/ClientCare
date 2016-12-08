<?php
namespace Care\Forms;

use Laracasts\Validation\FormValidator;

class NewClientForm extends FormValidator
{
    protected $rules = [
        'name'     => 'required|alpha_spaces',
        'email'    => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed'
    ];
} 