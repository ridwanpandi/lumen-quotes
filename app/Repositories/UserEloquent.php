<?php
namespace App\Repositories;

use App\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

/**
 * User Eloquent
 * @created by @ridwanpandi
 */
class UserEloquent implements UserRepository
{

    /**
    * Local variable $user
    *
    * @var App\User
    */
    private $user;

    /**
    * Constructor
    *
    * @param Model
    * @return void
    */
    function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
    * Constructor
    *
    * @param Request
    * @return boolean
    */
    public function register($request)
    {
        $hash = app()->make('hash'); // create a hasher
        $reqArray = $request->all();

        $reqArray['password'] = $hash->make($request->input('password')); // create password hash
        $reqArray['api_token'] = sha1(str_random(60)); // generate api_token
        $users = $this->user->create($reqArray);

        if ($users) {
            return true;
        }
        return false;
    }


    /**
    * Login
    *
    * @param username
    * @param password
    * @return boolean|array
    */
    public function login($username, $password)
    {
        $hash = app()->make('hash'); // create a hasher
        $user = $this->user->where('username', $username)->first();
        $result = false;

        // check user
        if ($user) {
            // next logic when username is exist
            if ($hash->check($password, $user->password)) {
                $apiToken = sha1(str_random(60)); // generate api_token
                $updateToken = $this->user->where("username", $username)->update(["api_token" => $apiToken]); // update token after logged in;
                $result["message"] = $user;
                $result["api_token"] = $apiToken;
            }
        }

        return $result;
    }

}
