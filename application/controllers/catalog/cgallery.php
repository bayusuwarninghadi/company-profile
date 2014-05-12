<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require 'general.php';
class CGallery extends General
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('gallery');
    }

    public function pages()
    {
        $data['id'] = $this->input->get('id');
        if ($data['id']) {
            $gallery = $this->gallery->findById($data['id']);
            if (!$gallery) {
                $this->doView('404');
                return;
            }
            $data['gallery'] = $gallery[0];
            $config = array(
                'path' => 'images/gallery/' . $data['id']
            );
            $this->load->model('fupload', '', false, $config);
            $data['images'] = $this->fupload->get_images();
            $data['title'] = $gallery[0]->s_name;
        } else {
            $data['gallery'] = (Array)$this->gallery->listAll();
            $data['title'] = 'Product';
        }
        $this->doView('gallery', $data);
    }

}

?>