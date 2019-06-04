<?php
/**
 * @package PHP Micro Framework
 * @license MIT License
 * @link    http://denis909.spb.ru/en
 */
use denis909\core\ArrayObject;

class ArrayObjectTest extends \PHPUnit\Framework\TestCase
{

    protected function _createArrayObject(array $config = [])
    {
        return new ArrayObject(
            array_merge(
                [
                    'param1' => 'value 1',
                    'param2' => 'value 2'
                ], 
                $config
            )
        );
    }

    public function testCreate()
    {
        try
        {
            $object = $this->_createArrayObject();
        }
        catch(Exception $e)
        {
            $this->assertTrue(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function testProperties()
    {
        $object = $this->_createArrayObject();

        $this->assertEquals($object->param1, 'value 1');

        $this->assertEquals($object->param2, 'value 2');

        $this->assertEquals($object['param1'], 'value 1');

        $this->assertEquals($object['param2'], 'value 2');
    }

    public function testNotExistsProperty()
    {
        $object = $this->_createArrayObject();

        $this->expectException(Exception::class);

        $object->param0;
    }
 
    public function testNotExistsOffset()
    {
        $object = $this->_createArrayObject();

        $this->expectException(Exception::class);

        $object['param0'];
    }

}