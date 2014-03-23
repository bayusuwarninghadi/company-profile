<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require 'general.php';
class CProduct extends General
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('category');
		$this->load->model('product');
	}

	public function pages()
	{
		$data['id'] = $this->input->get('id');
		if ($data['id']) {
			$this->product->setId($data['id']);
			$article = (Array)$this->product->doSearch();
			if (!$article) {
				$this->doView('404');
				return;
			}
			$data['page'] = $article[0];
			$data['pages'] = (Array)$this->product->listAllbyCat($data['page']->fk_i_cat_id);
			$data['title'] = $article[0]->s_name;
		} else {
			$url = substr($_SERVER['REQUEST_URI'], '9');
			if ($url != '') {
				$this->load->model('category');
				$catProduct = $this->category->findBySlug($url);
				if (!$catProduct) {
					$this->doView('404');
					return;
				}
				$data['cat'] = $catProduct[0]->pk_i_id;
			} else {
				$data['cat'] = 0;
			}

			$data['inCategories'] = $this->category->getChildIdCategories($data['cat']);

			$this->product->setPageLength(20);
			$data['recent_product'] = (Array)$this->product->doSearch();
			$this->product->setCat($data['inCategories']);

			$data['isLogin'] = $this->session->userdata('isLogin');

			$level = array('1');
			if ($data['isLogin']) {
				array_push($level, '2');
			}

			$this->product->setLevel($level);

			$data['page'] = $this->input->post('page');

			if (!is_numeric($data['page']) || $data['page'] == '' || $data['page'] < 1) $data['page'] = 1;
			$this->product->setPage($data['page']);

			$data['s_key'] = $this->input->post('s_key');
			if ($data['s_key'] != '') {
				$this->product->setKey($data['s_key']);
			}

			$data['product'] = (Array)$this->product->doSearch();
			$data['title'] = 'Product';
		}
		$data['list'] = 'product';
		if (IS_AJAX) {
			$this->load->view('catalog/list', $data);
		} else {
			$this->doView('product', $data);
		}

	}

}

?>