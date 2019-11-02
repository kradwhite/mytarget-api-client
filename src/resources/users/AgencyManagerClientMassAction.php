<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 19:25
 */

namespace kradwhite\myTarget\api\resources\users;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс позволяет массово привязать существующих клиентов агентства к менеджеру
 * Class AgencyManagerClientMassAction
 * @package kradwhite\myTarget\api\methods\users
 * @see https://target.my.com/doc/api/ru/resource/AgencyManagerClientMassAction
 */
class AgencyManagerClientMassAction extends Resource
{
    /**
     * Запрос добавляет существующих пользователей в список клиентов, находящихся в ведении менеджера
     * @param string $manager_id
     * @param array $params
     * @return mixed
     */
    public function post(string $manager_id, array $params)
    {
        return $this->request('post', "agency/managers/$manager_id/clients/mass_action", ['json' => $params]);
    }
}