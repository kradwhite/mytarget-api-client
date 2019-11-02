<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий массово удалять источники данных из сегмента аудитории
 * Class SegmentRelationsDelete
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/SegmentRelationsDelete
 */
class SegmentRelationsDelete extends Resource
{
    /**
     * Запрос удаляет источники данных из сегмента аудитории
     * @param string $segment_id
     * @param string $ids
     * @return mixed
     */
    public function delete(string $segment_id, string $ids)
    {
        return $this->request('delete', "remarketing/segments/$segment_id/relations/$ids");
    }
}