<?php

namespace Prostock\Model;

/**
 * Description of Stock
 *
 * @author Ramon Hirsinger
 */
class Stock {
    
    public $id;
    public $name;
    public $active;

    public function exchangeArray($data) {
        $this->id       =   (!empty($data['id'])) ? $data['id'] : null;
        $this->name     =   (!empty($data['name'])) ? $data['name'] : null;
        $this->active   =   (!empty($data['active'])) ? $data['active'] : null;
    }
}
