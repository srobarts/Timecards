<?php

class TimecardsController extends AppController {
	var $name = 'Timecards';
	
	/*function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('*');
	}*/
	
	function beforeFilter() {
    	parent::beforeFilter(); 
    	$this->Auth->allowedActions = array('index', 'view', 'view_timecard');
	}
	
	
	function index() {
		$emp_num = $this->Session->Read('Auth.User.emp_num');
		$group_id = $this->Session->Read('Auth.User.group_id');
		if($group_id == 3) {
			$this->set('timecards', $this->Timecard->find('all', array('fields'=>array('Timecard.*'), 'conditions'=>array('Timecard.emp_num'=> $emp_num))));
		} else if($group_id == 1 || $group_id == 2) {
			$this->set('timecards', $this->Timecard->find('all'));
		}
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
		$this->Timecard->id = $id;
		$this->Session->write('Timecard.TimecardId', $id);
		//$this->set('timecards', $this->Timecard->findAllById($id));
		//$this->set('timecards', $this->Timecard->find('all', array('fields'=>array('id','emp_name'), 'conditions'=>array('id'=>$id))));
		$this->Timecard->bindModel(array('hasOne'=>array('Timeentry')));
		$this->set('timecards', $this->Timecard->find('all', array('fields'=>array('Timecard.*', 'Timeentry.*'), 'conditions'=>array('Timecard.id'=> $id))));
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


