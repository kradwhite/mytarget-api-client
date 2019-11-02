<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий управлять сегментами аудитории
 * Class Segments
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/Segments
 */
class Segments extends Resource
{
    /**
     * Запрос возвращает список всех сегментов аудитории, созданных пользователем
     * @param array $params
     * @return mixed
     */
    public function get(array $params = [])
    {
        return $this->request('get', 'remarketing/segments', ['query' => $params]);
    }

    /**
     * Запрос создает сегмент аудитории
     * @param array $params
     * @return mixed
     */
    public function post(array $params)
    {
        return $this->request('post', 'remarketing/segments', ['json' => $params]);
    }
}