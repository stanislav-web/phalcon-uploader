<?php
namespace Test\Uploader\Helpers;

use Uploader\Helpers\Message;

/**
 * Class MessageTest
 *
 * @package Test\Uploader
 * @since   PHP >=5.4.28
 * @author  Stanislav WEB | Lugansk <stanisov@gmail.com>
 *
 */
class MessageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Format class object
     *
     * @var Message
     */
    private $message;

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
        $this->reflection = new \ReflectionClass('Uploader\Helpers\Message');
        $this->message       = new Message();
    }
    /**
     * Kill testing object
     *
     * @uses Uploader
     */
    public function tearDown()
    {
        $this->message = null;
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
     * @covers Uploader\Helpers\Message::get()
     */
    public function testGet() {

    }

}