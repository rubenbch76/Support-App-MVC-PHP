<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function test_just_an_example()
    {
        $this->markTestSkipped('Skipped example');
        $this->assertEquals(1, 1);
    }
}