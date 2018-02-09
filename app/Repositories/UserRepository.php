<?php
namespace App\Repositories;

/**
 * User Repository
 * @created by @ridwanpandi
 */
interface UserRepository
{
    public function login($username, $password);
    public function register($request);
}
