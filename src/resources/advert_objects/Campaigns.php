<?php
/**
 * User: Aleksandrov Artem
 * Date: 21.10.2019
 * Time: 8:15
 */

namespace kradwhite\myTarget\api\resources\advert_objects;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий создать новую или получить список существующих рекламных кампаний
 * Class Campaigns
 * @package kradwhite\myTarget\api\methods\advert_objects
 * @see https://target.my.com/doc/api/ru/resource/Campaigns
 */
class Campaigns extends Resource
{
    /**
     * Получение списка рекламных кампании
     * @param array $query
     * @return mixed
     */
    public function get(array $query = [])
    {
        return $this->request('get', 'campaigns', ['query' => $query]);
    }

    /**
     * Создание рекламной кампании
     * @param array $params
     * @return mixed
     */
    public function post(array $params)
    {
        return $this->request('post', 'campaigns', ['json' => $params]);
    }
}