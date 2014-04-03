<?php
class Gallery extends CI_Model
{
    private $table;

    function __construct()
    {
        $this->table = 't_gallery';
    }

	function listAll()
	{
		$query = $this->db->query(sprintf("SELECT * FROM %s ORDER BY pk_i_id DESC", $this->table));
		return $query->result();
	}

	function createNew($data = array())
    {
        $query = $this->db->query(sprintf("
            insert into %s (s_name, s_body)
            values ('%s','%s')",
            $this->table, $data['s_name'], $data['s_body']));
        return $query;
    }

    function findByid($id)
    {
        $query = $this->db->query(sprintf("SELECT * FROM %s WHERE pk_i_id='%s'", $this->table, $id));
        return $query->result();
    }

    function updateById($data = array())
    {
        $query = $this->db->query(sprintf("
            UPDATE %s SET s_name='%s', s_body='%s' WHERE pk_i_id='%s'",
            $this->table, $data['s_name'], $data['s_body'], $data['pk_i_id']
        ));
        return $query;
    }

    function deleteByid($id)
    {
        $query = $this->db->query(sprintf("DELETE FROM %s WHERE pk_i_id='%s'", $this->table, $id));
        return $query;
    }

}
?>