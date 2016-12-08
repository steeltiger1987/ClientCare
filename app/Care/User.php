<?php namespace Care;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Eloquent;
use Hash;
use Laracasts\Presenter\PresentableTrait;

class User extends Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait, PresentableTrait;

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    /**
     * Fillable fields for mass assignment exception
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'phone', 'active'];

    /**
     * User decorator
     * @var string
     */
    protected $presenter = 'Care\Presenters\UserPresenter';

    /**
     * Password field is always encrypted
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * Check if the user is Admin
     * @return bool
     */
    public function isAdmin()
    {
        return ($this->user_type == 1);
    }

    /**
     * Check if the user is Client
     * @return bool
     */
    public function isClient()
    {
        return ($this->user_type == 2);
    }

    /**
     * Filter users of type client
     * @param $query
     * @return mixed
     */
    public function scopeClients($query)
    {
        return $query->where('user_type', '=', '2');
    }

    /**
     * A User has many tickets
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany('Care\Ticket', 'client');
    }
}
