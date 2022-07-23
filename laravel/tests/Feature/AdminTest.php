<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Laravel\Sanctum\Sanctum;

class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase,WithFaker;
    public function testLoginWithCorrectPassword()
    {
        $testPassword ='featureLoginTest';
        $admin=Admin::create([
            'email' => $this->faker->email(),
            'password' =>  Hash::make($testPassword),
            'name' => $this->faker->name(),
            'phone'=>$this->faker->phoneNumber(),
        ]);
        $response=$this->json('post','/api/admin/login',['email' => $admin->email, 'password' => $testPassword]);
        $response->assertStatus(200);
        $response->assertJsonStructure(['token','admin']);
        $this->assertDatabaseHas('personal_access_tokens',[
            'name' => 'Admin Token',
        ]);
    }
    public function testLoginWithIncorrectPassword(){
        $testPassword ='featureLoginTest';
        $admin=Admin::create([
            'email' => $this->faker->email(),
            'password' =>  Hash::make($testPassword),
            'name' => $this->faker->name(),
            'phone'=>$this->faker->phoneNumber(),
        ]);
        $response=$this->json('post','/api/admin/login',['email' => $admin->email, 'password' => "1$testPassword"]);
        $response->assertStatus(401);
        $response->assertExactJson(['message'=>'Invalid password or account']);
    }
    public function testAdminGate(){
        $this->json('get','/api/admin/logout')->assertStatus(401);
        $this->json('get','/api/admin/all')->assertStatus(401);
    }
    public function testLogout(){
        $admin=Admin::factory()->create();
        Sanctum::actingAs($admin,['admin']);
        $response=$this->json('get','/api/admin/logout');
        $response->assertStatus(200);
    }
}
