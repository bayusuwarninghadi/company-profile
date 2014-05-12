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
        $data['page'] = $this->input->post('page') ? $this->input->post('page') : 1;
        $data['s_key'] = $this->input->post('s_key');
        $data['recent_product'] = (Array)$this->product->doSearch();


        if ($data['id']) {
            $this->product->setId($data['id']);
            $article = (Array)$this->product->doSearch();
            if (!$article) {
                $this->doView('404');
                return;
            }
            $data['article'] = $article[0];
            $data['breadcrumb'] = '<li>'.breadcrumbs('</li><li>','Home','/product'.$data['article']->s_cat_url).'</li>';
            $data['cat'] = $data['article']->fk_i_cat_id ? $data['article']->fk_i_cat_id : 0;
            $data['title'] = $article[0]->s_name;
        } else {
            $data['cat'] = $this->input->post('fk_i_cat_id') ? $this->input->post('fk_i_cat_id') : 0;

            $url = substr($_SERVER['REQUEST_URI'], '8');
            if ($url != '') {
                $catProduct = $this->category->findByUrl($url);
                if (!$catProduct) {
                    $this->doView('404');
                    return;
                }
                $data['cat'] = $catProduct[0]->pk_i_id;
            }
            $data['inCategories'] = $this->category->getChildIdCategories($data['cat']);


            $this->product->setCat($data['inCategories']);

            $data['isLogin'] = $this->session->userdata('isLogin');

            $level = array('1');
            if ($data['isLogin']) {
                array_push($level, '2');
            }

            $this->product->setLevel($level);

            if (!is_numeric($data['page']) || $data['page'] == '' || $data['page'] < 1) $data['page'] = 1;
            $this->product->setPage($data['page']);

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