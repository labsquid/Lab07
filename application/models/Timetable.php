<?php 

class Timetable extends CI_Model {
	protected $xml = null;
	protected $days = array();
	protected $courses = array();
	protected $timeslots = array();
	
	public function __construct(){
		$this->xml = simplexml_load_file("./data/data-all.xml");
		
		foreach($this->xml->days->day->booking as $booking){
			$this->days[] = new Booking($this, $this->xpath("parent::*"));
		}
	}
	public function getAll(){
		return $days;
	}
	
		
	}

public class Booking {
	public $day;
	public $course;
	public $timeslot;
	public $teacher;
	public $type;
	public $room;
	
	//provided with the <booking> and either <day>, <course> or <timeslot> as parent element
	public function __construct($element, $parentElement){
	
		if($parentElement->getName() == "day" || $parentElement->getName() == "course" || $parentElement->getName() == "timeslot"){
			$this->$type = $element->type["type"];
			$this->$teacher = $element->teacher["teacher"];
			$this->$room = $element->room["room"];
			
			if($parentElement->getName() == "day"){
				$this->day = $parentElement['day'];
				$this->course = $element->course['course'];
				$this->timeslot = $element->timeslot['timeslot'];			
			}
			else if($parentElement->getName() == "course"){
				$this->course = $parentElement['course'];
				$this->day = $element->day['day'];
				$this->timeslot = $element->timeslot['timeslot'];			
			}
			
			else if($parentElement->getName() == "timeslot"){
				$this->timeslot = $parentElement['timeslot'];
				$this->day = $element->day['day'];
				$this->timeslot = $element->timeslot['timeslot'];			
			}
			else{
				return;
			}
			
			}
}