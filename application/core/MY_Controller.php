<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2015, James L. Parry
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller {

    protected $data = array();      // parameters for view components
    protected $id;                  // identifier for our content

    /**
     * Constructor.
     * Establish view parameters & load common helpers
     */

    function __construct() {
        parent::__construct();
        $this->data = array();
        $this->data['title'] = '?';
        $this->errors = array();
        $this->data['pageTitle'] = '??';
    }

    /**
     * Render this page
     */
    function render() {
        $days = "";
        foreach($this->timetable->getDropdownDays() as $item){
          $days .= "<option value='" . $item . "'>" . $item . "</option>";
        }


        $timeslots = "";
    		foreach($this->timetable->getDropdownTimeslots() as $item){
    			$timeslots .= "<option value='" . $item . "'>" . $item . "</option>";
    		}
        $this->data['timeslots'] = $timeslots;
    		$this->data['days'] = $days;
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->data['search'] = $this->parser->parse('_search', $this->data, true);
        // finally, build the browser page!
        $this->data['data'] = &$this->data;
        $this->parser->parse('_template', $this->data);
    }

}
