<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 18:18
 */

namespace kradwhite\myTarget\api\resources\partner_platforms;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий читать/создавать рекламные площадки
 * Class GroupPads
 * @package kradwhite\myTarget\api\methods\partner_platforms
 * @see https://target.my.com/doc/api/ru/resource/GroupPads
 */
class GroupPads extends Resource
{
    /**
     * Запрос возвращает данные по всем или указанным площадкам пользователя.
     * Метод поддерживает постраничный вывод данных
     * @param string $ids
     * @param array $filters
     * @return mixed
     */
    public function get(string $ids = "", array $filters = [])
    {
        $ids = $ids ? "/$ids" : "";
        return $this->request('get', "group_pads$ids", ['query' => $filters]);
    }

    /**
     * Запрос создает площадку с переданным набором данных
     * @param array $params
     * @return mixed
     */
    public function post(array $params)
    {
        return $this->request('post', 'group_pads', ['json' => $params]);
    }
}