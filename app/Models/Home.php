<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Home extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'judul',
        'rangkuman',
        'isi',
        'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
