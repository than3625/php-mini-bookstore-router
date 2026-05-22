<?php 
$title = $title ?? 'Books';
$books = $books ?? [];
$created = $created ?? false;

function stockStatus(int $quantity): string
{
    if ($quantity <=0) {
        return 'Out of stock';   
    }

    if ($quantity <= 5) {
        return 'Low stock';
    }

    return 'Available';
}

function stockClass(int $quantity): string
{
    if ($quantity <=0) {
        return 'danger';
    }

    if ($quantity <=5) {
        return 'warning';
    }

    return 'success';
}
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
            <strong><?= htmlspecialchars($title) ?></strong>
            <nav>
                <a href="/">Home</a>
                <a href="/books">Books</a>
                <a href="/books/create">Add Book</a>
                <a href="/health">Health</a>
                <a href="/login">Login</a>
            </nav>
        </header>

        <main class="container">
            <?php if ($created): ?>
                <div class="alert success">Book created successfully!</div>
            <?php endif; ?>

            <table>
                <thead>
                    <tr>
                        <th>ISBN</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $book): ?>
                        <tr class="<?= stockClass($book['quantity']) ?>">
                            <td><?= htmlspecialchars($book['isbn']) ?></td>
                            <td><?= htmlspecialchars($book['title']) ?></td>
                            <td><?= htmlspecialchars($book['author']) ?></td>
                            <td><?= number_format($book['price']) ?> VND</td>
                            <td><?= htmlspecialchars($book['quantity']) ?></td>
                            <td>
                                <span class="badge <?=  stockClass((int) $book['quantity']) ?>">
                                    <?= stockStatus($book['quantity']) ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>
    </body>