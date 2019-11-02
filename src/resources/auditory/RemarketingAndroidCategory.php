<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий управлять категорией приложений Android, добавленной пользователем в источники данных
 * для целевых аудиторий. Категории можно использовать для настройки таргетинга на пользователей соответствующих
 * приложений. Список всех доступных категорий и их ID можно получить из API MobileCategory.
 * Class RemarketingAndroidCategory
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/RemarketingAndroidCategory
 */
class RemarketingAndroidCategory extends Resource
{
    /**
     * Запрос удаляет категорию приложений Android из доступных источников данных. Удаление возможно только
     * если категория не используется ни в одной аудитории или сегменте
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->request('delete', "remarketing/android_categories/$id");
    }
}