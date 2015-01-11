<?php
namespace Uploader\Aware;

/**
 * Interface for creating filters
 *
 * @package   Uploader
 * @subpackage   Uploader\Aware
 * @since     PHP >=5.4
 * @version   1.0
 * @author    Stanislav WEB | Lugansk <stanisov@gmail.com>
 * @copyright Stanislav WEB
 */
interface FilterInterface
{
    /**
     * Initialize rules
     *
     * @param array $rules
     *
     * @return null
     */
    public function __construct(array $rules);

    /**
     * Initialize rules
     *
     * @param array $rules
     *
     * @return null
     */
    public function setRules(array $rules);

    /**
     * Initialize rules
     *
     * @param array $rules
     *
     * @return null
     */
    public function getRules();
}