<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 21:23
 */

namespace kradwhite\myTarget\api\resources\users;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий собрать основную информацию о пользователе
 * Class User
 * @package kradwhite\myTarget\api\methods\users
 * @see https://target.my.com/doc/api/ru/resource/User
 */
class User extends Resource
{
    /**
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', 'user');
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function post(array $params)
    {
        return $this->request('post', 'user', ['json' => $params]);
    }
}