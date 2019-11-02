<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий управлять списками регионов, указанных пользователями. После создания списков их можно
 * включить в аудиторию, которую можно включить в таргетинг кампании.
 * Class RemarketingUserGeos
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/RemarketingUserGeos
 */
class RemarketingUserGeos extends Resource
{
    /**
     * Запрос возвращает указанный список пользовательский географии
     * @param string $id
     * @param string $fields
     * @return mixed
     */
    public function get(string $id, string $fields = "")
    {
        $query = $fields ? ['fields' => $fields] : [];
        return $this->request('get', "remarketing/user_geo/$id", ['query' => $query]);
    }

    /**
     * Запрос изменяет список регионов, указанных пользователями
     * @param string $id
     * @param array $params
     * @param string $fields
     * @return mixed
     */
    public function post(string $id, array $params, string $fields = "")
    {
        $query = $fields ? ['fields' => $fields] : [];
        return $this->request('post', "remarketing/user_geo/$id", ['query' => $query, 'json' => $params]);
    }

    /**
     * Запрос удаляет список регионов, указанных пользователями
     * @param string $id
     * @param string $fields
     * @return mixed
     */
    public function delete(string $id, string $fields = "")
    {
        $query = $fields ? ['fields' => $fields] : [];
        return $this->request('delete', "remarketing/user_geo/$id", ['query' => $query]);
    }
}