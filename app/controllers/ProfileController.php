<?php

use Care\Forms\UpdateProfileForm;
use Care\Repositories\UsersRepositoryInterface;

class ProfileController extends BaseController
{
    protected $users;
    protected $form;

    function __construct(UsersRepositoryInterface $users, UpdateProfileForm $form)
    {
        $this->users = $users;
        $this->form  = $form;
    }

    public function getIndex()
    {
        return View::make('profile.change');
    }

    public function postIndex()
    {
        $data = Input::only(['email', 'password', 'password_confirmation']);

        $this->form->rules['email'] = 'required|email|unique:users,email,' . Auth::user()->id;
        $this->form->validate($data);
        $this->users->updateUser(Auth::user()->id, $data);

        return Redirect::back()->withMessage('Your info has been updated successfully');
    }
}