<?php
    return [
        '~^hello/(.*)$~' => [MyProject\Controllers\MainController::class, 'sayHello'],
        '~^$~' => [MyProject\Controllers\MainController::class, 'main'],
        '~^comments/(\d+)/edit~' => [MyProject\Controllers\CommentController::class, 'edit'],
        '~^article/(\d+)/comments/add~' => [MyProject\Controllers\CommentController::class, 'add'],
        '~^article/(\d+)/comments~' => [MyProject\Controllers\CommentController::class, 'view'],
        '~^article/(\d+)/edit~' => [MyProject\Controllers\ArticleController::class, 'edit'],
        '~^article/add~' => [MyProject\Controllers\ArticleController::class, 'add'],
        '~^article/(\d+)/delete~' => [MyProject\Controllers\ArticleController::class, 'delete'],
        '~^article/(\d+)~' => [MyProject\Controllers\ArticleController::class, 'view']
    ]
?>