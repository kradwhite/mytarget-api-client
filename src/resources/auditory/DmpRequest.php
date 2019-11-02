<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс позволяет отправить запрос партнерскому DMP на предоставление доступа к сегменту аудитории.
 * Доступно если партнерский DMP поддерживает такую возможность
 * Class DmpRequest
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/DmpRequest
 */
class DmpRequest extends Resource
{
    /**
     * Запрос передает партнерскому DMP запрос на предоставление доступа к сегменту аудитории
     * @param array $params
     * @return mixed
     */
    public function post(array $params)
    {
        return $this->request('post', 'dmp/requests', ['json' => $params]);
    }
}