<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий управлять списками пользователей. Такие списки используются для настройки таргетинга
 * на аудиторию пользователей, полученную из внешнего источника.
 * Class RemarketingUsersLists
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/RemarketingUsersLists
 */
class RemarketingUsersLists extends Resource
{
    /**
     * Запрос возвращает все загруженные пользователем списки пользователей
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', 'remarketing/users_lists');
    }

    /**
     * Запрос загружает список пользователей в список источников данных для ремаркетинга. В случае успешного
     * добавления возвращается объект типа RemarketingUsersList
     * @param string $file
     * @param array $data
     * @return mixed
     */
    public function post(string $file, array $data)
    {
        return $this->request(
            'post',
            'remarketing/users_lists',
            ['multipart' => [
                ['name' => 'file', 'contents' => $file],
                ['name' => 'data', 'contents' => json_encode($data)]
            ]]
        );
    }
}