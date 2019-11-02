<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 19:31
 */

namespace kradwhite\myTarget\api\resources\users;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс позволяет получить информацию о менеджерах агентства и создать нового менеджера
 * Class AgencyManagers
 * @package kradwhite\myTarget\api\methods\users
 * @see https://target.my.com/doc/api/ru/resource/AgencyManagers
 */
class AgencyManagers extends Resource
{
    /**
     * Запрос возвращает список всех менеджеров, находящихся в ведении агентства
     * @param array $filters
     * @return mixed
     */
    public function get(array $filters = [])
    {
        return $this->request('get', 'agency/managers', ['query' => $filters]);
    }

    /**
     * Запрос добавляет существующего пользователя в список менеджеров, находящихся в ведении агентства
     * @param array $params
     * @return mixed
     */
    public function post(array $params)
    {
        return $this->request('post', 'agency/managers', ['json' => $params]);
    }
}