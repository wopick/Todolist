<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = 'Todo list';
$this -> load -> view ('templates/header',$data);
$this -> load -> view ('home/index');
$this -> load -> view ('templates/footer');

?>
