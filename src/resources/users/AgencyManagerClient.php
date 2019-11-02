<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 19:18
 */

namespace kradwhite\myTarget\api\resources\users;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс позволяет управлять учетными записями клиентов, находящихся в ведении менеджера агентства
 * Class AgencyManagerClient
 * @package kradwhite\myTarget\api\methods\users
 * @see https://target.my.com/doc/api/ru/resource/AgencyManagerClient
 */
class AgencyManagerClient extends Resource
{
    /**
     * Запрос редактирует данные и права доступ клиента, находящегося в ведении менеджера
     * @param string $manager_id
     * @param string $client_id
     * @param array $params
     * @return mixed
     */
    public function post(string $manager_id, string $client_id, array $params)
    {
        return $this->request('post', "agency/managers/$manager_id/clients/$client_id", ['json' => $params]);
    }

    /**
     * Запрос выводит клиента (удаляет) из ведения менеджера. Операция не приводит к полному удалению учетной
     * записи клиента или выведению клиента из ведома агентства.
     * @param string $manager_id
     * @param string $client_id
     * @return mixed
     */
    public function delete(string $manager_id, string $client_id)
    {
        return $this->request('delete', "agency/managers/$manager_id/clients/$client_id");
    }
}