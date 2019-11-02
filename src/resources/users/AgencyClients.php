<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 19:09
 */

namespace kradwhite\myTarget\api\resources\users;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс позволяет получить информацию о существующих клиентах агентства и создать новых
 * Class AgencyClients
 * @package kradwhite\myTarget\api\methods\users
 * @see https://target.my.com/doc/api/ru/resource/AgencyClients
 */
class AgencyClients extends Resource
{
    /**
     * Запрос возвращает список всех клиентов, находящихся в ведении агентства
     * @param array $filters
     * @return mixed
     */
    public function get(array $filters = [])
    {
        return $this->request('get', 'agency/clients', ['query' => $filters]);
    }

    /**
     * Запрос создает нового клиента или добавляет существующего в список клиентов, находящихся в ведении агентства.
     * @param array $params
     * @return mixed
     */
    public function post(array $params)
    {
        return $this->request('post', 'agency/clients', ['json' => $params]);
    }
}