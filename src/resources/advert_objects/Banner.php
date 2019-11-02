<?php
/**
 * User: Aleksandrov Artem
 * Date: 21.10.2019
 * Time: 7:47
 */

namespace kradwhite\myTarget\api\resources\advert_objects;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий получать, обновлять и удалять рекламные объявления. Создание баннеров осуществляется
 * с помощью ресурса CampaignBanners.
 * Class Banner
 * @package kradwhite\myTarget\api\methods\advert_objects
 * @see https://target.my.com/doc/api/ru/resource/Banner
 */
class Banner extends Resource
{
    /**
     * Получение одного рекламного объявления
     * @param string $banner_id
     * @return mixed
     */
    public function get(string $banner_id)
    {
        return $this->request('get', "banners/$banner_id");
    }

    /**
     * Редактирование рекламного объявления
     * @param string $banner_id
     * @param array $params
     * @return mixed
     */
    public function post(string $banner_id, array $params)
    {
        return $this->request('post', "banners/$banner_id", ['json' => $params]);
    }

    /**
     * Удаление рекламного объявления
     * @param string $banner_id
     * @return mixed
     */
    public function delete(string $banner_id)
    {
        return $this->request('delete', "banners/$banner_id");
    }
}