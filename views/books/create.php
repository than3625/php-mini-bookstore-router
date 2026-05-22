<?php 
$title = $title ?? 'Add Book';
$error = $error ?? null;
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
            <h1>Add New Book</h1>
            <p>This form submits to <code>POST /books/create</code>.</p>

            <?php if ($error): ?>
                <div class="alert danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form class="form-card" action="/books" method="POST">
                <div class="form-group">
                    <label>ISBN</label>
                    <input type="text" name="isbn" required>
                </div>

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" required>
                </div>

                <div class="form-group">
                    <label>Author</label>  
                    <input type="text" name="author" required>
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <input type="text" name="category" required>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" required>
                </div>

                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" required>
                </div>

                <button type="submit">Add Book</button>
                <a class="button secondary" href="/books">Back to Books</a>
            </form>
        </main>
    </body>
</html>