<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PortfolioItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'site_link',
        'git_link',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(PortfolioImage::class, 'item_id', 'id');
    }
}
