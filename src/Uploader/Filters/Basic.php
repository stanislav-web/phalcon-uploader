<?php
namespace Uploader\Filters;
use Phalcon\Exception;
use Uploader\Aware\FilterInterface;

/**
 * Basic filter class
 *
 * @package   Uploader
 * @subpackage   Uploader\Filters
 * @since     PHP >=5.4
 * @version   1.0
 * @author    Stanislav WEB | Lugansk <stanisov@gmail.com>
 * @copyright Stanislav WEB
 */
class Basic implements FilterInterface
{
    /**
     * Array of rules
     * @var array $rules
     */
    private $rules = [];

    /**
     *
     */
    public $filter;

    /**
     * Initialize rules
     *
     * @param array $rules
     *
     * @return null
     */
    public function __construct(array $rules)
    {
        // setting up rulles  (it was convenient to merge or rewrite rules, if they were added to other filters)
        $this->setRules($rules);

        // loop through all methods except compulsory
        foreach($this->rules as $class => $rules) {

            foreach($rules as $method => $rule) {

                if (method_exists($this, strtolower($method)) === true) {
                    $this->{strtolower($method)}($file, $rule);
                }
            }
        }
    }

    /**
     * @param array $rules
     * @return null|void
     * @throws Exception
     */
    public function setRules(array $rules) {

        if(empty($rules) === false) {
            $this->rules[__CLASS__] =   $rules;
        }
        else {
            throw new Exception('Does not set the rules for the '.__CLASS__);
        }
    }

    /**
     * @param array $rules
     * @return null|void
     * @throws Exception
     */
    public function getRules() {

        return $this->rules;
    }
    /**
     * Check file allowed extensions
     *
     * @param \Phalcon\Http\Request\File $file
     * @param mixed $value
     * @return bool
     */
    protected function extensions()
    {
        echo __METHOD__.'<br>';
    }

    /**
     * Check upload directory
     *
     * @param \Phalcon\Http\Request\File $file
     * @param $value
     * @return bool
     */
    protected function directory()
    {
        echo __METHOD__.'<br>';
    }

    /**
     * Check file allowed extensions
     *
     * @param \Phalcon\Http\Request\File $file
     * @param mixed $value
     * @return bool
     */
    protected function mimes()
    {
        echo __METHOD__.'<br>';
    }

    /**
     * Check minimum file size
     *
     * @param \Phalcon\Http\Request\File $file
     * @param $value
     * @return bool
     */
    protected function minsize()
    {
        echo __METHOD__.'<br>';
    }

    /**
     * Check maximum file size
     *
     * @param \Phalcon\Http\Request\File $file
     * @param mixed $value
     * @return bool
     */
    protected function maxsize()
    {
        echo __METHOD__.'<br>';
    }
}