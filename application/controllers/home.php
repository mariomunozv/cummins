<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	
	public function index($renderData=""){	
		$this->title = "Cummins";

        // 1. when you pass AJAX to renderData it will generate only that particular PAGE skipping other parts like header, nav bar,etc.,
        //      this can be used for AJAX Responses
        // 2. when you pass JSON , then the response will be json object of $this->data.  This can be used for JSON Responses to AJAX Calls.
        // 3. By default full page will be rendered

		$this->_render('pages/index',$renderData);
	}
	
	public function index2($renderData=""){	
		$this->load->view('pages/index',$renderData);
	}
}