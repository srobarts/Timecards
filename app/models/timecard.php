<?php
  
class Timecard extends AppModel {
  var $name = 'Timecard';
  
var $validate = array(
    'title' => array(
      'rule' => 'notEmpty'
    ),
    'body' => array(
      'rule' => 'notEmpty'
    )
);
  
  
  function getTimecardsByManagerOrUser($emp_num = NULL) 
  {
  	//$this->Timecard->bindModel(array('hasOne'=>array('Users')));
  	$result = $this->find('all', array('conditions' => array('Timecard.emp_num' => $emp_num)));
  	return $result;
  }
  
  
  
  
}

?>
