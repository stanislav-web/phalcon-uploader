<?php
namespace Test\Uploader\Helpers;

use Uploader\Helpers\Format;

/**
 * Class UploaderTest
 *
 * @package Test\Uploader
 * @since   PHP >=5.4.28
 * @author  Stanislav WEB | Lugansk <stanisov@gmail.com>
 *
 */
class FormatTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Format class object
     *
     * @var Format
     */
    private $format;

    /**
     * ReflectionClass
     *
     * @var \ReflectionClass
     */
    private $reflection;

    /**
     * Initialize testing object
     *
     * @uses Format
     * @uses \ReflectionClass
     */
    public function setUp()
    {
        $this->reflection = new \ReflectionClass('Uploader\Helpers\Format');
        $this->format       = new Format();
    }
    /**
     * Kill testing object
     *
     * @uses Uploader
     */
    public function tearDown()
    {
        $this->format = null;
    }

    /**
     * Call protected/private method of a class.
     *
     * @param object &$object    Instantiated object that we will run method on.
     * @param string $methodName Method name to call
     * @param array  $parameters Array of parameters to pass into method.
     * @example <code>
     *          $this->invokeMethod($user, 'cryptPassword', array('passwordToCrypt'));
     *          </code>
     * @return mixed Method return.
     */
    protected function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $method = $this->reflection->getMethod($methodName);
        $method->setAccessible(true);
        return $method->invokeArgs($object, $parameters);
    }
    /**
     * Setup accessible any private (protected) property
     *
     * @param $name
     * @return \ReflectionMethod
     */
    protected function getProperty($name)
    {
        $prop = $this->reflection->getProperty($name);
        $prop->setAccessible(true);
        return $prop;
    }

    /**
     * @covers Uploader\Helpers\Format::bytes()
     */
    public function testBytes() {

    }

}