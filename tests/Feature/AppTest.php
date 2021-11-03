<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\Request;
use App\Services\FoodRatingsService;

class AppTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
    }

    public function test_user_can_login_with_correct_credentials()
    {
        $user = \App\Models\User::factory(User::class)->create([
            'password' => bcrypt($password = '12345678'),
        ]);
        
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_cannot_login_with_incorrect_credentials()
    {
        $user = \App\Models\User::factory(User::class)->create([
            'password' => bcrypt($password = '12345678'),
        ]);
        
        $incorrectPassword = '123';

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $incorrectPassword,
        ]);

        $response->assertRedirect('/login');
        $this->assertGuest();
    }

    public function test_authorities()
    {
        $request = Request::create('/', 'GET',[
        ]);

        $controller = new DashboardController();
        $response = $controller->index($request);

    }

}
