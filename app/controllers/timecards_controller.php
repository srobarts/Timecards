<?php

class TimecardsController extends AppController {
	var $name = 'Timecards';
	
	function index() {
		$this->set('timecards', $this->Timecard->find('all'));
	}
	
	function view($id = null) {
		$this->Timecard->id = $id;
		$this->set('timecards', $this->Timecard->read());
	}
	
	function add() {
		if (!empty($this->data)) {
			if ($this->Timecard->save($this->data)) {
				$this->Session->setFlash('Your timecard has been saved.');
				$this->redirect(array('action' => 'index'));
			}
		}
	}
	
	function delete($id) {
		$this->Timecard->delete($id);
		$this->Session->setFlash('The timecard with id: '.$id.' has been deleted.');
		$this->redirect(array('action'=>'index'));
	}
	
	function edit($id = null) {
		$this->Timecard->id = $id;
		if (empty($this->data)) {
			$this->data = $this->Timecard->read();
			$this->set('timecards', $this->Timecard->read());
		} else {
			if ($this->Timecard->save($this->data)) {
				$this->Session->setFlash('Your timecard has been updated.');
				$this->redirect(array('action' => 'index'));
			}
		}
	}
	
	
}


