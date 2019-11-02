<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 18:36
 */

namespace kradwhite\myTarget\api\resources\partner_platforms;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий читать/редактировать рекламную площадку
 * Class GroupPad
 * @package kradwhite\myTarget\api\methods\partner_platforms
 * @see https://target.my.com/doc/api/ru/resource/GroupPad
 */
class GroupPad extends Resource
{
    /**
     * Запрос возвращает данные указанной площадки
     * @param string $id
     * @return mixed
     */
    public function get(string $id)
    {
        return $this->request('get', "group_pads/$id");
    }

    /**
     * Позволяет менять данные указанной площадки
     * @param string $id
     * @param array $params
     * @return mixed
     */
    public function post(string $id, array $params)
    {
        return $this->request('post', "group_pads/$id", ['json' => $params]);
    }
}