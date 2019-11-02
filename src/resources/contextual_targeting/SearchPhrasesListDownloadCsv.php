<?php
/**
 * User: Aleksandrov Artem
 * Date: 26.10.2019
 * Time: 14:48
 */

namespace kradwhite\myTarget\api\resources\contextual_targeting;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Скачать исходный csv-файл
 * Class SearchPhrasesListDownloadCsv
 * @package kradwhite\myTarget\api\methods\contextual_targeting
 * @see https://target.my.com/adv/api-marketing/doc/context_targeting
 */
class SearchPhrasesListDownloadCsv extends Resource
{
    /**
     * @param string $id
     * @return mixed
     */
    public function get(string $id)
    {
        return $this->request('get', "search_phrases/$id", [], ".csv");
    }
}