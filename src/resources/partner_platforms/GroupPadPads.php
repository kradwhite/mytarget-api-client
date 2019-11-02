<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 18:47
 */

namespace kradwhite\myTarget\api\resources\partner_platforms;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий создавать блок рекламной площадки
 * Class GroupPadPads
 * @package kradwhite\myTarget\api\methods\partner_platforms
 * @see https://target.my.com/doc/api/ru/resource/GroupPadPads
 */
class GroupPadPads extends Resource
{
    /**
     * Запрос возвращает на указанной площадке блок
     * @param string $group_pad_id
     * @return mixed
     */
    public function get(string $group_pad_id)
    {
        return $this->request('get', "group_pads/$group_pad_id/pads");
    }

    /**
     * Запрос создает на указанной площадке блок с переданным набором данных
     * @param string $group_pad_id
     * @param array $params
     * @return mixed
     */
    public function post(string $group_pad_id, array $params)
    {
        return $this->request('post', "group_pads/$group_pad_id/pads", ['json' => $params]);
    }
}