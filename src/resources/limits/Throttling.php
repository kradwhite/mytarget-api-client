<?php
/**
 * User: Aleksandrov Artem
 * Date: 25.01.2020
 * Time: 14:59
 */

namespace kradwhite\myTarget\api\resources\limits;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Информацию о лимитах для конкретного пользователя
 * Class Throttling
 * @package kradwhite\myTarget\api\resources\limits
 */
class Throttling extends Resource
{
    /**
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', 'throttling');
    }
}