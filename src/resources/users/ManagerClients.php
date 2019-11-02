<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 21:18
 */

namespace kradwhite\myTarget\api\resources\users;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс для получения информации о клиентах менеджера
 * Class ManagerClients
 * @package kradwhite\myTarget\api\methods\users
 * @see https://target.my.com/doc/api/ru/resource/ManagerClients
 */
class ManagerClients extends Resource
{
    /**
     * Возвращает список всех клиентов, находящихся в ведении менеджера
     * @param array $filters
     * @return mixed
     */
    public function get(array $filters = [])
    {
        return $this->request('get', '/api/v3/manager/clients', ['query' => $filters]);
    }
}