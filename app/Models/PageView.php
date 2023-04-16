<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PageView extends Model
{
    use HasFactory;
    use HasUlids;

    protected $primaryKey = 'ulid';

    protected $fillable = [
        'ulid',
        'url',
        'views_count',
    ];


    /**
     * Get all of the comments for the PageView
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function logs(): HasMany
    {
        return $this->hasMany(PageViewLog::class, 'url', 'url');
    }
}
