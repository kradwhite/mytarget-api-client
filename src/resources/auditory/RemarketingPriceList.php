<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий управлять прайс-листом динамического ремаркетинга. Такие прайс-листы позволяют автоматически
 * создавать объявления для рекламирования определенных товаров или услуг пользователям, которые ранее просматривали
 * страницы вашего сайта, посвященные этим товарам или услугам
 * Class RemarketingPriceList
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/RemarketingPricelist
 */
class RemarketingPriceList extends Resource
{
    /**
     * Запрос возвращает данные об указанном прайс-листе
     * @param string $id
     * @return mixed
     */
    public function get(string $id)
    {
        return $this->request('get', "remarketing/pricelists/$id");
    }

    /**
     * Запрос изменяет параметры указанного прайс-листа
     * @param string $id
     * @param array $params
     * @return mixed
     */
    public function post(string $id, array $params)
    {
        return $this->request('post', "remarketing/pricelists/$id", ['json' => $params]);
    }

    /**
     * Запрос удаляет прайс-лист из доступных источников данных. Удаление возможно только если прайс-лист
     * не используется ни в одной аудитории.
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->request('delete', "remarketing/pricelists/$id");
    }
}