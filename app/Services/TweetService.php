<?php

namespace App\Services;

use App\Models\Tweet;
use Carbon\Carbon;

class TweetService
{
  public function getTweets()
  {
    return Tweet::orderBy('created_at', 'DESC')->get();
  }

  /**
   * 自分のTweetかどうかをチェックする
   */
  public function checkOwnTweet(int $userId, int $tweetId): bool
  {
    $tweet = Tweet::where('id', $tweetId)->first();
    if (!$tweet) {
      return false;
    }

    return $tweet->user_id === $userId;
  }

  /**
   * 前日のつぶやき数を数えて返す
   */
  public function countYesterdayTweets(): int
  {
    return Tweet::whereDate(
      'created_at',
      '>=',
      Carbon::yesterday()->toDateTimeString()
    )->whereDate(
      'created_at',
      '<',
      Carbon::today()->toDateTimeString()
    )->count();
  }
}
