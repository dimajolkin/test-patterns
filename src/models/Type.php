<?php
/**
 * Created by PhpStorm.
 * User: dima
 * Date: 06.08.17
 * Time: 17:55
 */

namespace patterns\models;


class Type
{
    protected $id;
    protected $groupId;

    /**
     * Type constructor.
     * @param $id
     * @param $groupId
     */
    public function __construct($id, $groupId)
    {
        $this->id = $id;
        $this->groupId = $groupId;
    }


}