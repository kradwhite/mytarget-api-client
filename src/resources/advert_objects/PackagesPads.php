<?php
/**
 * User: Aleksandrov Artem
 * Date: 21.10.2019
 * Time: 8:22
 */

namespace kradwhite\myTarget\api\resources\advert_objects;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий собрать информацию о площадках, которые используются в таргетингах пакета по умолчанию
 * Class PackagesPads
 * @package kradwhite\myTarget\api\methods\advert_objects
 * @see https://target.my.com/doc/api/ru/resource/PackagesPads
 */
class PackagesPads extends Resource
{
    /**
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', 'packages_pads');
    }
}