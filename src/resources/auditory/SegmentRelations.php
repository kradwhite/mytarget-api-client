<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий управлять источниками данных, входящими в сегмент аудитории
 * Class SegmentRelations
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/SegmentRelations
 */
class SegmentRelations extends Resource
{
    /**
     * Запрос возвращает информацию об источниках данных в сегменте аудитории
     * @param string $segment_id
     * @param string $fields
     * @return mixed
     */
    public function get(string $segment_id, string $fields = "")
    {
        $query = $fields ? ['fields' => $fields] : [];
        return $this->request('get', "remarketing/segments/$segment_id/relations", ['query' => $query]);
    }

    /**
     * Запрос добавляет источники данных в сегмент аудитории
     * @param string $segment_id
     * @param array $params
     * @return mixed
     */
    public function post(string $segment_id, array $params)
    {
        return $this->request('post', "remarketing/segments/$segment_id/relations", ['json' => $params]);
    }
}