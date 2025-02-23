<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = ['title', 'content', 'user_id', 'thumbnail'];

    public function getThumbnailImageUrlAttribute()
    {
        return $this->thumbnail
            ? Storage::url($this->thumbnail)
            : asset('images/default-bg.jpg'); // Gambar default jika tidak ada
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            $slug = Str::slug($post->title);
            $count = Post::where('slug', 'LIKE', "{$slug}%")->count();

            $post->slug = $count ? "{$slug}-{$count}" : $slug;
        });

        static::updating(function ($post) {
            $slug = Str::slug($post->title);
            $count = Post::where('slug', 'LIKE', "{$slug}%")->count();

            $post->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }
}
