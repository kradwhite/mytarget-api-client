<?php
/**
 * User: Aleksandrov Artem
 * Date: 21.10.2019
 * Time: 8:59
 */

namespace kradwhite\myTarget\api\resources\references;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, предоставляющий информацию о категории мобильного приложения
 * Class MobileCategory
 * @package kradwhite\myTarget\api\methods\references
 * @see https://target.my.com/doc/api/ru/resource/MobileCategory
 */
class MobileCategory extends Resource
{
    /**
     * Запрос возвращает данные о категориях мобильных приложений
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', 'mobile_categories');
    }
}