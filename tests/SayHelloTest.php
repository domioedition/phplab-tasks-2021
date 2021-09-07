<?php

use PHPUnit\Framework\TestCase;

class SayHelloTest extends TestCase
{
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new functions\Functions();
    }

    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($expected)
    {
        $this->assertEquals($expected, $this->functions->sayHello());
    }


    public function testNegative()
    {
        $this->assertNotEquals("bye", $this->functions->sayHello());
    }

    public function positiveDataProvider(): array
    {
        return [
            ['Hello'],
            ['Hello'],
            ['Hello'],
            ['Hello'],
            ['Hello'],
        ];
    }
}
