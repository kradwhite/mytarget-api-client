<?php
/**
 * User: Aleksandrov Artem
 * Date: 21.10.2019
 * Time: 8:31
 */

namespace kradwhite\myTarget\api\resources\advert_objects;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий собрать информацию о полном дереве интересов пользователей. Отдельные интересы могут
 * быть доступны не во всех пакетах.
 * Class TargetingsTree
 * @package kradwhite\myTarget\api\methods\advert_objects
 * @see https://target.my.com/doc/api/ru/resource/TargetingsTree
 */
class TargetingsTree extends Resource
{
    /**
     * @param string $targetings
     * @return mixed
     */
    public function get(string $targetings = "")
    {
        $query = $targetings ? ['targetings' => $targetings] : [];
        return $this->request('get', 'targetings_tree', ['query' => $query]);
    }
}