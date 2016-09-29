<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoutesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * test login route 
     * @return void
     */
    public function testUserLoginUri()
    {
    	$response = $this->call('GET', '/user/login');
    	$this->assertEquals(200, $response->status());
    }

    /**
     * test login post route 
     * @return void
     */
    public function testUserLoginPostUri()
    {
    	$response = $this->call('POST', '/user/login', ['email' => 'test@gmail.com', 'password'=> bcrypt('password')]);
    	$this->assertEquals(302, $response->status());
    }

    /**
     * test the register routes 
     * @return void
     */
    public function testUserRegisterUri()
    {
    	$response = $this->call('GET', 'user/register');
    	$this->assertEquals(200, $response->status());
    }

    /**
     * test the register post route 
     * @return void
     */
    public function testUserRegisterPostUri()
    {
    	$response = $this->call('POST', 'user/register');
    	$this->assertEquals(302, $response->status());
    }


    /**
     * test the password reset route 
     * @return void
     */
    public function testUserPasswordResetUri()
    {
		$response = $this->call('GET', 'password/reset/asdfasdfsomeconfirmationcode');
    	$this->assertEquals(200, $response->status());
    }

    /**
     * test the password reset post route 
     * @return void
     */
    public function testUserPasswordResetPostUri()
    {
    	$response = $this->call('POST', 'password/reset');
    	$this->assertEquals(302, $response->status());
    }

    /**
     * test the password reset email send route 
     * @return void
     */
    public function testUserPasswordResetEmailPostUri()
    {
    	$response = $this->call('POST', 'password/email');
    	$this->assertEquals(302, $response->status());
    }
}
