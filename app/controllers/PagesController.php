<?php

use Care\Forms\RegisterForm;
use Care\Repositories\UsersRepositoryInterface;

class PagesController extends BaseController
{
    protected $registerForm;
    protected $users;

    function __construct(RegisterForm $registerForm, UsersRepositoryInterface $users)
    {
        $this->registerForm = $registerForm;
        $this->users        = $users;
    }

    /**
     * Display login page
     * @return \Illuminate\View\View
     */
    public function getLogin()
    {
        return View::make('pages.login');
    }

    /**
     * Do user login
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postLogin()
    {
        $remember    = Input::has('remember') ? true : false;
        $credintials = Input::only(['email', 'password']);

        if (Auth::attempt($credintials, $remember)) {
            if (Auth::user()->isAdmin()) {
                return Redirect::to('admin/');
            }
            return Redirect::to('client/');
        } else {
            return Redirect::back()->withErrors('Wrong email or password!');
        }
    }

    /**
     * Display register page
     * @return \Illuminate\View\View
     */
    public function getRegister()
    {
        return View::make('pages.register');
    }

    /**
     * Do user registration
     * @return mixed
     */
    public function postRegister()
    {
        $this->registerForm->validate(Input::all());
        $user = $this->users->getNew(Input::all());
        $this->users->save($user);
        Event::fire('user.registered', $user);

        return Redirect::to('login')->withMessage('You have been registered successfully');
    }

    public function getLogout()
    {
        Auth::logout();

        return Redirect::to('/login');
    }
} 