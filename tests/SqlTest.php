<?php

use Mockery as m;

class SqlTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBase()
    {
        $this->visit('/sql/base')->seeStatusCode(200);
    }
}
