<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentWrapperTest extends TestCase
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
        $this->expectException(InvalidArgumentException::class);
        $this->functions->sayHelloArgumentWrapper(null);
        $this->functions->sayHelloArgumentWrapper(new Test());
    }


    public function testNegative1()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->functions->sayHelloArgumentWrapper(new DateTime());
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
