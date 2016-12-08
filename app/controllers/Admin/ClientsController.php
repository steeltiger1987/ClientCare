<?php
namespace Admin;

use BaseController;
use Care\Forms\NewClientForm;
use Care\Forms\UpdateClientForm;
use Care\Repositories\UsersRepositoryInterface;
use View;
use Input;
use Event;
use Redirect;

class ClientsController extends BaseController
{
    protected $usersRepository;
    protected $clientForm;
    protected $updateClientForm;

    function __construct(UsersRepositoryInterface $usersRepository,
                         NewClientForm $clientForm,
                         UpdateClientForm $updateClientForm)
    {
        $this->usersRepository  = $usersRepository;
        $this->clientForm       = $clientForm;
        $this->updateClientForm = $updateClientForm;
    }

    /**
     * Display clients page
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        $clients = $this->usersRepository->getAllPaginated();

        return View::make('users.index', compact('clients'));
    }

    /**
     * Register the new client
     * @return mixed
     */
    public function postIndex()
    {
        // store client
        $data = Input::only(['name', 'email', 'password', 'password_confirmation']);
        $this->clientForm->validate($data);
        $client = $this->usersRepository->getNew($data);
        $this->usersRepository->save($client);

        // send welcome email
        Event::fire('user.registered', $client);

        return Redirect::back()->withMessage('Client has been added successfully');
    }

    /**
     * Display client profile
     * @param $id
     * @return \Illuminate\View\View
     */
    public function getClient($id)
    {
        $client = $this->usersRepository->getById($id);

        return View::make('users.profile', compact('client'));
    }

    public function postClient($id)
    {
        $this->updateClientForm->rules['email'] = 'required|email|unique:users,email,' . $id;
        $this->updateClientForm->validate(Input::all());
        $this->usersRepository->updateUser($id, Input::all());

        return Redirect::back()->withMessage('Updated successfully');
    }

} 