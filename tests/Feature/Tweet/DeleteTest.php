<?php

namespace Tests\Feature\Tweet;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Tweet/DeleteControllerクラスの機能テスト
     */
    public function test_delete_successed(): void
    {
        // ユーザ作成
        $user = User::factory()->create();

        // つぶやき作成
        $tweet = Tweet::factory()->create(['user_id' => $user->id]);

        // 指定したユーザでログインした状態にする
        $this->actingAs($user);

        // 作成したつぶやきIDを指定
        $response = $this->delete('/tweet/delete/' . $tweet->id);

        $response->assertRedirect('/tweet');
    }
}
