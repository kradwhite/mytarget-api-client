<?php
/**
 * User: Aleksandrov Artem
 * Date: 21.10.2019
 * Time: 9:00
 */

namespace kradwhite\myTarget\api\resources\references;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, предоставляющий информацию о мобильной операционной системе
 * Class MobileOperationSystem
 * @package kradwhite\myTarget\api\methods\references
 * @see https://target.my.com/doc/api/ru/resource/MobileOperationSystem
 */
class MobileOperationSystem extends Resource
{
    /**
     * Запрос возвращает список мобильных операционных систем
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', 'mobile_os');
    }
}