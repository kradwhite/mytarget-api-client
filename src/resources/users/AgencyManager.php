<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 19:16
 */

namespace kradwhite\myTarget\api\resources\users;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс позволяет управлять учетными записями менеджеров агентства
 * Class AgencyManager
 * @package kradwhite\myTarget\api\methods\users
 * @see https://target.my.com/doc/api/ru/resource/AgencyManager
 */
class AgencyManager extends Resource
{
    /**
     * Запрос редактирует данные менеджера, находящегося в ведении агентства
     * @param string $manager_id
     * @param array $params
     * @return mixed
     */
    public function post(string $manager_id, array $params)
    {
        return $this->request('post', "agency/managers/$manager_id", ['json' => $params]);
    }

    /**
     * Запрос удаляет учетную запись менеджера из ведения агентства. Операция не приводит к удалению учетной
     * записи из системы myTarget.
     * @param string $manager_id
     * @return mixed
     */
    public function delete(string $manager_id)
    {
        return $this->request('delete', "agency/managers/$manager_id");
    }
}