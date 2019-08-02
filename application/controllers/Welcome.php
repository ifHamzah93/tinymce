<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 *
	 *  Created At Juli 2019
	 *  Created By Hamzah
	 *  E-mail if.hamzah93@gmail.com
	 *  Blog hamzahkerenz.blogspot.com
	 *  Departement Informatics Engginering (IT) Programmer
	*/
	public function index()
	{
		echo "<pre>";
		print_r("server 1");
		echo "</pre>";
		$this->load->view('tes_tinymce');
	}
	
	function tinymce_upload() {
		$config['upload_path'] = FCPATH.'assets/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 0;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file')) {
            $this->output->set_header('HTTP/1.0 500 Server Error');
            exit;
        } else {
            $file = $this->upload->data();
            if ($file['is_image']) {
            	if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $file['file_name'])) {
			        header("HTTP/1.1 400 Invalid file name,Bad request");
			        return;
			    }

			    if (! in_array(strtolower($file['image_type']), array("gif","jpg","png"))) {
			    	header("HTTP/1.1 400 Invalid file name,Bad request");
			    	return;
			    }
	            
	            $this->output
	                ->set_content_type('application/json', 'utf-8')
	                ->set_output(json_encode(['location' => base_url().'assets/'.$file['file_name']]))
	                ->_display();
	            exit;
	        }
        }
    }

    public function tinymce_delete()
    {
    	$file_path = FCPATH.'/assets/';
    	$img = $this->input->post('images');
    	$gbr = end(explode('/', $img));
    	if (file_exists($file_path.$gbr)) {
			unlink($file_path.$gbr);
			echo json_encode(array('message' => true));
		} else {
			echo json_encode(array('message' => false));
		}
    }
}
