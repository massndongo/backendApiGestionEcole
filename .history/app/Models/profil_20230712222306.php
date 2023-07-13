<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class profil extends Model
{
    use HasFactory;
    

    /**
     * Get the comments for the blog post.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
