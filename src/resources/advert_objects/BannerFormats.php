<?php
/**
 * User: Aleksandrov Artem
 * Date: 21.10.2019
 * Time: 7:50
 */

namespace kradwhite\myTarget\api\resources\advert_objects;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, предоставляющий информацию о баннерных форматах. Баннерный формат это набор требований, которым должен
 * соответствовать баннер, создаваемый внутри рекламной кампании на основании пакета, с указанным баннерным форматом
 * Class BannerFormats
 * @package kradwhite\myTarget\api\methods\advert_objects
 * @see https://target.my.com/doc/api/ru/resource/BannerFormats
 */
class BannerFormats extends Resource
{
    /**
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', 'banner_formats');
    }
}