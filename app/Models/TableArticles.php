<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableArticles extends Model
{
    protected $table = 'table_articles';

    protected $fillable = [
        'article_title', 'description', 'photo_article', 'article_status'
    ];

}
