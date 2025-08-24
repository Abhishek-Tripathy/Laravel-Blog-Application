<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $fillable = [
        'image', 'title', 'slug', 'content', 'category_id', 'user_id', 'published_at'
    ];

    public function registerMediaConversions(?Media $media = null): void{
        $this->addMediaConversion('preview')
            ->width(400)
            ->nonQueued();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function readTime($wordsPerMinute = 100){
        $wordCount = str_word_count(strip_tags($this->content));
        $minutes = ceil($wordCount / $wordsPerMinute);

        return max(1,$minutes);
    }

     public function imageUrl (){
        if($this->image){
            return Storage::url($this->image);
        }
        return null;
    }

     public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function claps()
    {
        return $this->hasMany(Claps::class);
    }
}
