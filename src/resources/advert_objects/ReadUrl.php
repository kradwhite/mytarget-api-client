<?php
/**
 * User: Aleksandrov Artem
 * Date: 21.10.2019
 * Time: 8:28
 */

namespace kradwhite\myTarget\api\resources\advert_objects;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс позволяет получить информацию о рекламируемой ссылке
 * Class ReadUrl
 * @package kradwhite\myTarget\api\methods\advert_objects
 * @see https://target.my.com/doc/api/ru/resource/ReadUrl
 */
class ReadUrl extends Resource
{
    /**
     * Запрос возвращает данные о рекламируемой ссылке
     * @param string $ulr_id
     * @return mixed
     */
    public function get(string $ulr_id)
    {
        return $this->request('get', "urls/$ulr_id");
    }
}