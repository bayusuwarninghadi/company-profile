<?php
class Location extends CI_Model
{

	private $table;
	private $parentId;

	function __construct()
	{
		$this->table = 't_location';
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

	function listAllSubLocation($loc)
	{
		$query = $this->db->query(sprintf("select * from %s where pk_i_id LIKE '%s%%'", $this->table, $loc));
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


	public function getLocations($parent_id = 0, $depth = 0)
	{
		$locs = $this->db->query(sprintf("select * from %s where i_parent_id = %d", $this->table, $parent_id));
		$locs = $locs->result();
		$return = array();
		foreach ($locs as $loc) {
			$subloc = $this->getLocations($loc->pk_i_id, $depth + 1);
			$_loc = array(
				'pk_i_id' => $loc->pk_i_id,
				's_name' => $loc->s_name,
				's_slug' => $loc->s_slug,
				's_url' => $loc->s_url,
				'i_depth' => $depth,
				'sub' => $subloc
			);
			array_push($return, $_loc);
		}
		return $return;
	}


	public function getChildIdLocations($parent_id = 0)
	{
		$return = array($parent_id);
		$child = $this->getAllChildId($parent_id);
		$return = array_merge($return, $child);
		return $return;
	}

	public function getAllChildId($parent_id = 0)
	{
		$locs = $this->db->query(sprintf("select * from %s where i_parent_id = %d", $this->table, $parent_id));
		$locs = $locs->result();
		$return = array();
		foreach ($locs as $loc) {
			$subloc = $this->getAllChildId($loc->pk_i_id);
			array_push($return, $loc->pk_i_id);
			$return = array_merge($return, $subloc);
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
		$locs = $this->db->query(sprintf("select * from %s where i_parent_id = %d", $this->table, $id));
		$locs = $locs->result();
		foreach ($locs as $loc) {
			$this->deleteByid($loc->pk_i_id);
		}

		$query = $this->db->query(sprintf("DELETE FROM %s WHERE pk_i_id='%s'", $this->table, $id));
		return $query;
	}


}

?>
