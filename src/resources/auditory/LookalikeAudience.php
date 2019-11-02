<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий управлять lookalike-аудиторией, созданной на основе источника данных: списке пользователей
 * любого типа или счетчике Top@Mail.ru. Такие аудитории позволяют настроить таргетинг на пользователей,
 * по многим параметрам похожих на уже существующих в исходной аудитории
 * Class LookalikeAudience
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/LookalikeAudience
 */
class LookalikeAudience extends Resource
{
    /**
     * Запрос возвращает данные об указанной lookalike-аудитории
     * @param string $id
     * @return mixed
     */
    public function get(string $id)
    {
        return $this->request('get', "remarketing/lookalike_audiences/$id");
    }

    /**
     * Запрос изменяет параметры указанной lookalike-аудитории или восстанавливает её из архива
     * @param string $id
     * @param array $params
     * @return mixed
     */
    public function post(string $id, array $params)
    {
        return $this->request('post', "remarketing/lookalike_audiences/$id", ['json' => $params]);
    }

    /**
     * Запрос удаляет lookalike-аудиторию из доступных источников данных. Удаление возможно только если lookalike
     * не используется ни в одной ремаркетинговой аудитории
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->request('delete', "remarketing/lookalike_audiences/$id");
    }
}