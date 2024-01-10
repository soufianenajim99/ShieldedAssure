<?php

    interface ImArticleService {
     function displayArticle();
     function addArticle(Article $article);
     function updateArticle(Article $article, $id);
     function deleteArticle($articleId);
    }

?>