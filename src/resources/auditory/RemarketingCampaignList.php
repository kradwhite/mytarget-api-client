<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий управлять списком рекламных кампаний. Такие списки используются для настройки
 * таргетинга на пользователей, которые видели или кликали по баннерам кампаний из списка
 * Class RemarketingCampaignList
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/RemarketingCampaignList
 */
class RemarketingCampaignList extends Resource
{
    /**
     * Запрос изменяет указанный список кампаний
     * @param $id
     * @param array $params
     * @return mixed
     */
    public function post($id, array $params)
    {
        return $this->request('post', "remarketing/campaign_lists/$id", ['json' => $params]);
    }

    /**
     * Запрос удаляет указанный список кампаний из доступных источников данных пользователя. Удаление возможно
     * только если список не используется ни в одной аудитории
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->request('delete', "remarketing/campaign_lists/$id");
    }
}