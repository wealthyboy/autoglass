<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasChildren;


class Page extends Model
{

    use HasFactory, HasChildren;


    protected $fillable = ['user_id', 'title', 'description'];

    public $folder = 'blog';

    public $appends = [
        'c_link',
    ];

    protected $table = 'pages';

    public function getCLinkAttribute()
    {
        return null !== $this->link  ? $this->link : '/pages/' . $this->slug;
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }


    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id', 'id')->orderBy('sort_order', 'asc');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
