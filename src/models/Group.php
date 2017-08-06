<?php
/**
 * Created by PhpStorm.
 * User: dima
 * Date: 06.08.17
 * Time: 17:55
 */

namespace patterns\models;


class Group
{
    protected $id;

    /**
     * Group constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

}