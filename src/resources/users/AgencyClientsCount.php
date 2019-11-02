<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 19:14
 */

namespace kradwhite\myTarget\api\resources\users;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс позволяет получить данные о количестве клиентов агентства с определенным статусом
 * Class AgencyClientsCount
 * @package kradwhite\myTarget\api\methods\users
 * @see https://target.my.com/doc/api/ru/resource/AgencyClientsCount
 */
class AgencyClientsCount extends Resource
{
    /**
     * Запрос возвращает список возможных статусов и количество клиентов в каждом из них
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', 'agency/clients/count');
    }
}