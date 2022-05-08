<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class test extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
  
    
    public function test_when_create_new_user_expects_redirect_dashboard(){

        $response = $this->post('/register',[
            'name' => 'Usuario',
            'email' => 'user@test.co',
            'password' => 'Abcd1234.',
            'password_confirmation' => 'Abcd1234.'
        ]);
        
        $response->assertRedirect('/dashboard');
    }

    public function test_when_user_exists_expects_delete_user(){
        $user = User::where('name','=','Usuario');
        if ($user){
            $user->delete();
        }

        $this->assertTrue(true);
    }

    public function test_when_login_user_expects_redirect_root(){
        $response = $this->post('/login',[
            'name' => "admin@correo.es",
            'password' => 'Abcd1234.'
        ]);

        $response->assertRedirect('/');
    }

    public function test_when_query_database_expects_result(){
        $this->assertDatabaseHas('users',[
            'name'=>'OscarGM']);
    }


}
