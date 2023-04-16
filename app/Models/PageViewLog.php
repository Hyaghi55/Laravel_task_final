<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PageViewLog extends Model
{
    use HasUlids;
    use HasFactory;

    protected $primaryKey = 'ulid';

    protected $fillable = [
        'ulid',
        'user_id',
        'url',
    ];
    /**
     * Get the user that owns the PageViewLog
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the pageView that owns the PageViewLog
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pageView(): BelongsTo
    {
        return $this->belongsTo(PageView::class, 'url', 'url');
    }
}
