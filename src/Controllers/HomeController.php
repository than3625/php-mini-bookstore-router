<?php 

declare(strict_types=1);

namespace App\Controllers;

use App\Support\Response;

class HomeController 
{
    public function index(): void 
    {
        Response::view('home', [
            'title' => 'Mini Bookstore Routing App',
            'message' => 'Welcome to the Mini Bookstore! Explore our collection of books and find your next great read.'
        ]);
    }

    public function goHome(): void 
    {
        Response::redirect('/');
    }
}