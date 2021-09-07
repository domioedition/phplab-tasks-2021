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

    
    /**
     * @dataProvider negativeDataProvider
     */
    public function testNegative($expected)
    {
        $this->assertNotEquals($expected, $this->functions->sayHello());
    }

    public function positiveDataProvider(): array
        {
            return [
                ['Hello']
            ];
        }

    
    public function negativeDataProvider(): array
        {
            return [
                ['Hi'],
                ['bye'],
                ['orange']
            ];
        }
}
