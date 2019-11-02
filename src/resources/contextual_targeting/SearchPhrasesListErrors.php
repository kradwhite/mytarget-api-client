<?php
/**
 * User: Aleksandrov Artem
 * Date: 26.10.2019
 * Time: 14:44
 */

namespace kradwhite\myTarget\api\resources\contextual_targeting;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Посмотреть ошибки
 * Class SearchPhrasesListErrors
 * @package kradwhite\myTarget\api\methods\contextual_targeting
 * @see https://target.my.com/adv/api-marketing/doc/context_targeting
 */
class SearchPhrasesListErrors extends Resource
{
    /**
     * @param string $id
     * @return mixed
     */
    public function get(string $id)
    {
        return $this->request('get', "search_phrases/$id", ['query' => ['errors' => 1]]);
    }
}