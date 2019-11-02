<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, предоставляющий информацию об охвате пользователей в заданной географической области
 * Class GeoCoverage
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/GeoCoverage
 */
class GeoCoverage extends Resource
{
    /**
     * Предоставляет информацию об охвате пользователей по текущим позициям
     * @param array $params
     * @return mixed
     */
    public function post(array $params)
    {
        return $this->request('post', 'geo/coverage', ['json' => $params]);
    }
}