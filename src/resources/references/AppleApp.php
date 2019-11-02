<?php
/**
 * User: Aleksandrov Artem
 * Date: 21.10.2019
 * Time: 8:52
 */

namespace kradwhite\myTarget\api\resources\references;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, предоставляющий информацию о мобильном приложении из App Store
 * Class AppleApp
 * @package kradwhite\myTarget\api\methods\references
 * @see https://target.my.com/doc/api/ru/resource/AppleApp
 */
class AppleApp extends Resource
{
    /**
     * Запрос возвращает информацию о мобильном приложении из App Store
     * @param string $app_name
     * @return mixed
     */
    public function get(string $app_name)
    {
        return $this->request('get', "apple_apps/$app_name");
    }

    /**
     * Запрос обновляет информацию о мобильном приложении из App Store
     * @param string $app_name
     * @return mixed
     */
    public function post(string $app_name)
    {
        return $this->request('post', "apple_apps/$app_name");
    }
}