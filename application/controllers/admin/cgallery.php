<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require 'cadmin.php';

class CGallery extends CAdmin
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('gallery', 'pages');
		$this->load->library('session');
	}

	public function pages($act = '')
	{
		$data['act'] = $act;
		switch ($data['act']) {
			case 'new':
				$post_ = $this->input->post();
				if ($post_) {
					$post_ = $this->prepareData($post_);
					$data = array_merge($data, $post_);
					$exec = $this->pages->createNew($data);
					if ($exec == 1) {
						$data['pk_i_id'] = mysql_insert_id();
						$msg = 'Item successfully posted';
						$redirect = '/admin/gallery/edit?id=' . $data['pk_i_id'];

						mkdir('images/gallery/' . $data['pk_i_id']);
						mkdir('images/gallery/' . $data['pk_i_id'].'/thumbs');
						$config = array(
							'path' => 'images/gallery/' . $data['pk_i_id']
						);
						$this->load->model('fupload', '', false, $config);
						$multiupload = $this->fupload->do_multiple_upload($_FILES['s_image']);
                        $data['s_primary'] = $multiupload;
                        $this->pages->updateById($data);
                    } else {
						$msg = 'data is invalid';
						$redirect = '/admin/gallery/new';
					}
					$this->session->set_userdata(array('adminMessage' => $msg));
					header("Location: " . $redirect);
				}

				$data['title'] = 'Add New gallery';
				$this->doView('gallery', $data, true);
				break;
			case 'edit':
				$data['pk_i_id'] = $this->input->get('id');
				$post_ = $this->input->post();
				$config = array(
					'path' => 'images/gallery/' . $data['pk_i_id']
				);
				$this->load->model('fupload', '', false, $config);
				$data['images'] = $this->fupload->get_images();
				if ($post_) {
					$post_ = $this->prepareData($post_);
					$data = array_merge($data, $post_);

					$multiupload = $this->fupload->do_multiple_upload($_FILES['s_image']);
                    $data['s_primary'] = $multiupload;
					$exec = $this->pages->updateById($data);
					if ($exec == 1) {
						$msg = 'success';
					} else {
						$msg = 'error updating field';
					}
					$this->session->set_userdata(array('adminMessage' => $msg));
				}
				$page = (Array)$this->pages->findByid($data['pk_i_id']);
				if (!$page) {
					$this->doView('404');
					return;
				}
				$data['page'] = $page[0];
				$data['title'] = $page[0]->s_name;

				$this->doView('gallery', $data, true);
				break;
			case 'delete':
				$data['pk_i_id'] = $this->input->get('id');
				if ($data['pk_i_id'] == '') return false;
				$page = (Array)$this->pages->findByid($data['pk_i_id']);
				if (!$page) {
					$this->session->set_userdata(array('adminMessage' => 'item not found'));
					header("Location: /admin/gallery");
				}
                $dir = 'images/gallery/'.$data['pk_i_id'];
                $files = new RecursiveIteratorIterator(
                    new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
                    RecursiveIteratorIterator::CHILD_FIRST
                );

                foreach ($files as $fileinfo) {
                    $todo = ($fileinfo->isDir() ? 'rmdir' : 'unlink');
                    $todo($fileinfo->getPathname());
                }

                rmdir($dir);
                $page = $this->pages->deleteByid($data['pk_i_id']);
				if ($page == 1) {
					$msg = 'deleted success';
				} else {
					$msg = 'error during delete the data';
				}
				$this->session->set_userdata(array('adminMessage' => $msg));
				header("Location: /admin/gallery");
				break;
			default:
				$data['pages'] = (Array)$this->pages->listAll();
				$data['list'] = 'gallery';
				if (IS_AJAX) {
					$this->load->view('admin/list', $data);
				} else {
					$data['title'] = 'gallery';
					$this->doView('gallery', $data);
				}
				break;
		}
	}

	private function prepareData($data)
	{
		if ($this->input->post('pk_i_id')) {
			$data['pk_i_id'] = $this->input->post('pk_i_id');
		}

		$data['s_name'] = $this->input->post('s_name');
        $data['s_body'] = $this->input->post('s_body');
		return $data;
	}
}

?>