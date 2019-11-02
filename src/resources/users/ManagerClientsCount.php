<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 21:20
 */

namespace kradwhite\myTarget\api\resources\users;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс позволяет получить данные о количестве клиентов менеджера с определенным статусом
 * Class ManagerClientsCount
 * @package kradwhite\myTarget\api\methods\users
 * @see https://target.my.com/doc/api/ru/resource/ManagerClientsCount
 */
class ManagerClientsCount extends Resource
{
    /**
     * Запрос возвращает список возможных статусов и количество клиентов в каждом из них
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', 'manager/clients/count');
    }
}