<?php

class BaseController extends Controller
{
    /**
     * Setup the layout used by the controller.
     * @return void
     */
    protected function setupLayout()
    {
        View::share('skin', Cache::get('theme'));
        View::share('user', Auth::user());

        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

}
