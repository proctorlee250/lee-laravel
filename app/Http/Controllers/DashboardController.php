<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\UserRepositoryInterface;

class DashboardController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) 
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display the view.
     */
    public function index()
    {
        $users = $this->userRepository->getAllUsers();
        return view('dashboard')->with('users', $users);
    }
}
