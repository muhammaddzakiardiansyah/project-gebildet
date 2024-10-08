<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    // protected $fillable = ['judul', 'excrpt', 'caption'];
    protected $guarded = ['id'],
              $with = ['category', 'user'];

    public function scopeFilter($query, array $filters) {
        // if(isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('judul', 'like', '%' . request('search') . '%')
        //                  ->orWhere('excrpt', 'like', '%' . request('search') . '%')
        //                  ->orWhere('caption', 'like', '%' . request('search') . '%');
        // }

        $query->when($filters['search'] ?? false, function($query, $search) {
             return $query->where('judul', 'like', '%' . $search . '%')
                          ->orWhere('excrpt', 'like', '%' . request('search') . '%')
                          ->orWhere('caption', 'like', '%' . request('search') . '%');
        });

        $query->when($filters['category'] ?? false, function($query, $category) {
             return $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
             });
        });

        $query->when($filters['user'] ?? false, function($query, $user) {
            return $query->whereHas('user', function($query) use ($user) {
               $query->where('username', $user);
            });
        });
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName() {
        return 'slug';
    }

    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    // public function post() {
    //     return $this->belongsTo(Post::class);
    // }
}
