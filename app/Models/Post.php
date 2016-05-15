<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $fillable = ['slug', 'title', 'excerpt', 'content', 'published'];
    public function getPublishedPosts() {
        $posts = $this->latest('published_at')->published()->get();
        return $posts;
    }

    public function scopePublished($query) {
        $query->where('published', '=', 1);
    }

    public function scopeUpPublished($query) {
        $query->where('published', '=', 0);
    }

    public function getUpPublishedPosts() {
        $posts = $this->latest('published_at')->upPublished()->get();
        return $posts;
    }
}
