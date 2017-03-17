<?php

class DateDifference {

	public function getDateDifference($startDate,$endDate){
		if($startDate < $endDate){
    		$start = new DateTime($startDate);
	 		$end= new DateTime($endDate);
			$interval = $start->diff($end);
			$return = $interval->format('%Y лет %m месяцев %d дней %H часов %i минут %s секунд');
    		return $return;
    	} else {
    		$return = "uncorrect date";
    		return $return;
    	}
  }

}
