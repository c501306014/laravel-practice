<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    public function testSuccessfulLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create(); // テストユーザ作成
            $browser->visit('/login')
                ->type('email', $user->email) // テストユーザのメールアドレス記入
                ->type('password', 'password') // パスワードを入力
                ->press('Log in') // ログインボタン押下
                ->assertPathIs('/tweet') // /tweetに遷移したことを検証
                ->assertSee('つぶやきアプリ'); // ページ内に「つぶやきアプリ」が表示されていることを検証
        });
    }
}
