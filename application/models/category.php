<?php
class Category extends CI_Model
{

	private $table;
	private $parentId;

	function __construct()
	{
		$this->table = 't_category';
	}

	function setParentId($parentId)
	{
		$this->parentId = $parentId;
	}

	function listAll()
	{
		$query = $this->db->query(sprintf("select * from %s", $this->table));
		return $query->result();
	}

	function listAllSubCategory($cat)
	{
		$query = $this->db->query(sprintf("select * from %s where pk_i_id LIKE '%s%%'", $this->table, $cat));
		return $query->result();
	}

	function doSearch($order = 'pk_i_id')
	{
		$sqlpush = array();
		if (is_integer($this->parentId)) {
			array_push($sqlpush, sprintf("i_parent_id = %d", $this->parentId));
		}

		$sqlpush = $sqlpush ? 'WHERE ' . implode(' AND ', $sqlpush) : '';

		$sql = sprintf("
            select * from %s %s
            ORDER BY %s ASC",
			$this->table, $sqlpush, $order
		);
		$query = $this->db->query($sql);
		return $query->result();
	}


	public function getCategories($parent_id = 0, $depth = 0)
	{
		$cats = $this->db->query(sprintf("select * from %s where i_parent_id = %d", $this->table, $parent_id));
		$cats = $cats->result();
		$return = array();
		foreach ($cats as $cat) {
			$subcat = $this->getCategories($cat->pk_i_id, $depth + 1);
			$_cat = array(
				'pk_i_id' => $cat->pk_i_id,
				's_name' => $cat->s_name,
				's_slug' => $cat->s_slug,
				's_url' => $cat->s_url,
				'i_depth' => $depth,
				'sub' => $subcat
			);
			array_push($return, $_cat);
		}
		return $return;
	}


	public function getChildIdCategories($parent_id = 0)
	{
		$return = array($parent_id);
		$child = $this->getAllChildId($parent_id);
		$return = array_merge($return, $child);
		return $return;
	}

	public function getAllChildId($parent_id = 0)
	{
		$cats = $this->db->query(sprintf("select * from %s where i_parent_id = %d", $this->table, $parent_id));
		$cats = $cats->result();
		$return = array();
		foreach ($cats as $cat) {
			$subcat = $this->getAllChildId($cat->pk_i_id);
			array_push($return, $cat->pk_i_id);
			$return = array_merge($return, $subcat);
		}
		return $return;
	}


	function createNew($data = array())
	{
		$query = $this->db->query(sprintf("
            insert into %s (s_name, s_slug, s_url, s_body, i_parent_id)
            values ('%s','%s','%s','%s','%s')",
			$this->table, $data['s_name'], $data['s_slug'], $data['s_url'], $data['s_body'], $data['i_parent_id']
		));
		return $query;
	}

	function updateById($data = array())
	{

		$sql = sprintf("
            UPDATE %s SET s_name='%s', s_slug='%s', s_url='%s', s_body='%s', i_parent_id='%s'  WHERE pk_i_id='%s'",
			$this->table, $data['s_name'], $data['s_slug'], $data['s_url'], $data['s_body'], $data['i_parent_id'], $data['pk_i_id']
		);

		$query = $this->db->query($sql);
		return $query;
	}


	function findById($id)
	{
		$query = $this->db->query(sprintf("select * from %s where pk_i_id = '%s'", $this->table, $id));
		return $query->result();
	}

	function findBySlug($slug)
	{
		$sql = sprintf("select * from %s where s_slug = '%s'", $this->table, $slug);
		$query = $this->db->query($sql);
		return $query->result();
	}

	function findByUrl($name)
	{
		$query = $this->db->query(sprintf("select * from %s where s_url = '%s'", $this->table, $name));
		return $query->result();
	}

	function deleteByid($id)
	{
		$cats = $this->db->query(sprintf("select * from %s where i_parent_id = %d", $this->table, $id));
		$cats = $cats->result();
		foreach ($cats as $cat) {
			$this->deleteByid($cat->pk_i_id);
		}

		$query = $this->db->query(sprintf("DELETE FROM %s WHERE pk_i_id='%s'", $this->table, $id));
		return $query;
	}


}

?>
