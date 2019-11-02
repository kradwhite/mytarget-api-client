<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий управлять группой или тематикой в соцсети Одноклассники, которую пользователь добавил
 * в доступные для использования в целевых аудиториях источники данных. Группы и тематики можно использовать
 * для настройки таргетинга на пользователей, состоящих в них.
 * Class RemarketingOkGroup
 * @see https://target.my.com/doc/api/ru/resource/RemarketingOkGroup
 * @package kradwhite\myTarget\api\methods\auditory
 */
class RemarketingOkGroup extends Resource
{
    /**
     * Запрос удаляет группу или тематику из доступных источников данных. Удаление возможно только
     * если группа или тематика не используется ни в одной аудитории.
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->request('delete', "remarketing/ok_groups/$id");
    }
}