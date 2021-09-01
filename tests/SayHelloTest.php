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
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, $this->functions->sayHello($input));
    }


    public function testNegative()
    {
        $this->assertNotEquals("bye", $this->functions->sayHello("hello"));
    }

    public function positiveDataProvider(): array
    {
        return [
            ['dolphin', 'Hello'],
            ['alaska', 'Hello'],
            ['europe', 'Hello'],
            ['php', 'Hello'],
            ['the', 'Hello'],
        ];
    }
}
