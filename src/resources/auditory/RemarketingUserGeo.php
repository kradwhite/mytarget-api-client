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
 * Class RemarketingUserGeo
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/RemarketingUserGeo
 */
class RemarketingUserGeo extends Resource
{
    /**
     * Запрос возвращает список списков регионов, указанных пользователями
     * @param string $fields
     * @return mixed
     */
    public function get(string $fields = "")
    {
        $query = $fields ? ['fields' => $fields] : [];
        return $this->request('get', 'remarketing/user_geo', ['query' => $query]);
    }

    /**
     * Запрос создает список регионов, указанных пользователями
     * @param array $params
     * @param string $fields
     * @return mixed
     */
    public function post(array $params, string $fields = '')
    {
        $query = $fields ? ['fields' => $fields] : [];
        return $this->request('post', 'remarketing/user_geo', ['query' => $query, 'json' => $params]);
    }
}