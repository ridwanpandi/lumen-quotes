<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;

/**
 * User Controller
 *
 * @created by http://github.com/ridwanpandi
 */
class UserController extends Controller
{

    /**
    * get the user Repository
    *
    * @param Request
    * @return JSON
    */
    private $userRepository;


    /**
    * Constructor
    *
    * @param UserRepository
    * @return void
    */
    public function __construct(UserRepository $user)
    {
        $this->userRepository = $user;
    }

    /**
    * Register Account Function
    * @param Request
    * @return JSON
    */
    public function register(Request $request)
    {
        // validation
        $this->validate($request, [
            "firstname"     => "required",
            "lastname"      => "required",
            "username"      => "required|unique:users",
            "email"         => "required|email|unique:users",
            "password"      => "required",
        ]);
        // end validation

        $users = $this->userRepository->register($request);
        $response = [];

        if ($users) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
        }

        return response()->json($response);
    }




}
