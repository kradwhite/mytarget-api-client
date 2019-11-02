<?php
/**
 * User: Aleksandrov Artem
 * Date: 21.10.2019
 * Time: 8:55
 */

namespace kradwhite\myTarget\api\resources\references;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, предоставляющий информацию о мобильном приложении из Google Play
 * Class GoogleApp
 * @package kradwhite\myTarget\api\methods\references
 * @see https://target.my.com/doc/api/ru/resource/GoogleApp
 */
class GoogleApp extends Resource
{
    /**
     * Запрос возвращает информацию о мобильном приложении из Google Play
     * @param string $app_name
     * @return mixed
     */
    public function get(string $app_name)
    {
        return $this->request('get', "google_apps/$app_name");
    }

    /**
     * Запрос обновляет информацию о мобильном приложении из Google Play
     * @param string $qpp_name
     * @return mixed
     */
    public function post(string $qpp_name)
    {
        return $this->request('post', "google_apps/$qpp_name");
    }
}