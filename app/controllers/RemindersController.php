<?php

use Care\Forms\ReminderForm;

class RemindersController extends Controller
{
    protected $reminderForm;

    function __construct(ReminderForm $reminderForm)
    {
        $this->reminderForm = $reminderForm;
    }

    /**
     * Display the password reminder view.
     * @return Response
     */
    public function getRemind()
    {
        return View::make('pages.remind');
    }

    /**
     * Handle a POST request to remind a user of their password.
     * @return Response
     */
    public function postRemind()
    {
        $this->reminderForm->validate(Input::only('email'));

        switch ($response = Password::remind(Input::only('email'))) {
            case Password::INVALID_USER:
                return Redirect::back()->with('error', Lang::get($response));

            case Password::REMINDER_SENT:
                return Redirect::back()->with('status', Lang::get($response));
        }
    }

    /**
     * Display the password reset view for the given token.
     * @param  string $token
     * @return Response
     */
    public function getReset($token = null)
    {
        if (is_null($token)) App::abort(404);

        return View::make('pages.reset')->with('token', $token);
    }

    /**
     * Handle a POST request to reset a user's password.
     * @return Response
     */
    public function postReset()
    {
        $credentials = Input::only(
            'email', 'password', 'password_confirmation', 'token'
        );

        $response = Password::reset($credentials, function ($user, $password) {
            $user->password = Hash::make($password);

            $user->save();
        });

        switch ($response) {
            case Password::INVALID_PASSWORD:
            case Password::INVALID_TOKEN:
            case Password::INVALID_USER:
                return Redirect::back()->with('error', Lang::get($response));

            case Password::PASSWORD_RESET:
                return Redirect::to('/');
        }
    }

}
