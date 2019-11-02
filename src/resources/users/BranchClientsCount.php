<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 21:15
 */

namespace kradwhite\myTarget\api\resources\users;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс позволяет получить данные о количестве клиентов представительства с определенным статусом
 * Class BranchClientsCount
 * @package kradwhite\myTarget\api\methods\users
 * @see https://target.my.com/doc/api/ru/resource/BranchClientsCount
 */
class BranchClientsCount extends Resource
{
    /**
     * Запрос возвращает список возможных статусов и количество клиентов в каждом из них
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', 'branch/clients/count');
    }
}