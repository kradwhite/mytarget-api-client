<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 19:00
 */

namespace kradwhite\myTarget\api\resources\users;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс позволяет управлять учетными записями клиентов агентства
 * Class AgencyClient
 * @package kradwhite\myTarget\api\methods\users
 * @see https://target.my.com/doc/api/ru/resource/AgencyClient
 */
class AgencyClient extends Resource
{
    /**
     * Запрос редактирует данные и права доступа клиента агентства
     * @param string $id
     * @param array $params
     * @return mixed
     */
    public function post(string $id, array $params)
    {
        return $this->request('post', "agency/clients/$id", ['json' => $params]);
    }

    /**
     * Запрос выводит клиента (удаляет) из ведома агентства. Операцию можно произвести только с учетной записью
     * клиента, где баланс меньше или равен нулю и используемая валюта совпадать с валютой агентства (User.currency).
     * Операция не приводит к удалению учетной записи клиента из системы myTarget.
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->request('delete', "agency/clients/$id");
    }
}