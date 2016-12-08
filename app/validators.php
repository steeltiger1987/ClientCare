<?php

/**
 * Define validation pattern for alpha and spaces
 */
Validator::extend('alpha_spaces', function ($attribute, $value) {
    return preg_match('/^[\pL\s]+$/u', $value);
});