<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_Model
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
        $this->db->order_by('created_at', 'ASC');
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
    public function get_report($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('transaction');
        $this->db->where('transaction.status', 1);
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_cancel($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('transaction');
        $this->db->where('transaction.status', 0);
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }
    public function total_row()
    {
        $this->db->select('transaction.*, user.user_name');
        $this->db->from('transaction');
        $this->db->where('transaction.status', 1);
        // Join
        $this->db->join('user', 'user.id = transaction.created_by', 'LEFT');
        //End Join
        $this->db->order_by('transaction.id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function total_row_cancel()
    {
        $this->db->select('transaction.*, user.user_name');
        $this->db->from('transaction');
        $this->db->where('transaction.status', 0);
        // Join
        $this->db->join('user', 'user.id = transaction.created_by', 'LEFT');
        //End Join
        $this->db->order_by('transaction.id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    // Total Unit
    public function total_unit()
    {
        $this->db->select_sum('qty');
        $query = $this->db->get('transaction');
        $this->db->where('transaction.status', 1);
        if ($query->num_rows() > 0) {
            return $query->row()->qty;
        } else {
            return 0;
        }
    }
    // Total Pembelian
    public function total_pembelian()
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
    public function total_penjualan()
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
    public function total_profit()
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

    public function filter_report($start_date, $end_date, $customer_id)
    {
        $this->db->select('*');
        $this->db->from('transaction');
        $this->db->where('created_at >=', $start_date);
        $this->db->where('created_at <=', $end_date);
        $this->db->where('transaction.status', 1);
        $this->db->like('customer_id', $customer_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function total_pricebuy_date($start_date, $end_date, $customer_id)
    {
        $this->db->select_sum('total_price_buy');
        $this->db->where('created_at >=', $start_date);
        $this->db->where('created_at <=', $end_date);
        $this->db->where('transaction.status', 1);
        $this->db->like('customer_id', $customer_id);
        $query = $this->db->get('transaction');
        if ($query->num_rows() > 0) {
            return $query->row()->total_price_buy;
        } else {
            return 0;
        }
    }
    public function total_pricesell_date($start_date, $end_date, $customer_id)
    {
        $this->db->select_sum('total_price_sell');
        $this->db->where('created_at >=', $start_date);
        $this->db->where('created_at <=', $end_date);
        $this->db->like('customer_id', $customer_id);
        $this->db->where('transaction.status', 1);
        $query = $this->db->get('transaction');
        if ($query->num_rows() > 0) {
            return $query->row()->total_price_sell;
        } else {
            return 0;
        }
    }
    public function total_unit_date($start_date, $end_date, $customer_id)
    {
        $this->db->select_sum('qty');
        $this->db->where('created_at >=', $start_date);
        $this->db->where('created_at <=', $end_date);
        $this->db->where('transaction.status', 1);
        $this->db->like('customer_id', $customer_id);
        $query = $this->db->get('transaction');
        if ($query->num_rows() > 0) {
            return $query->row()->qty;
        } else {
            return 0;
        }
    }
    public function total_profit_date($start_date, $end_date, $customer_id)
    {
        $this->db->select_sum('total_profit');
        $this->db->where('created_at >=', $start_date);
        $this->db->where('created_at <=', $end_date);
        $this->db->where('transaction.status', 1);
        $this->db->like('customer_id', $customer_id);
        $query = $this->db->get('transaction');

        if ($query->num_rows() > 0) {
            return $query->row()->total_profit;
        } else {
            return 0;
        }
    }

    public function transaction_month()
    {
        $this->db->select('*');
        $this->db->from('transaction');
        $this->db->where('MONTH(created_at) = MONTH(NOW())');
        $this->db->where('transaction.status', 1);
        // $this->db->group_by('MONTH(created_at)');
        $query = $this->db->get();
        return $query->result();
    }
    public function pembelian_month()
    {
        $this->db->select_sum('total_price_buy');
        $this->db->where('MONTH(created_at) = MONTH(NOW())');
        $this->db->where('transaction.status', 1);
        $query = $this->db->get('transaction');

        if ($query->num_rows() > 0) {
            return $query->row()->total_price_buy;
        } else {
            return 0;
        }
    }
    public function penjualan_month()
    {
        $this->db->select_sum('total_price_sell');
        $this->db->where('MONTH(created_at) = MONTH(NOW())');
        $this->db->where('transaction.status', 1);
        $query = $this->db->get('transaction');

        if ($query->num_rows() > 0) {
            return $query->row()->total_price_sell;
        } else {
            return 0;
        }
    }
    public function profit_month()
    {
        $this->db->select_sum('total_profit');
        $this->db->where('MONTH(created_at) = MONTH(NOW())');
        $this->db->where('transaction.status', 1);
        $query = $this->db->get('transaction');

        if ($query->num_rows() > 0) {
            return $query->row()->total_profit;
        } else {
            return 0;
        }
    }
}
