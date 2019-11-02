<?php
/**
 * User: Aleksandrov Artem
 * Date: 21.10.2019
 * Time: 9:01
 */

namespace kradwhite\myTarget\api\resources\references;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, предоставляющий информацию об операторе мобильной сети
 * Class MobileOperator
 * @package kradwhite\myTarget\api\methods\references
 * @see https://target.my.com/doc/api/ru/resource/MobileOperator
 */
class MobileOperator extends Resource
{
    /**
     * Запрос возвращает список операторов мобильных сетей
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', 'mobile_operators');
    }
}