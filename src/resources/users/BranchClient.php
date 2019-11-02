<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 21:01
 */

namespace kradwhite\myTarget\api\resources\users;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс позволяет управлять учетными записями клиентов представительства
 * Class BranchClient
 * @package kradwhite\myTarget\api\methods\users
 * @see https://target.my.com/doc/api/ru/resource/BranchClient
 */
class BranchClient extends Resource
{
    /**
     * Запрос редактирует данные клиента, находящегося в ведении представительства
     * @param string $id
     * @param array $params
     * @return mixed
     */
    public function post(string $id, array $params)
    {
        return $this->request('post', "branch/clients/$id", ['json' => $params]);
    }
}