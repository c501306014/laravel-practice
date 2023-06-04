<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tweet extends Model
{
    use HasFactory;

    /**
     * TweetモデルはUserモデルに所属するリレーションを張る
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 中間テーブルを利用してImageモデルとのリレーションを張る
     */
    public function images(): BelongsToMany
    {
        return $this->belongsToMany(Image::class, 'tweet_images')
            ->using(TweetImage::class);
    }
}
