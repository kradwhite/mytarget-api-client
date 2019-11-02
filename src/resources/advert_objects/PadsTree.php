<?php
/**
 * User: Aleksandrov Artem
 * Date: 21.10.2019
 * Time: 8:24
 */

namespace kradwhite\myTarget\api\resources\advert_objects;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, предоставляющий информацию о деревьях площадок, используемых в таргетинге на места размещений (pads)
 * при создании кампаний. Дерево площадок необходимо для визуализации связи площадок, представленных id в
 * конечных узлах, и физических мест размещений, представленных во внутренних узлах дерева.
 * Class PadsTree
 * @package kradwhite\myTarget\api\methods\advert_objects
 * @see https://target.my.com/doc/api/ru/resource/PadsTree
 */
class PadsTree extends Resource
{
    /**
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', 'pads_trees');
    }
}