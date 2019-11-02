<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий управлять списком пользователей. Такие списки используются для настройки таргетинга
 * на аудиторию, полученную из внешнего источника
 * Class RemarketingUsersList
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/RemarketingUsersList
 */
class RemarketingUsersList extends Resource
{
    /**
     * Возвращает загруженный пользователем список пользователей
     * @param string $id
     * @return mixed
     */
    public function get(string $id)
    {
        return $this->request('get', "remarketing/users_lists/$id");
    }

    /**
     * Запрос изменяет имя списка пользователей
     * @param string $id
     * @param array $params
     * @return mixed
     */
    public function post(string $id, array $params)
    {
        return $this->request('post', "remarketing/users_lists/$id", ['json' => $params]);
    }

    /**
     * Запрос удаляет указанный список пользователей из доступных источников данных. Удаление возможно только
     * если список не используется ни в одной аудитории и на основе него не создано ни одно lookalike-расширение
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->request('delete', "remarketing/users_lists/$id");
    }
}