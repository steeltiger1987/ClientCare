<?php
namespace Care\Forms;

use Laracasts\Validation\FactoryInterface as ValidatorFactory;
use Laracasts\Validation\FormValidator;

class UpdateClientForm extends FormValidator
{
    public  $rules = [
        'name'     => 'required|alpha_spaces',
        'password' => 'min:6',
        'email'    => '',
    ];
}