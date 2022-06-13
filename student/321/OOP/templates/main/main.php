<?php include __DIR__.'/../header.html';?>
<ul class="list-group">
    <?php foreach($articles as $article):?>
        <li class="list-group-item">
            <h2 class="card-title"><a href="/student/321/OOP/www/article/<?=$article->getId();?>"><?= $article->getName()?></a></h2>
            <p class="card-text text-truncate" style='height: 30px'><?= $article->getText()?></p>
    </li>
    <?php endforeach;?>
    </ul> 
<?php include __DIR__.'/../footer.html';?> 

       