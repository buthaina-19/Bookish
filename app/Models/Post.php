<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        'user_id',
        'title',
        'slug',
        'image',
        'content',
        'posted_at',
        'featured',
    ];

    protected $casts = [
        'posted_at' => 'datetime',
    ];


    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }


    public function comments(){
        return $this->hasMany((Comment::class));
    }


    public function likes(){
        return $this->BelongsToMany(User::class, 'post_likes')->withTimestamps();
    }

    public function scopePosted($query)
    {
        $query->where('posted_at','<=',Carbon::now());
    }

    public function scopeFeatured($query)
    {
        $query->where('featured',true);
    }

    public function scopeWithCategory($query, string $category)
    {
        $query->whereHas('categories',function($query) use ($category){
            $query->where('slug', $category);
        })   ;
     }

    public function getReadingTime(){
        $min= round(str_word_count($this->content)/250);
        return ($min<1) ? 1 :$min;
    }

    public function getExcerpt(){
        return Str::limit(strip_tags($this->content),150);
    }

    public function getThumbnailImage(){
        $isUrl=str_contains($this->image, 'http');
        return($isUrl)? $this->image : Storage::disk('public')->url($this->image);
    }
}
