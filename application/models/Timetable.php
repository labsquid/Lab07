<?php 

class Timetable extends CI_Model {
	protected $xml = null;
	protected $days = array();
	protected $courses = array();
	protected $timeslots = array();
	
}

class Booking {
	public $day;
	public $course;
	public $timeslot;
	public $teacher;
	public $type;
	public $room;
	
	//provided with <day> or <course> or <timeslot>
	__construct($element){
	if($element->getName() == "day" || $element->getName() == "course" || $element->getName() == "timeslot"){
		$this->$type = $element->booking->type["type"];
		$this->$teacher = $element->booking->teacher["teacher"];
		$this->$room = $element->booking->room["room"];
		
		if($element->getName() == "day"){
			$this->day = $element['day'];
			$this->course = $element->course['course'];
			$this->timeslot = $element->timeslot['timeslot'];			
		}
		else if($element->getName() == "course"){
			$this->course = $element['course'];
			$this->day = $element->day['day'];
			$this->timeslot = $element->timeslot['timeslot'];			
		}
		
		else if($element->getName() == "timeslot"){
			$this->timeslot = $element['timeslot'];
			$this->day = $element->day['day'];
			$this->timeslot = $element->timeslot['timeslot'];			
		}
		else{
			return;
		}
		
	}
}

?>