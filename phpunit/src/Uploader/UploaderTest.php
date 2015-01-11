<?php
namespace Test\Uploader;

use Uploader\Uploader;

/**
 * Class UploaderTest
 *
 * @package Test\Uploader
 * @since   PHP >=5.4.28
 * @author  Stanislav WEB | Lugansk <stanisov@gmail.com>
 *
 */
class UploaderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Uploader class object
     *
     * @var Uploader
     */
    private $uploader;

    /**
     * ReflectionClass
     *
     * @var \ReflectionClass
     */
    private $reflection;

    /**
     * Initialize testing object
     *
     * @uses Uploader
     * @uses \ReflectionClass
     */
    public function setUp()
    {
        $this->reflection = new \ReflectionClass('Uploader\Uploader');
        $this->uploader       = new Uploader();
    }
    /**
     * Kill testing object
     *
     * @uses Uploader
     */
    public function tearDown()
    {
        $this->uploader = null;
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
     * @covers Uploader\Uploader::__construct()
     */
    public function testConstructor() {

    }
}