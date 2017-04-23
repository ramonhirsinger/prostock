<?php

namespace Prostock\Model;

use Zend\Db\TableGateway\TableGateway;
/**
 * Description of StockTable
 *
 * @author Ramon Hirsinger
 */
class StockTable {
    protected  $tableGateway;
    
    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    
    public function fetchAll() {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }
    
    public function getStock($id) {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if(!$row) {
            throw new Exception("Stock id=" . $id . ' could not be found!' );
        }
        return $row;
    }
    
    public function saveStock(Stock $stock) {
        $data = array(
          'name' => $stock->name,
          'active' => $stock->active,
        );
        
        $id = (int) $stock->id;
        if($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if($this->getStock($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new Exception('Stock does not exist');
            }
        }
    }
    
    public function deleteStock($id) {
        $this->tableGateway->delete(array('id' => $id));
    }
    
}
