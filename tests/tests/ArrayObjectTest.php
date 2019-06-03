<?php
/**
 * @package PHP Micro Framework
 * @license MIT License
 * @link    http://denis909.spb.ru/en
 */
use denis909\core\ArrayObject;

class ArrayObjectTest extends \PHPUnit\Framework\TestCase
{

    public function testCreate()
    {
        try
        {
            $object = new ArrayObject([
                'param1' => 'value 1',
                'param2' => 'value 2'
            ]);
        }
        catch(Exception $e)
        {
            $this->assertTrue(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
 
}