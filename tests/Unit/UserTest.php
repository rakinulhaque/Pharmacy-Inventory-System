<<<<<<< HEAD
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
=======
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
>>>>>>> 3781f3b12f70d4bb6d750d4e3171208ace56ab21
