<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_login(): void
    {
        /*
        * 1) Criar um usuário fake para ser testado
        */
        $user = User::factory()->create();
        $response = $this->post(route('auth.login'), [
            'email' => $user->email,
            'password' => $user->password
        ]);
        $response->assertRedirect(route('dashboard'));
    }

    public function test_user_create_contact()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('new.contact'),[
            'user_id' => $user->id,
            'name' => 'Contato Teste',
            'number' => '98984419150'
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('contacts',[
            'user_id' => $user->id,
            'name' => 'Contato Teste',
            'number' => '98984419150'
        ]);
    }

    public function test_user_must_be_able_to_create_group()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('new.group'), [
            'name' => 'Group test',
            'description' => 'Grupo feito para conversar em grupo'
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('groups',[
            'name' => 'Group test',
            'description' => 'Grupo feito para conversar em grupo'
        ]);
    }


}
