<?php
/**
 * User: Aleksandrov Artem
 * Date: 21.10.2019
 * Time: 9:04
 */

namespace kradwhite\myTarget\api\resources\references;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, предоставляющий информацию о производителях мобильных устройств
 * Class MobileVendors
 * @package kradwhite\myTarget\api\methods\references
 * @see https://target.my.com/doc/api/ru/resource/MobileVendors
 */
class MobileVendors extends Resource
{
    /**
     * Запрос возвращает список производителей мобильных устройств
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', 'mobile_vendors');
    }
}