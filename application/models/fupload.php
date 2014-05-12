<?php
class Fupload extends CI_Model
{

    public $gallery_path;
    public $gallery_path_url;

    function __construct($_config = array())
    {
        $this->table = 't_category';
        $path = isset($_config['path']) ? $_config['path'] : 'images';
        $this->gallery_path = realpath(APPPATH . '../' . $path);
        $this->gallery_path_url = 'http://'.base_url() . $path . '/';
        $this->gallery_real_url = $path . '/';
    }

	function do_upload($fileName = null , $fieldName = 'userfile', $create_thumbs = true, $width = 500, $height = 400)
	{
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $this->gallery_path,
			'max_size' => 0,
			'overwrite' => true
		);

		if ($fileName != null) {
			$config['file_name'] = $fileName;
		}

		$this->load->library('upload', $config);

		$this->upload->initialize($config);
		$return = $this->upload->do_upload($fieldName);
		$image_data = $this->upload->data();

		if ($create_thumbs) {
			$config['source_image'] = $image_data['full_path'];
			$config['new_image'] = $this->gallery_path . '/thumbs';
			$config['maintain_ration'] = true;
			$config['width'] = $width;
			$config['height'] = $height;

			$this->load->library('image_lib', $config);
			$this->image_lib->initialize($config);

			$this->image_lib->resize();
		}
		return $return ? $this->upload->data() : false;
	}

	function do_multiple_upload($arr_files, $create_thumbs = true, $width = 200, $height = 200){
		$_FILES = array();
		foreach (array_keys($arr_files['name']) as $h) {
			$_FILES["file_{$h}"] = array('name' => $arr_files['name'][$h],
				'type' => $arr_files['type'][$h],
				'tmp_name' => $arr_files['tmp_name'][$h],
				'error' => $arr_files['error'][$h],
				'size' => $arr_files['size'][$h]);
            $primary = $arr_files['name'][$h];
        }

		$this->load->library('upload');

		$arr_config = array('allowed_types' => 'gif|jpg|png',
			'upload_path' => $this->gallery_path);

		foreach (array_keys($_FILES) as $h) {
			$this->upload->initialize($arr_config);
			if ($this->upload->do_upload($h)) {
				$image_data = $this->upload->data();
				if ($create_thumbs) {
					$config['source_image'] = $image_data['full_path'];
					$config['new_image'] = $this->gallery_path . '/thumbs';
					$config['maintain_ration'] = true;
					$config['width'] = $width;
					$config['height'] = $height;

					$this->load->library('image_lib', $config);
					$this->image_lib->initialize($config);

                    $this->image_lib->resize();
				}
			}
		}
        return $primary;
	}


	function delete_file($file_name){
        $files = array($this->gallery_real_url, $this->gallery_real_url.'/thumbs/');
        foreach ($files as $file){
            unlink($file.$file_name);
        }
    }

    function get_images()
    {
        $files = scandir($this->gallery_path);
        $files = array_diff($files, array('.', '..', 'thumbs'));

        $images = array();

        foreach ($files as $file) {
            $images [] = array(
                'url' => $this->gallery_path_url . $file,
                'thumb_url' => $this->gallery_path_url . 'thumbs/' . $file
            );
        }

        return $images;
    }


}

?>