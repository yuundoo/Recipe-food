<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Recipe;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'recipeComments';


    protected $fillable = [
        'user_id',
        'name',
        'commentStory',
    ];

    public function recipe(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
