<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fullcalendar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('fullcalendar_model');
	}

	function index()
	{
		$this->load->view('fullcalendar');
	}

	function loadRecords()
	{
		$event_data = $this->fullcalendar_model->fetchAllEvents();
		foreach($event_data->result_array() as $row)
		{
			$data[] = array(
				'id'	=>	$row['id'],
				'title'	=>	$row['title'],
				'start'	=>	$row['start_event'],
				'end'	=>	$row['end_event']
			);
		}
		echo json_encode($data);
	}

	function insertRecord()
	{
		if($this->input->post('title'))
		{
			$data = array(
				'title'		=>	$this->input->post('title'),
				'start_event'=>	$this->input->post('start'),
				'end_event'	=>	$this->input->post('end')
			);
			$this->fullcalendar_model->insertEvent($data);
		}
	}

	function updateRecord()
	{
		if($this->input->post('id'))
		{
			$data = array(
				'title'			=>	$this->input->post('title'),
				'start_event'	=>	$this->input->post('start'),
				'end_event'		=>	$this->input->post('end')
			);

			$this->fullcalendar_model->updateEvent($data, $this->input->post('id'));
		}
	}

	function deleteRecord()
	{
		if($this->input->post('id'))
		{
			$this->fullcalendar_model->deleteEvent($this->input->post('id'));
		}
	}

}

?>