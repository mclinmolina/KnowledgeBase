<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Veelasky\LaravelHashId\Eloquent\HashableId;
use App\Traits\ModelSlugTrait;
class Article extends Model
{
    use SoftDeletes;
    use HashableId;
    use ModelSlugTrait;
    protected $fillable = [
        'title',
        'content',
        'slug',
        'user_id',
        'category_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags ()
    {
        return $this->belongsToMany(Tag::class, 'article_tag', 'article_id', 'tag_id');
    }
}
