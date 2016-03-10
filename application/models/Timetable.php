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
		foreach($this->xml->courses->course as $course){
			$courseName = $course['course']->__toString();
			foreach($course->booking as $booking){
				$tempBooking = new Booking();
				$tempBooking->day = $booking->day['day']->__toString();
				$tempBooking->course = $courseName;
				$tempBooking->timeslot = $booking->timeslot['time']->__toString();
				$tempBooking->teacher = $booking->teacher['teacher']->__toString();
				$tempBooking->type = $booking->type['type']->__toString();
				$tempBooking->room = $booking->room['room']->__toString();
				$this->courses[] = $tempBooking;
			}
		}
		
		foreach($this->xml->timeslots->timeslot as $timeslot){
			$timeslotName = $timeslot['time']->__toString();
			foreach($timeslot->booking as $booking){
				$tempBooking = new Booking();
				$tempBooking->timeslot = $timeslotName;
				$tempBooking->course = $booking->course['course']->__toString();
				$tempBooking->day = $booking->day['day']->__toString();
				$tempBooking->teacher = $booking->teacher['teacher']->__toString();
				$tempBooking->type = $booking->type['type']->__toString();
				$tempBooking->room = $booking->room['room']->__toString();
				$this->timeslots[] = $tempBooking;
			}
		}
		
	}
	public function getAll(){
		return $this->courses;
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