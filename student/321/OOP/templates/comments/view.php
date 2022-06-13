<?php include __DIR__.'/../header.html';?>

<h2 class="title p-3 m-0 pb-0">Комментарии</h2>
<ul class='list-group p-3 border-0'>
    <?php
        foreach($comments as $comment){
            echo "<li class='list-group-item d-flex align-items-center'>" .'<svg class="icon me-4" xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16"> <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/></svg>' . "<p class='m-0' style='width: 80%'>". $comment->getText() . "</p>". "<a href='/student/321/OOP/www/comments/" . $comment->getId() . "/edit'>Изменить</a></li>";
        }
    ?>
</ul>
<?php include __DIR__.'/../footer.html';?> 
