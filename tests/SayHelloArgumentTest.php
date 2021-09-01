<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentTest extends TestCase
{
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new functions\Functions();
    }

    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, $this->functions->sayHelloArgument($input));
    }


    public function testNegative()
    {
        $this->assertNotEquals("bye", $this->functions->sayHelloArgument("hello"));
    }

    public function positiveDataProvider(): array
    {
        return [
            ['dolphin', 'Hello dolphin'],
            ['alaska', 'Hello alaska'],
            [1, 'Hello 1'],
            [true, 'Hello 1'],
            ['the', 'Hello the'],
        ];
    }
}
