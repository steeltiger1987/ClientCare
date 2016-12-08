<?php

class ThemesController extends BaseController
{
    /**
     * Set user preference theme
     * @param $theme
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getTheme($theme)
    {
        switch ($theme) {
            case 'sky':
                Cache::forever('theme', 'skin-blue');
                break;
            case 'dark':
                Cache::forever('theme', 'skin-black');
                break;
            default:
                Cache::forever('theme', 'skin-blue');
        }

        return Redirect::to(link_to_dashboard());
    }
} 