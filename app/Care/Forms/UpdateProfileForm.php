<?php
namespace Care\Forms;

use Laracasts\Validation\FormValidator;

class UpdateProfileForm extends FormValidator
{
    /**
     * Validation rules for reminder form
     * @var array
     */
    public  $rules = [
        'password' => 'min:6|confirmed',
        'email'    => '',
    ];
}