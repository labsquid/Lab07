<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->data['pagebody'] = 'welcome_xml';
		$this->load->model('timetable');
		$display = "";
		$display .= "<div>By Days:";
		foreach($this->timetable->getDays() as $key=>$item){
			$display .= "<div>" . $item->toString() . "</div>";
		}
		$display .= "</div>";

		$display .= "<div>By Course:";
		foreach($this->timetable->getCourses() as $item){
			$display .= "<div>" . $item->toString() . "</div>";
		}
		$display .= "</div>";

		$display .= "<div>By Timeslot:";
		foreach($this->timetable->getTimeslots() as $item){
			$display .= "<div>" . $item->toString() . "</div>";
		}
		$display .= "</div>";



		$this->data['xmldata'] = $display;
		$this->render();
	}

	function search(){
		$this->data['pagebody'] = 'welcome_xml';
		$this->load->model('timetable');
		$day = $_GET['day'];
		$timeslot = $_GET['timeslot'];
		$display = "";

		$display .= "<div>Results: ";
		$timeslotResult = "";
		foreach($this->timetable->getTimeslots() as $item){
			if($item->day == $day && $item->timeslot == $timeslot){
				$timeslotResult .= "<div>" . $item->toString() . "</div>";
			}
		}

		$dayResult = "";
		foreach($this->timetable->getDays() as $item){
			if($item->day == $day && $item->timeslot == $timeslot){
				$dayResult .= "<div>" . $item->toString() . "</div>";
			}
		}

		$courseResult = "";
		foreach($this->timetable->getCourses() as $item){
			if($item->day == $day && $item->timeslot == $timeslot){
				$courseResult .= "<div>" . $item->toString() . "</div>";
			}
		}
		
		

		//At this point, just need to do some comparisons and decide whether to
		//print a single one (because they all match) or each invidually like/
		//Course results are ___ day results are __ etc
		// OR just show an error for no results
		
		


		//Currently just checks and displays course results
		if($courseResult == "" && $dayResult == "" && $timeslotResult == ""){
			$courseResult = "<div>Sorry, there are no results for that day and timeslot.</div>";
			
			$display .= $courseResult;
			$display .= "</div>";
			
			$this->data['xmldata'] = $display;
			$this->render();
		} elseif ($dayResult != $courseResult || $dayResult != $timeslotResult){
			$dayResult = "<div><b>Day Result:</b> " . $dayResult . "</div>";
			$courseResult = "<div><b>Course Result:</b> " . $courseResult . "</div>";
			$timeslotResult = "<div><b>Timeslot Result:</b> " . $timeslotResult . "</div>";
			$display .= $courseResult;
			$display .= $dayResult;
			$display .= $timeslotResult;
			
			$display .= "</div>";
			
			$this->data['xmldata'] = $display;
			$this->render();
		} else {		
			$display .= $courseResult;		
			$display .= "</div>";			
			$this->data['xmldata'] = $display;
			$this->render();
		};
		
		
		
	
	}
}
