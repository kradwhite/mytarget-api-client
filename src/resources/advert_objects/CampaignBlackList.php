<?php
/**
 * User: Aleksandrov Artem
 * Date: 21.10.2019
 * Time: 8:03
 */

namespace kradwhite\myTarget\api\resources\advert_objects;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, представляющий возможность редактировать и удалять списки запрещенных url адресов или мобильных
 * приложений. Эти списки могут использоваться для запрета показа объявлений на входящих в список доменах
 * или мобильных приложениях.
 * Class CampaignBlackList
 * @package kradwhite\myTarget\api\methods\advert_objects
 * @see https://target.my.com/doc/api/ru/resource/CampaignBlackList
 */
class CampaignBlackList extends Resource
{
    /**
     * Редактирование списка запрещенных url адресов или мобильных приложений пользователя
     * @param string $blacklist_id
     * @param array $params
     * @return mixed
     */
    public function post(string $blacklist_id, array $params)
    {
        return $this->request('post', "place_black_lists/$blacklist_id", ['json' => $params]);
    }

    /**
     * Удаление списка запрещенных url адресов и мобильных приложений пользователя
     * @param string $blacklist_id
     * @return mixed
     */
    public function delete(string $blacklist_id)
    {
        return $this->request('delete', "place_black_lists/$blacklist_id");
    }
}