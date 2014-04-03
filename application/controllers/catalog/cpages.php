<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require 'general.php';
class CPages extends General
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Home';

        $this->load->model('slider');
        $data['slider'] = (Array)$this->slider->listAll();

        $this->load->model('product');
	    $this->product->SetPageLength(15);
	    $data['new_product'] = (Array)$this->product->doSearch();

	    $page = (Array)$this->pages->findByid('42');
	    $data['promo'] = $page[0];

	    $page = (Array)$this->pages->findByName('home_article');
	    $data['homearticle'] = $page[0];

	    $this->load->model('gallery');
	    $album = (Array)$this->gallery->listAll();
	    $lates_album = $album[0];
	    $config = array(
		    'path' => 'images/gallery/' . $lates_album->pk_i_id
	    );
	    $this->load->model('fupload', '', false, $config);
	    $data['images'] = $this->fupload->get_images();
	    $this->doView('home', $data);
    }

    public function about()
    {
        $data['title'] = 'About';
        
        $page = (Array)$this->pages->findByid('11');
        if (!$page) {
            $this->doView('404');
            return;
        }
        $data['page'] = $page[0];
        $data['title'] = $page[0]->s_name;
        $this->doView('page', $data);
    }

    public function carrer()
    {
        $data['title'] = 'About';
        $page = (Array)$this->pages->findByid('28');
        if (!$page) {
            $this->doView('404');
            return;
        }
        $data['page'] = $page[0];
        $data['title'] = $page[0]->s_name;
        $this->doView('page', $data);
    }

    public function store()
    {
        $data['title'] = 'About';
        $page = (Array)$this->pages->findByid('35');
        if (!$page) {
            $this->doView('404');
            return;
        }
        $data['page'] = $page[0];
        $data['title'] = $page[0]->s_name;
        $this->doView('page', $data);
    }

    public function pages($page = null)
    {
        if ($page == null) {
            $this->doView('404');
            return;
        }
        $data['title'] = 'career';
        $page = (Array)$this->pages->findByid($page);
        if (!$page) {
            $this->doView('404');
            return;
        }
        $data['page'] = $page[0];
        $data['title'] = $page[0]->s_name;
        $this->doView('page', $data);
    }

}

?>