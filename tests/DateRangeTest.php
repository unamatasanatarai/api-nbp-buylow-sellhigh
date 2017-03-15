<?php
namespace Tests;

class DateRangeTest extends TestCase
{

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testShouldFailInvalidConstructorFrom()
    {
        $dr = new \DateRange("string");
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testShouldFailInvalidConstructorTo()
    {
        $dr = new \DateRange(43, "string");
    }

    public function testShouldSetFrom43()
    {
        $dr = new \DateRange(43);
        $this->assertEquals(43, $dr->getFrom());
    }

    public function testShouldSetZerosIfPassedNull()
    {
        $dr = new \DateRange(43, 89);
        $dr->setFrom(null);
        $dr->setTo(null);
        $this->assertEquals(0, $dr->getFrom());
        $this->assertEquals(0, $dr->getTo());
    }
}
