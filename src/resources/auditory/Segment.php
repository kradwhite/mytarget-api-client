<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий управлять сегментом аудитории
 * Class Segment
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/Segment
 */
class Segment extends Resource
{
    /**
     * Запрос возвращает информацию о сегменте аудитории
     * @param string $id
     * @return mixed
     */
    public function get(string $id)
    {
        return $this->request('get', "remarketing/segments/$id");
    }

    /**
     * Запрос изменяет параметры сегмента аудитории
     * @param string $id
     * @param array $params
     * @return mixed
     */
    public function post(string $id, array $params)
    {
        return $this->request('post', "remarketing/segments/$id", ['json' => $params]);
    }

    /**
     * Запрос удаляет сегмент аудитории. Удаление возможно только если сегмент не используется ни в одной
     * кампании и не вложен в другие сегменты.
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->request('delete', "remarketing/segments/$id");
    }
}