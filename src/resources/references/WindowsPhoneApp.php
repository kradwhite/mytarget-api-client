<?php
/**
 * User: Aleksandrov Artem
 * Date: 21.10.2019
 * Time: 9:10
 */

namespace kradwhite\myTarget\api\resources\references;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, предоставляющий информацию о мобильном приложении из Microsoft Store
 * Class WindowsPhoneApp
 * @package kradwhite\myTarget\api\methods\references
 * @see https://target.my.com/doc/api/ru/resource/WindowsPhoneApp
 */
class WindowsPhoneApp extends Resource
{
    /**
     * Запрос возвращает информацию о мобильном приложении из Microsoft Store
     * @param string $app_name
     * @return mixed
     */
    public function get(string $app_name)
    {
        return $this->request('get', "windows_phone_apps/$app_name");
    }
}