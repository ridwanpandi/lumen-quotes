<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
/**
 * Login Controller
 *
 * @created by http://github.com/ridwanpandi
 */
class LoginController extends Controller
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
    function __construct(UserRepository $user)
    {
        $this->userRepository = $user;
    }

    /**
    * Login Account Function
    * @param Request
    * @return JSON
    */
    public function login(Request $request)
    {
        $reqArray = $request->all();
        $username = $reqArray['username'];
        $password = $reqArray['password'];
        $response = [];

        // cek login
        $login = $this->userRepository->login($username, $password);

        if ($login == false) {
            // login failed
            $response = [
                "status" => false,
                "message" =>"email or password incorrect!"
            ];
        } else {
            // login success
            $response = [
                "status" => true,
                "api_token" => $login["api_token"],
                "message" => $login["message"],
            ];
        }

        return response()->json($response);
    }

}
