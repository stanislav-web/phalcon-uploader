<?php
namespace Test\Uploader;

use Uploader\Validator;

/**
 * Class ValidatorTest
 *
 * @package Test\Uploader
 * @since   PHP >=5.4.28
 * @author  Stanislav WEB | Lugansk <stanisov@gmail.com>
 *
 */
class ValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Validator class object
     *
     * @var Validator
     */
    private $validator;

    /**
     * ReflectionClass
     *
     * @var \ReflectionClass
     */
    private $reflection;

    /**
     * Initialize testing object
     *
     * @uses Validator
     * @uses \ReflectionClass
     */
    public function setUp()
    {
        $this->reflection = new \ReflectionClass('Uploader\Validator');
        $this->validator       = new Validator();
    }
    /**
     * Kill testing object
     *
     * @uses Uploader
     */
    public function tearDown()
    {
        $this->validator = null;
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
     * @covers Uploader\Validator::checkMinsize()
     */
    public function testMinsize() {

    }
}