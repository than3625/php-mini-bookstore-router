<?php 

declare(strict_types=1);

namespace App\Controllers;

use App\Support\Response;

class BookController 
{
    public function index(): void 
    {
        $books = $this->getBooks();

        Response::view('books/index', [
            'title' => 'Book List',
            'books' => $books,
            'created' => ($_GET['created'] ?? '') === '1'
        ]);
    }

    public function create(): void 
    {
        Response::view('books/create', [
            'title' => 'Add New Book',
            'error' => null
        ]);
    }

    public function store(): void 
    {
        $isbn = trim($_POST['isbn'] ?? '');
        $title = trim($_POST['title'] ?? '');
        $category = trim($_POST['category'] ?? '');
        $price = (int) trim($_POST['price'] ?? 0);
        $quantity = (int) trim($_POST['quantity'] ?? 0);

        if (!$isbn || !$title || !$category || !$price || !$quantity) {
            Response::view('books/create', [
                'title' => 'Add New Book',
                'error' => 'Please enter ISBN, book title, category, price, and quantity.'
            ], 422);
        }
        Response::redirect('/books?created=1');
    }

    private function getBooks(): array 
    {
        return require __DIR__ . '/../Data/books.php';
    }
}