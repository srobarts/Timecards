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
}

?>
