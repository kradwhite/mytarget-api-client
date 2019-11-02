<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 18:53
 */

namespace kradwhite\myTarget\api\resources\partner_platforms;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс для чтения платформенных и форматных площадок
 * Class PlatformPad
 * @package kradwhite\myTarget\api\methods\partner_platforms
 * @see https://target.my.com/doc/api/ru/resource/PlatformPad
 */
class PlatformPad extends Resource
{
    /**
     * Возвращает платформенные и форматные площадки
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', 'platforms');
    }
}