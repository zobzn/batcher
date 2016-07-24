<?php

class BatcherTest extends PHPUnit_Framework_TestCase
{
    public function testBatcher()
    {
        $tmp = array();

        $batcher = new \Zbz\Batcher(3, function (array $items) use (&$tmp) {
            $tmp = $items;
        });

        $batcher->add(1);
        $this->assertEquals(array(), $tmp);
        $batcher->add(2);
        $this->assertEquals(array(), $tmp);
        $batcher->add(3);
        $this->assertEquals(array(1, 2, 3), $tmp);

        $tmp = array();
        $batcher->add(4);
        $this->assertEquals(array(), $tmp);
        $batcher->add(5);
        $this->assertEquals(array(), $tmp);
        $batcher->finish();
        $this->assertEquals(array(4, 5), $tmp);
    }
}
