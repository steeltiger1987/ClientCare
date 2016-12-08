<?php
namespace Care\Forms;

use Laracasts\Validation\FormValidator;

class ReminderForm extends FormValidator
{
    /**
     * Validation rules for reminder form
     * @var array
     */
    protected $rules = [
        'email' => 'required|exists:users|email'
    ];
} 