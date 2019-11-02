<?php
/**
 * User: Aleksandrov Artem
 * Date: 26.10.2019
 * Time: 14:27
 */

namespace kradwhite\myTarget\api\resources\contextual_targeting;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Список поисковых фраз
 * Class SearchPhrases
 * @package kradwhite\myTarget\api\methods\contextual_targeting
 * @see https://target.my.com/adv/api-marketing/doc/context_targeting
 */
class SearchPhrasesList extends Resource
{
    /**
     * Посмотреть поисковые фразы
     * @param string $id
     * @return mixed
     */
    public function get(string $id)
    {
        return $this->request('get', "search_phrases/$id");
    }

    /**
     * Переименовать поисковые фразы
     * @param string $id
     * @param string $name
     * @return mixed
     */
    public function post(string $id, string $name)
    {
        return $this->request('post', "search_phrases/$id/rename", ['form_params' => ['name' => $name]]);
    }

    /**
     * Изменить поисковые фразы
     * @param string $id
     * @param string $sources_ids_list
     * @return mixed
     */
    public function put(string $id, string $sources_ids_list)
    {
        return $this->request('put', "search_phrases/$id", ['form_params' => ['sources_ids_list' => $sources_ids_list]]);
    }

    /**
     * Удалить поисковые фразы
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->request('delete', "search_phrases/$id");
    }
}