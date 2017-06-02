<?php

namespace App\Services;


class StatRobot{

	protected $robot;

	public function __construct(\App\Robot $robot){
		$this->robot = $robot;
	}

	public function count(){
		return $this->robot->count();
	}
	
	public function countPublished(){
		return $this->robot->countPublished();
	}

}