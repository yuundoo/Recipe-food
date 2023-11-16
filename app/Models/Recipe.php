<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Models\Comment;

use App\Models\User;

class Recipe extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'ingredients',
        'description',
        'image_name',
        'image_path',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): Relation
    {
        return $this->hasMany(Comment::class);
    }
}
