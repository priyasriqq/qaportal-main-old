<?php

require APPPATH . 'libraries/REST_Controller.php';

class Systemhealth extends REST_Controller {

	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
       $this->table = 'systemhealth';
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get($id = 0, $date = null)
	{
        if(!empty($id)){
            $data = $this->db->get_where($this->table, ['id' => $id])->row_array();
        }else if($date){
          $this->db->where('CreatedAt =', $date);
          $data = $this->db->get($this->table)->result();
        }else{
            $data = $this->db->get($this->table)->result();
        }

        $this->response($data, REST_Controller::HTTP_OK);
	}

    /**
     * Get All Data from this method.
     *
     * @param JSON data
     * @return Response
    */
    public function index_post()
    {

        $input_data = json_decode(trim(file_get_contents('php://input')), true);
        $res= $this->db->insert($this->table, $input_data);
        if($res){
            $this->response(["messgae" => "Item created successfully."], REST_Controller::HTTP_OK);
        }else {
          $this->response(["messgae" => "Failed to create."], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($id)
    {
        $input = $this->put();
        $this->db->update('items', $input, array('id'=>$id));

        $this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        $this->db->delete('items', array('id'=>$id));

        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
    }

}
