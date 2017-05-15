<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
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

    public function testGetArticel()
    {
        $response = $this->get('/artical/user/1');
        $response->assertStatus(500);
    }

    public function testAdd()
    {
        $x = 5;
        $y = 6;
        $add = $x + $y;
        $this->assertEquals($add === 11, 11, '测试不正确');
    }
}
