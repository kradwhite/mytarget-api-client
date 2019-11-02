<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 21:04
 */

namespace kradwhite\myTarget\api\resources\users;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс позволяет получить информацию о существующих клиентах представительства и создать новых
 * Class BranchClients
 * @package kradwhite\myTarget\api\methods\users
 * @see https://target.my.com/doc/api/ru/resource/BranchClients
 */
class BranchClients extends Resource
{
    /**
     * Возвращает список всех клиентов, находящихся в ведении представительства
     * @param array $filters
     * @return mixed
     */
    public function get(array $filters = [])
    {
        return $this->request('get', 'branch/clients', ['query' => $filters]);
    }

    /**
     * Запрос создает нового клиента в списке клиентов, находящихся в ведении представительства
     * @param array $params
     * @return mixed
     */
    public function post(array $params)
    {
        return $this->request('post', 'branch/clients', ['json' => $params]);
    }
}