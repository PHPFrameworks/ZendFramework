<?php

class Application_Model_BlogMapper
{
	protected $_dbTable;
	public function setDbTable($dbTable) {
		$dbTable = new $dbTable;
		$this->_dbTable = $dbTable;
		return $this;
	}
	public function getDbTable(){
		if($this->_dbTable === null){
			$this->setDbTable('Application_Model_DbTable_Blog');
		}
		return $this->_dbTable;
	}
	public function fetchAll(){
		$resultSet = $this->getDbTable()->fetchAll();
		$entries = array();
		foreach($resultSet as $row){
			$entry = new Application_Model_Blog();
			$entry->setId($row->id);
			$entry->setTitle($row->title);
			$entry->setBody($row->body);
			$entries[] = $entry;
		}
		return $entries;
	}
	public function save(Application_Model_Blog $model){
		$data = array(
			'id' => $model->getId(),
			'title' => $model->getTitle(),
			'body' => $model->getBody(),
			'created' => $model->getCreated()
		);
		if($model->getId() === null){
			unset($data['id']);
			$this->getDbTable()->insert($data);
		}else{
			$this->getDbTable()->update($data, array('id = ?' => $id));
		}
	}
}

