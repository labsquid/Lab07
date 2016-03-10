<?php 

class Timetable extends CI_Model {
	public $xml = null;
	public $days = array();
	public $courses = array();
	public $timeslots = array();
	
	public function __construct(){
		$this->xml = simplexml_load_file("./data/data-all.xml");
		foreach($this->xml->days->day as $day){
			$dayName = $day['day']->__toString();
			foreach($day->booking as $booking){
				$tempBooking = new Booking();
				$tempBooking->day = $dayName;
				$tempBooking->course = $booking->course['course']->__toString();
				$tempBooking->timeslot = $booking->timeslot['time']->__toString();
				$tempBooking->teacher = $booking->teacher['teacher']->__toString();
				$tempBooking->type = $booking->type['type']->__toString();
				$tempBooking->room = $booking->room['room']->__toString();
				$this->days[] = $tempBooking;
			}
		}
		foreach($this->xml->days->day as $day){
			$dayName = $day['day']->__toString();
			foreach($day->booking as $booking){
				$tempBooking = new Booking();
				$tempBooking->day = $dayName;
				$tempBooking->course = $booking->course['course']->__toString();
				$tempBooking->timeslot = $booking->timeslot['time']->__toString();
				$tempBooking->teacher = $booking->teacher['teacher']->__toString();
				$tempBooking->type = $booking->type['type']->__toString();
				$tempBooking->room = $booking->room['room']->__toString();
				$this->days[] = $tempBooking;
			}
		}
		foreach($this->xml->days->day as $day){
			$dayName = $day['day']->__toString();
			foreach($day->booking as $booking){
				$tempBooking = new Booking();
				$tempBooking->day = $dayName;
				$tempBooking->course = $booking->course['course']->__toString();
				$tempBooking->timeslot = $booking->timeslot['time']->__toString();
				$tempBooking->teacher = $booking->teacher['teacher']->__toString();
				$tempBooking->type = $booking->type['type']->__toString();
				$tempBooking->room = $booking->room['room']->__toString();
				$this->days[] = $tempBooking;
			}
		}
		
	}
	public function getAll(){
		return $this->days;
	}

	
		
}

class Booking {
	public $day;
	public $course;
	public $timeslot;
	public $teacher;
	public $type;
	public $room;
	
    public function __contruct(){		
	}
	
}