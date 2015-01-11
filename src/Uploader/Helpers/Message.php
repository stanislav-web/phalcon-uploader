<?php
namespace Uploader\Helpers;

/**
 * Message helper class
 *
 * @package   Uploader
 * @subpackage   Uploader\Helpers
 * @since     PHP >=5.4
 * @version   1.0
 * @author    Stanislav WEB | Lugansk <stanisov@gmail.com>
 * @copyright Stanislav WEB
 */
class Message
{
    /**
     * Error messages collect
     *
     * @access private
     * @var array
     */
    private static $messages = [
        'INVALID_MIN_SIZE'  =>  'The %s file is small to download. The minimum allowable %s',
        'INVALID_MAX_SIZE'  =>  'The %s file is big to download. The maximum allowable %s',
        'INVALID_EXTENSION' =>  'File %s has invalid extension. Allowable only: %s',
        'INVALID_MIME_TYPES' =>  'File %s has invalid mime type. Allowable only: %s',
        'INVALID_UPLOAD_DIR' => 'The specified directory %s is not a directory download',
        'INVALID_PERMISSION_DIR' => 'The specified directory %s is not writable',
    ];

    /**
     * Get message
     *
     * @param string $key
     * @return mixed
     */
    public static function get($key) {

        if(isset(self::$messages[$key]) === true) {
            return self::$messages[$key];
        }
    }
}