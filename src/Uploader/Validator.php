<?php
namespace Uploader;

use Uploader\Helpers\Message;
use Uploader\Helpers\Format;

/**
 * Validator class
 *
 * @package   Uploader
 * @since     PHP >=5.4
 * @version   1.0
 * @author    Stanislav WEB | Lugansk <stanisov@gmail.com>
 * @copyright Stanislav WEB
 */
class Validator
{

    /**
     * Error message container
     * @var array $rules
     */
    public $errors  = [];

    /**
     * Check minimum file size
     *
     * @param \Phalcon\Http\Request\File $file
     * @param $value
     * @return bool
     */
    public function checkMinsize(\Phalcon\Http\Request\File $file, $value)
    {
        // conversion to the desired format

        if(is_array($value) === true) {
            $value    = $value[key($value)];
        }

        // check

        if($file->getSize() < (int)$value) {

            $this->errors[] =   sprintf(Message::get('INVALID_MIN_SIZE'), $file->getName(), Format::bytes($value));
            return false;
        }

        return true;
    }

    /**
     * Check maximum file size
     *
     * @param \Phalcon\Http\Request\File $file
     * @param mixed $value
     * @return bool
     */
    public function checkMaxsize(\Phalcon\Http\Request\File $file, $value)
    {
        //conversion to the desired format

        if(is_array($value) === true) {
            $value    = $value[key($value)];
        }

        // check

        if($file->getSize() > (int)$value) {

            $this->errors[] =   sprintf(Message::get('INVALID_MAX_SIZE'), $file->getName(), Format::bytes($value));
            return false;
        }

        return true;
    }

    /**
     * Check file allowed extensions
     *
     * @param \Phalcon\Http\Request\File $file
     * @param mixed $value
     * @return bool
     */
    public function checkExtensions(\Phalcon\Http\Request\File $file, $value)
    {
        //conversion to the desired format

        if(is_array($value) === false) {
            $value    = [$value];
        }

        // check

        if(in_array($file->getExtension(), $value) === false) {

            $this->errors[] =   sprintf(Message::get('INVALID_EXTENSION'), $file->getName(), implode(',', $value));

            return false;
        }

        return true;
    }

    /**
     * Check file allowed extensions
     *
     * @param \Phalcon\Http\Request\File $file
     * @param mixed $value
     * @return bool
     */
    public function checkMimes(\Phalcon\Http\Request\File $file, $value)
    {
        //conversion to the desired format

        if(is_array($value) === false) {
            $value    = [$value];
        }

        if(in_array($file->getRealType(), $value) === false) {

            $this->errors[] =   sprintf(Message::get('INVALID_MIME_TYPES'), $file->getName(), implode(',', $value));

            return false;
        }

        return true;
    }

    /**
     * Check upload directory
     *
     * @param \Phalcon\Http\Request\File $file
     * @param mixed $value
     * @param $value
     * @return bool
     */
    public function checkDirectory(\Phalcon\Http\Request\File $file = null, $value)
    {
        // conversion to the desired format

        if(is_array($value) === true) {
            $value    = $value[key($value)];
        }

        if(file_exists($value) === false) {

            $this->errors[] =   sprintf(Message::get('INVALID_UPLOAD_DIR'), $value);
            return false;
        }

        if(is_writable($value) === false) {

            $this->errors[] =   sprintf(Message::get('INVALID_PERMISSION_DIR'), $value);
            return false;
        }

        return true;
    }

    /**
     * Create Directory if not exist
     *
     * @param string $directory
     * @param int $permission
     * @version v1.4
     * @author Mahdi-Mohammadi
     * @return bool
     */
    public function checkDynamic(\Phalcon\Http\Request\File $file = null, $directory, $permission = 0777) {

        if(is_dir($directory) === false && file_exists($directory) === false) {
            mkdir(rtrim($directory,'/').DIRECTORY_SEPARATOR, $permission, true);
        }

        return true;
    }

}
