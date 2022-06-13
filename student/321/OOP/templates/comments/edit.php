<?php include __DIR__.'/../header.html';?> 
<form action="/student/321/OOP/www/comments/<?= $comment->getId()?>/edit" method="POST">
        <label for="comment">Your text for comment</label>
        <textarea name="comment" id="comment" cols="30" rows="10"><?= $comment->getText()?></textarea>
        <button type="submit">Send</button>
</form>
<?php include __DIR__.'/../footer.html';?> 
