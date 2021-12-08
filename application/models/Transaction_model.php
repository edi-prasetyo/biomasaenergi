<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction_model extends CI_Model
{
    //load database
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_alltransaction()
    {
        $this->db->select('*');
        $this->db->from('transaction');
        $this->db->where('transaction.status', 1);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function new_transaction()
    {
        $this->db->select('*');
        $this->db->from('transaction');
        $this->db->where('transaction.status', 1);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(3);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_transaction($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('transaction');
        $this->db->where('transaction.status', 1);
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }
    public function total_row()
    {
        $this->db->select('transaction.*, user.user_name');
        $this->db->from('transaction');
        // Join
        $this->db->join('user', 'user.id = transaction.created_by', 'LEFT');
        //End Join
        $this->db->where('transaction.status', 1);
        $this->db->order_by('transaction.id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function detail($id)
    {
        $this->db->select('transaction. *, customer.company, user.user_name');
        $this->db->from('transaction');
        // Join
        $this->db->join('customer', 'customer.id = transaction.customer_id', 'LEFT');
        $this->db->join('user', 'user.id = transaction.created_by', 'LEFT');
        $this->db->where(['transaction.id' => $id, 'transaction.status'  => 1]);
        $query = $this->db->get();
        return $query->row();
    }
    public function last_detail($insert_id)
    {
        $this->db->select('*');
        $this->db->from('transaction');
        $this->db->where(['transaction.id' => $insert_id, 'transaction.status'   => 1]);
        $query = $this->db->get();
        return $query->row();
    }
    // Total Pembelian
    public function get_pembelian()
    {
        $this->db->select_sum('total_price_buy');
        $query = $this->db->get('transaction');
        $this->db->where('transaction.status', 1);
        if ($query->num_rows() > 0) {
            return $query->row()->total_price_buy;
        } else {
            return 0;
        }
    }
    // Total penjualan
    public function get_penjualan()
    {
        $this->db->select_sum('total_price_sell');
        $query = $this->db->get('transaction');
        $this->db->where('transaction.status', 1);
        if ($query->num_rows() > 0) {
            return $query->row()->total_price_sell;
        } else {
            return 0;
        }
    }
    // Total Profit
    public function get_profit()
    {
        $this->db->select_sum('total_profit');
        $this->db->where('transaction.status', 1);
        $query = $this->db->get('transaction');

        if ($query->num_rows() > 0) {
            return $query->row()->total_profit;
        } else {
            return 0;
        }
    }

    // Perday
    // public function get_chart()
    // {
    //     $this->db->select('transaction.*, COUNT(transaction.id) AS total');
    //     $this->db->from('transaction');
    //     $this->db->group_by('DATE(created_at)');
    //     $this->db->order_by('DATE(created_at)', 'DESC');
    //     $this->db->limit(12);
    //     $query = $this->db->get();
    //     return $query->result();
    // }
    // Permonth
    public function get_chart()
    {
        $this->db->select('transaction.*, COUNT(id) AS total');
        $this->db->from('transaction');
        $this->db->where('transaction.status', 1);
        $this->db->group_by(['total' => 'MONTH(created_at)']);
        $this->db->order_by('DATE(created_at)', 'ASC');
        $this->db->limit(12);
        $query = $this->db->get();
        return $query->result();
    }

    //Create
    public function create($data)
    {
        $this->db->insert('transaction', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    //Update Data
    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('transaction', $data);
    }
    public function update_paid($data)
    {
        $this->db->where('md5(id)', $data['id']);
        $this->db->update('transaction', $data);
    }
    //Hapus Data Dari Database
    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('transaction', $data);
    }
}
