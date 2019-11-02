<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий управлять группой в соцсети ВКонтакте, которую пользователь добавил в доступные
 * для использования в целевых аудиториях источники данных. Группы можно использовать для настройки
 * таргетинга на их участников
 * Class RemarketingVkGroup
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/RemarketingVkGroup
 */
class RemarketingVkGroup extends Resource
{
    /**
     * Запрос удаляет группу из доступных источников данных. Удаление возможно только если группа
     * не используется ни в одной аудитории.
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->request('delete', "remarketing/vk_groups/$id");
    }
}