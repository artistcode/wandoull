<?php

namespace app\admin\model;

use think\Model;

class Article extends Model
{
    protected $pk = 'article_id';
    protected static function init()
    {
        Article::event('before_insert', function ($article) {
            $article->article_content  = str_replace('../../upload/','/upload/',$article->article_content);
        });
        Article::event('before_update', function ($article) {
            $article->article_content  = str_replace('../../upload/','/upload/',$article->article_content);
        });
    }

}
