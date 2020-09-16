<?php

class MY_Model extends CI_Model
{
	public $table;
    public $column;
    public $order;

    function __construct()
    {
        parent::__construct();
    }

    public function _get_datatables_query_where($where)
    {
        $this->db->where($where);
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function _get_datatables_query()
    {
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_datatables_where($where)
    {
        $this->security->xss_clean($where);
        $this->_get_datatables_query_where($where);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function save($data)
    {
        $data = $this->security->xss_clean($data);
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    
    public function update($id,$data)
    {    
        $id = $this->security->xss_clean($id);
        $data = $this->security->xss_clean($data);
        $this->db->where('id', $id);
        $res = $this->db->update($this->table, $data);
        return $res;
    }
    public function update_by_field($where,$data)
    {    
        $id = $this->security->xss_clean($where);
        $data = $this->security->xss_clean($data);
        $this->db->where($where);
        $res = $this->db->update($this->table, $data);
        return $res;
    }
    
    public function delete_by_id($id)
    {
        $id = $this->security->xss_clean($id);
        $this->db->where('id', $id);
        $res = $this->db->delete($this->table);
        return $res;
    }
    
    public function delete_by_field($where)
    {
        $where = $this->security->xss_clean($where);
        $this->db->where($where);
        $this->db->delete($this->table);
    }

    public function get_by_id($id)
    {
        $id = $this->security->xss_clean($id);
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->row();        
    }

    public function get_by_field_id($campo,$id)
    {
        $campo = $this->security->xss_clean($campo);
        $id = $this->security->xss_clean($id);
        $this->db->where($campo, $id);
        $query = $this->db->get($this->table);
        return $query->row();        
    }
    
    public function get_all()
    {    
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function get_all_by_desc($field,$type)
    {   
        $field = $this->security->xss_clean($field);
        $type  = $this->security->xss_clean($type);
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by($field, $type);
        $query = $this->db->get(); 
        return $query->result();
    }

    public function get_row_by_field($where)
    {   
        $campo = $this->security->xss_clean($where);
        $this->db->where($where);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function get_all_by_field($where)
    {   
        $campo = $this->security->xss_clean($where);
        $this->db->where($where);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function get_all_by_field_like($campo,$dato)
    {
        $campo = $this->security->xss_clean($campo);
        $dato  = $this->security->xss_clean($dato);
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->like($campo, $dato, 'both');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_by_field_like_order($campo,$dato,$order)
    {
        $campo = $this->security->xss_clean($campo);
        $dato  = $this->security->xss_clean($dato);
        $order = $this->security->xss_clean($order);
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->like($campo, $dato, 'both');
        $this->db->order_by($order, "asc");
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_by_field_distinct($campo)
    {
        $campo = $this->security->xss_clean($campo);
        $this->db->select($campo);
        $this->db->distinct();
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_by_field_distinct_and_where($campo,$where)
    {
        $campo = $this->security->xss_clean($campo);
        $this->db->select($campo);
        $this->db->distinct();
        $this->db->where($where);
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result();
    }
    //-------------------- Transaccionts -------------------------------------------------
    /* el ALgoritmo es el siguiente, este algoritmo es general
            CONTADOR
            ========
            [NUMERO] [int]

            Cada inicio de año, se pone el NUMERO=0
            Para asignar un numero consecutivo:
            1.- Abrir una transaccion
            2.- UPDATE CONTADOR Set NUMERO=NUMERO+1
            3.- Select NUMERO From CONTADOR.
            4.- Insertar registro en tabla FACTURA
            5.- Cerrar la transaccion
    */
    public function begin_transaction(){
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(FALSE); # See Note 01. If you wish can remove as well
        /*
           Notes
           01.  By default Codeigniter runs all transactions in Strict Mode. When strict mode is enabled, if you are running multiple groups of transactions, if one group fails all groups will be rolled back. If strict mode is disabled, each group is treated independently, meaning a failure of one group will not affect any others.
        */
    }
    public function end_transaction(){
        $this->db->trans_complete(); # Completing transaction

        /*Optional*/

        if ($this->db->trans_status() === FALSE) {
            # Something went wrong.
            $this->db->trans_rollback();
            return FALSE;
        } 
        else {
            # Everything is Perfect. 
            # Committing data to the database.
            $this->db->trans_commit();
            return TRUE;
        }
    }
    //-------------------- Other get results sum, avg, count -----------------------------
    public function get_row_sum_where($campo,$where)
    {
        $campo = $this->security->xss_clean($campo);
        $where = $this->security->xss_clean($where);
        $this->db->select_sum($campo);
        $this->db->where($where);
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->row();
    }
}