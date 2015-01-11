<?php
namespace Uploader\Helpers;

/**
 * Format helper class
 *
 * @package   Uploader
 * @subpackage   Uploader\Helpers
 * @since     PHP >=5.4
 * @version   1.0
 * @author    Stanislav WEB | Lugansk <stanisov@gmail.com>
 * @copyright Stanislav WEB
 */
class Format
{
    /**
     * Cyrillic symbols
     *
     * @var array
     */
    static private $cyr = array(
        'Щ', 'Ш', 'Ч', 'Ц', 'Ю', 'Я', 'Ж', 'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О',
        'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ь', 'Ы', 'Ъ', 'Э', 'Є', 'Ї', 'І',
        'щ', 'ш', 'ч', 'ц', 'ю', 'я', 'ж', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о',
        'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ь', 'ы', 'ъ', 'э', 'є', 'ї', 'і');

    /**
     * Latin symbols
     *
     * @var array
     */
    static private $lat = array(
        'Shh', 'Sh', 'Ch', 'C', 'Ju', 'Ja', 'Zh', 'A', 'B', 'V', 'G', 'D', 'Je', 'Jo', 'Z', 'I', 'J', 'K', 'L', 'M',
        'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'Kh', 'Y', 'Y', '', 'E', 'Je', 'Ji', 'I',
        'shh', 'sh', 'ch', 'c', 'ju', 'ja', 'zh', 'a', 'b', 'v', 'g', 'd', 'je', 'jo', 'z', 'i', 'j', 'k', 'l', 'm',
        'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'kh', 'y', 'y', '', 'e', 'je', 'ji', 'i');

    /**
     * Format byte code to human understand
     *
     * @param int $bytes number of bytes
     * @param int $precision after comma numbers
     * @return string
     */
    public static function bytes($bytes, $precision = 2)
    {
        $size = array('bytes', 'kb', 'mb', 'gb', 'tb', 'pb', 'eb', 'zb', 'yb');
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$precision}f", $bytes / pow(1024, $factor)) . ' ' . @$size[$factor];
    }

    /**
     * Transliterate cyrillic to latin
     *
     * @param string $string original string
     * @param string $separator word separator
     * @param boolean $clean to lower & all non understand symbols remove
     * @return
     */
    static public function toLatin($string, $separator = '', $clean = false)
    {
        for($i = 0; $i<count(self::$cyr); $i++)
        {
            $string = str_replace(self::$cyr[$i], self::$lat[$i], $string);
        }

        $string = preg_replace("/([qwrtpsdfghklzxcvbnmQWRTPSDFGHKLZXCVBNM]+)[jJ]e/", "\${1}e", $string);
        $string = preg_replace("/([qwrtpsdfghklzxcvbnmQWRTPSDFGHKLZXCVBNM]+)[jJ]/", "\${1}y", $string);
        $string = preg_replace("/([eyuioaEYUIOA]+)[Kk]h/", "\${1}h", $string);
        $string = preg_replace("/^kh/", "h", $string);
        $string = preg_replace("/^Kh/", "H", $string);

        $string = trim($string);

        if(empty($separator) === false) {

            $string = str_replace(' ', $separator, $string);
            $string = preg_replace('/['.$separator.']{2,}/', '', $string);
        }

        if($clean !== false) {

            $string = strtolower($string);
            $string = preg_replace('/[^-_a-z0-9.]+/', '', $string);
        }

        return $string;
    }

}