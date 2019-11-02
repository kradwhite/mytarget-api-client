<?php
/**
 * User: Aleksandrov Artem
 * Date: 21.10.2019
 * Time: 7:57
 */

namespace kradwhite\myTarget\api\resources\advert_objects;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс позволяющий получить/редактировать одну рекламную кампанию
 * Class Campaign
 * @package kradwhite\myTarget\api\methods\advert_objects
 * @see https://target.my.com/doc/api/ru/resource/Campaign
 */
class Campaign extends Resource
{
    /**
     * Получение одной рекламной кампании
     * @param string $campaign_id
     * @param string $fields
     * @return mixed
     */
    public function get(string $campaign_id, string $fields = "")
    {
        $query = $fields ? ['fields' => $fields] : [];
        return $this->request('get', "campaigns/$campaign_id", ['query' => $query]);
    }

    /**
     * Редактирование рекламной кампании
     * @param string $campaign_id
     * @param array $params
     * @return mixed
     */
    public function post(string $campaign_id, array $params)
    {
        return $this->request('post', "campaigns/$campaign_id", ['json' => $params]);
    }

    /**
     * Удаление рекламной кампании
     * @param string $campaign_id
     * @return mixed
     */
    public function delete(string $campaign_id)
    {
        return $this->request('delete', "campaigns/$campaign_id");
    }
}