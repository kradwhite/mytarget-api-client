<?php
/**
 * User: Aleksandrov Artem
 * Date: 21.10.2019
 * Time: 9:12
 */

namespace kradwhite\myTarget\api\resources\finance;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс выполняет перевод средств между агентством и его клиентом
 * Class Transaction
 * @package kradwhite\myTarget\api\methods\finance
 * @see https://target.my.com/doc/api/ru/resource/Transaction
 */
class Transaction extends Resource
{
    /**
     * @param string $mode
     * @param string $user_id
     * @param string $amount
     * @return mixed
     */
    public function post(string $mode, string $user_id, string $amount)
    {
        return $this->request('post', "billing/transactions/$mode/$user_id", ['json' => ['amount' => $amount]]);
    }
}