<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 21:16
 */

namespace kradwhite\myTarget\api\resources\users;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс позволяет управлять учетными записями клиентов менеджера
 * Class ManagerClient
 * @package kradwhite\myTarget\api\methods\users
 * @see https://target.my.com/doc/api/ru/resource/ManagerClient
 */
class ManagerClient extends Resource
{
    /**
     * Запрос редактирует данные клиента, находящегося в ведении менеджера
     * @param string $client_id
     * @param array $params
     * @return mixed
     */
    public function post(string $client_id, array $params)
    {
        return $this->request('post', "/api/v3/manager/clients/$client_id", ['json' => $params]);
    }
}