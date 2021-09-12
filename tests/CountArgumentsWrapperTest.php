<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsWrapperTest extends TestCase
{
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new functions\Functions();
    }

    public function testNegative3()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->functions->countArgumentsWrapper(1);
    }


    public function testNegative2()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->functions->countArgumentsWrapper(new DateTime());
    }


    public function testNegative1()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->functions->countArgumentsWrapper(null);
    }
}
