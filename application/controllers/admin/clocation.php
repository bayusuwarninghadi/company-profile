<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require 'cadmin.php';

class CLocation extends CAdmin
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('location');
	}

	public function pages($act = '')
	{
		$data['act'] = $act;
		switch ($data['act']) {
			case 'new':
				$data['title'] = 'Add New Location';
				$post_ = $this->input->post();
				if ($post_) {
					$post_ = $this->prepareData($post_);
					$data = array_merge($data, $post_);
					$this->location->createNew($data);
					header("Location: /admin/location");
				} else {
					$data['locations'] = $this->location->getLocations();
					$data['fk_i_loc_id'] = '';
					$this->doView('location', $data);
				}

				break;
			case 'edit':
				$data['id'] = $this->input->get('id');
				$post_ = $this->input->post();
				if ($post_) {
					$post_ = $this->prepareData($post_);
					$data = array_merge($data, $post_);
					$update = $this->location->updateById($data);
					header("Location: /admin/location");
				} else {
					$loc = (Array)$this->location->findByid($data['id']);
					if (!$loc) {
						$this->doView('404');
						return;
					}
					$data['locations'] = $this->location->getLocations();
					$data['page'] = $loc[0];
					$data['title'] = $loc[0]->s_name;
					$data['fk_i_loc_id'] = $loc[0]->i_parent_id;
					$this->doView('location', $data);
				}
				break;
			case 'delete':
				$data['id'] = $this->input->get('id');
				if ($data['id'] == '') return false;
				$article = (Array)$this->location->deleteByid($data['id']);
				if (!$article) {
					echo 'Location not found';
					return;
				}
				header("Location: /admin/location");
				break;
			default:
				$data['locations'] = $this->location->getLocations();
				$data['title'] = 'Location';
				$this->doView('location', $data);
				break;
		}
	}

	private function prepareData($data)
	{
		$data['pk_i_id'] = $this->input->post('pk_i_id');
		$data['s_name'] = $this->input->post('s_name');
		$data['i_parent_id'] = $this->input->post('fk_i_loc_id');
		$data['s_body'] = $this->input->post('s_body');

		$data['s_slug'] = str_replace(' ', '_', strtolower($data['s_name']));
		$data['s_url'] = '/' . $data['s_slug'];

		if ($data['i_parent_id'] != 0) {
			$parent = (Array)$this->location->findByid($data['i_parent_id']);
			$parent = $parent[0];
			$data['s_url'] = $parent->s_url . $data['s_url'];
		}
		return $data;
	}
}

?>