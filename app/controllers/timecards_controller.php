<?php

class TimecardsController extends AppController {
	var $name = 'Timecards';
	
	function beforeFilter() {
    	parent::beforeFilter(); 
    	$this->Auth->allowedActions = array('index', 'view');
	}
	
	
	function index() {
		$this->set('timecards', $this->Timecard->find('all'));
	}
	
	function view($id = null) {
		$this->Timecard->id = $id;
		$this->set('timecards', $this->Timecard->read());
	}
	
	//Function will print out to the screen all the timeentries for a given
	//timecard.  Id passed in is the timecard id, we will then have to do
	//a lookup of the timentries for that timecard.
	function view_timecard($id = null) {
		if(!$id) {
			$this->Session->SetFlash(_('No timeentries.', true));
			$this->redirect(array('action'=>'index'));
		} 
		$this->Timeentry->id = $id;
		$this->set('timeentries', $this->Timeentry->find('all'));
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


