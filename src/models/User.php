<?php

namespace patterns\models;

/**
 * Created by PhpStorm.
 * User: dima
 * Date: 06.08.17
 * Time: 17:54
 */
class User
{
    /** @var  int */
    public $id;
    /** @var  int */
    public $name;

    /**
     * User constructor.
     * @param int $id
     * @param int $name
     */
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }


}