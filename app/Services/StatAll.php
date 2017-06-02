<?php

namespace App\Services;

	use DB;

class StatAll{



	public function __construct(){
	}

	public function getDashboard(){

        $dashboard = config('dashboard');

        for ($i=0; $i < count($dashboard); $i++) { 
            $entity = $dashboard[$i]['machine-name'];
            $dashboard[$i]['count'] = DB::table($entity)->count('id');
        }

        //dump($dashboard);
        //dd();
        //return dump($dashboard);
        return $dashboard;

	}


}