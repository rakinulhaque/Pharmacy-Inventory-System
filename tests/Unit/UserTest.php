<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    //public function test_example()
    
    public function test_admin()
    {
        $response =$this->get('/login');
        $response->assertStatus(200);
        
    }
}
