<?php
/**
 * User: Aleksandrov Artem
 * Date: 21.10.2019
 * Time: 9:07
 */

namespace kradwhite\myTarget\api\resources\references;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий получить информацию о VK группах. Возвращаются все группы, аудитория которых
 * не менее 1000 пользователей
 * Class VkGroup
 * @package kradwhite\myTarget\api\methods\references
 * @see https://target.my.com/doc/api/ru/resource/VkGroup
 */
class VkGroup extends Resource
{
    /**
     * @param string $_q
     * @return mixed
     */
    public function get(string $_q)
    {
        return $this->request('get', 'vk_groups', ['query' => ['_q' => $_q]]);
    }
}