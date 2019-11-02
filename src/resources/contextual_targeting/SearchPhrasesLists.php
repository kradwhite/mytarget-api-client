<?php
/**
 * User: Aleksandrov Artem
 * Date: 26.10.2019
 * Time: 9:59
 */

namespace kradwhite\myTarget\api\resources\contextual_targeting;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Списки поисковых фраз
 * Class SearchPhrases
 * @package kradwhite\myTarget\api\methods\contextual_targeting
 * @see https://target.my.com/adv/api-marketing/doc/context_targeting
 */
class SearchPhrasesLists extends Resource
{
    /**
     * Создать список поисковых фраз
     * @param string $name
     * @param string $sources_ids_list
     * @param string $X_Trg_User_Id
     * @return mixed
     */
    public function post(string $name, string $sources_ids_list, string $X_Trg_User_Id)
    {
        return $this->request(
            'post',
            "search_phrases",
            [
                'form_params' => ['name' => $name, 'sources_ids_list' => $sources_ids_list],
                'headers' => ['X-Trg-User-Id' => $X_Trg_User_Id]
            ]
        );
    }

    /**
     * Посмотреть все списки поисковых фраз
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', "search_phrases");
    }
}