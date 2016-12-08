<?php
namespace Care\Forms;

use Laracasts\Validation\FormValidator;

class SubmitTicketForm extends FormValidator
{
    protected $rules = [
        'title'      => 'required',
        'content'    => 'required',
    ];
} 