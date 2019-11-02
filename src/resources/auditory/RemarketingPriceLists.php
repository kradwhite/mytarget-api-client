<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий управлять прайс-листами динамического ремаркетинга. Такие прайс-листы позволяют автоматически
 * создавать объявления для рекламирования определенных товаров или услуг пользователям, которые ранее просматривали
 * страницы вашего сайта, посвященные этим товарам или услугам
 * Class RemarketingPriceLists
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/RemarketingPricelists
 */
class RemarketingPriceLists extends Resource
{
    /**
     * Запрос возвращает список всех прайс-листов, добавленных пользователем в источники данных
     * @param array $params
     * @return mixed
     */
    public function get(array $params = [])
    {
        return $this->request('get', 'remarketing/pricelists', ['query' => $params]);
    }

    /**
     * Запрос добавляет прайс-лист в список доступных источников данных.
     * Формат прайс-листа описан здесь: https://target.my.com/adv/help/dynamic_remarketing/
     * @param array $params
     * @return mixed
     */
    public function post(array $params)
    {
        return $this->request('post', 'remarketing/pricelists', ['json' => $params]);
    }
}