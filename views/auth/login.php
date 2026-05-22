<?php 
$title = $title ?? 'Login';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?= htmlspecialchars($title) ?></title>
        <link rel="stylesheet" href="/assets/style.css">
    </head>
    <body>
        <header class="topbar">
            <strong>PHP Mini Bookstore Router</strong>
            <nav>
                <a href="/">Home</a>
                <a href="/books">Books</a>
                <a href="/books/create">Add Book</a>
                <a href="/health">Health</a>
                <a href="/login">Login</a>
            </nav>
        </header>

        <main class="container">
            <h1>Login Demo</h1>
            <p>This page demonstrates controller organization and redirect response.</p>

            <form class="form-card" method="POST" action="/login">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <button class="button" type="submit">Login</button>
            </form>
        </main>
    </body>