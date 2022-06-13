<?php include __DIR__.'/../header.html';?>
<div class="card-body p-3">
    <h2 class="card-title display-5 fw-bold mb-4"><?= $article->getName()?></h2>
    <p class="card-text lh-lg"><?= $article->getText()?></p>
    <a class="btn btn-info" href="/student/321/OOP/www/article/<?= $article->getId()?>/comments">Комментарии</a>
</div>
<form class="card-footer p-3 m-3 bg-info bg-opacity-10 border border-info border-start-0 border-end-0 rounded"
    action="/student/321/OOP/www/article/<?= $article->getId()?>/comments/add" method="POST">
    <label class="form-label" for="comment">Your text for new comment</label>
    <textarea class="form-control mt-2" name="comment" id="comment" cols="30" rows="10"></textarea>
    <button class="btn btn-primary mt-4" type="submit">Send</button>
</form>
<?php include __DIR__.'/../footer.html';?>