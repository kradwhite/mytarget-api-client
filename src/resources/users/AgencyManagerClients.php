<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 19:28
 */

namespace kradwhite\myTarget\api\resources\users;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс позволяет получить информацию о клиентах менеджера и передать существующего клиента агентства менеджеру
 * Class AgencyManagerClients
 * @package kradwhite\myTarget\api\methods\users
 * @see https://target.my.com/doc/api/ru/resource/AgencyManagerClients
 */
class AgencyManagerClients extends Resource
{
    /**
     * Запрос возвращает список всех клиентов, находящихся в ведении менеджера
     * @param string $manager_id
     * @param array $filters
     * @return mixed
     */
    public function get(string $manager_id, array $filters = [])
    {
        return $this->request('get', "agency/managers/$manager_id/clients", ['query' => $filters]);
    }

    /**
     * Запрос добавляет существующего пользователя в список клиентов, находящихся в ведении менеджера
     * @param string $manager_id
     * @param array $params
     * @return mixed
     */
    public function post(string $manager_id, array $params)
    {
        return $this->request('post', "agency/managers/$manager_id/clients", ['json' => $params]);
    }

    /**
     * Удаляет всех клиентов из ведения менеджера. Удаление не приводит к полному удалению учетной записи
     * клиента или удалению клиента из ведома агентства.
     * @param string $manager_id
     * @return mixed
     */
    public function delete(string $manager_id)
    {
        return $this->request('delete', "agency/managers/$manager_id/clients");
    }
}