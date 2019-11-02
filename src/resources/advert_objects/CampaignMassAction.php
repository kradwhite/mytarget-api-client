<?php
/**
 * User: Aleksandrov Artem
 * Date: 21.10.2019
 * Time: 8:11
 */

namespace kradwhite\myTarget\api\resources\advert_objects;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий массово обновлять данные кампании (не более 200 кампаний за раз). Обновление происходит
 * транзакционно: при возникновении ошибки обновления хотя бы одной кампании ни одно изменение не применится
 * Class CampaignMassAction
 * @package kradwhite\myTarget\api\methods\advert_objects
 * @see https://target.my.com/doc/api/ru/resource/CampaignMassAction
 */
class CampaignMassAction extends Resource
{
    /**
     * @param array $params
     * @return mixed
     */
    public function post(array $params)
    {
        return $this->request('post', 'campaigns/mass_action', ['json' => $params]);
    }
}