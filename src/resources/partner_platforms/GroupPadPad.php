<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 18:42
 */

namespace kradwhite\myTarget\api\resources\partner_platforms;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий читать/редактировать блок рекламной площадки
 * Class GroupPadPad
 * @package kradwhite\myTarget\api\methods\partner_platforms
 * @see https://target.my.com/doc/api/ru/resource/GroupPadPad
 */
class GroupPadPad extends Resource
{
    /**
     * Запрос возвращает данные указанного блока для конкретной площадки
     * @param string $group_pad_id
     * @param string $id
     * @return mixed
     */
    public function get(string $group_pad_id, string $id)
    {
        return $this->request('get', "group_pads/$group_pad_id/pads/$id");
    }

    /**
     * Запрос изменяет данные указанного блока для конкретной площадки
     * @param string $group_pad_id
     * @param string $id
     * @param array $params
     * @return mixed
     */
    public function post(string $group_pad_id, string $id, array $params)
    {
        return $this->request('post', "group_pads/$group_pad_id/pads/$id", ['json' => $params]);
    }
}