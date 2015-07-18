<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Crud_model extends CI_Model
{
    /*	
	 *	Developed by: Active IT zone
	 *	Date	: 14 July, 2015
	 *	Active Supershop eCommerce CMS
	 *	http://codecanyon.net/user/activeitezone
	 */
	 
    function __construct()
    {
        parent::__construct();
    }
    
    function clear_cache()
    {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
    
    /////////GET NAME BY TABLE NAME AND ID/////////////
    function get_type_name_by_id($type, $type_id = '', $field = 'name')
    {
        if ($type_id != '') {
            $l = $this->db->get_where($type, array(
                $type . '_id' => $type_id
            ));
            $n = $l->num_rows();
            if ($n > 0) {
                return $l->row()->$field;
            }
        }
    }
    
    /////////Filter One/////////////
    function filter_one($table, $type, $value)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($type, $value);
        return $this->db->get()->result_array();
    }
    
    // FILE_UPLOAD
    function img_thumb($type, $id, $ext = '.jpg', $width = '400', $height = '400')
    {
        $this->load->library('image_lib');
        ini_set("memory_limit", "-1");
        
        $config1['image_library']  = 'gd2';
        $config1['create_thumb']   = TRUE;
        $config1['maintain_ratio'] = TRUE;
        $config1['width']          = $width;
        $config1['height']         = $height;
        $config1['source_image']   = 'uploads/' . $type . '_image/' . $type . '_' . $id . $ext;
        
        $this->image_lib->initialize($config1);
        $this->image_lib->resize();
        $this->image_lib->clear();
    }
    
    // FILE_UPLOAD
    function file_up($name, $type, $id, $multi = '', $no_thumb = '', $ext = '.jpg')
    {
        if ($multi == '') {
            move_uploaded_file($_FILES[$name]['tmp_name'], 'uploads/' . $type . '_image/' . $type . '_' . $id . $ext);
            if ($no_thumb == '') {
                $this->crud_model->img_thumb($type, $id, $ext);
            }
        } elseif ($multi == 'multi') {
            $ib = 1;
            foreach ($_FILES[$name]['name'] as $i => $row) {
                $ib = $this->file_exist_ret($type, $id, $ib);
                move_uploaded_file($_FILES[$name]['tmp_name'][$i], 'uploads/' . $type . '_image/' . $type . '_' . $id . '_' . $ib . $ext);
                if ($no_thumb == '') {
                    $this->crud_model->img_thumb($type, $id . '_' . $ib, $ext);
                }
            }
        }
    }
    
    // FILE_UPLOAD : EXT :: FILE EXISTS
    function file_exist_ret($type, $id, $ib, $ext = '.jpg')
    {
        if (file_exists('uploads/' . $type . '_image/' . $type . '_' . $id . '_' . $ib . $ext)) {
            $ib = $ib + 1;
            $ib = $this->file_exist_ret($type, $id, $ib);
            return $ib;
        } else {
            return $ib;
        }
    }
    
    
    // FILE_VIEW
    function file_view($type, $id, $width = '100', $height = '100', $thumb = 'no', $src = 'no', $multi = '', $multi_num = '', $ext = '.jpg')
    {
        if ($multi == '') {
            if (file_exists('uploads/' . $type . '_image/' . $type . '_' . $id . $ext)) {
                if ($thumb == 'no') {
                    $srcl = base_url() . 'uploads/' . $type . '_image/' . $type . '_' . $id . $ext;
                } elseif ($thumb == 'thumb') {
                    $srcl = base_url() . 'uploads/' . $type . '_image/' . $type . '_' . $id . '_thumb' . $ext;
                }
                
                if ($src == 'no') {
                    return '<img src="' . $srcl . '" height="' . $height . '" width="' . $width . '" />';
                } elseif ($src == 'src') {
                    return $srcl;
                }
            }
            
        } else if ($multi == 'multi') {
            $num    = $this->crud_model->get_type_name_by_id($type, $id, 'num_of_imgs');
            //$num = 2;
            $i      = 0;
            $p      = 0;
            $q      = 0;
            $return = array();
            while ($p < $num) {
                $i++;
                if (file_exists('uploads/' . $type . '_image/' . $type . '_' . $id . '_' . $i . $ext)) {
                    if ($thumb == 'no') {
                        $srcl = base_url() . 'uploads/' . $type . '_image/' . $type . '_' . $id . '_' . $i . $ext;
                    } elseif ($thumb == 'thumb') {
                        $srcl = base_url() . 'uploads/' . $type . '_image/' . $type . '_' . $id . '_' . $i . '_thumb' . $ext;
                    }
                    
                    if ($src == 'no') {
                        $return[] = '<img src="' . $srcl . '" height="' . $height . '" width="' . $width . '" />';
                    } elseif ($src == 'src') {
                        $return[] = $srcl;
                    }
                    $p++;
                } else {
                    $q++;
                    if ($q == 10) {
                        break;
                    }
                }
                
            }
            if (!empty($return)) {
                if ($multi_num == 'one') {
                    return $return[0];
                } else if ($multi_num == 'all') {
                    return $return;
                } else {
                    $n = $multi_num - 1;
                    unset($return[$n]);
                    return $return;
                }
            } else {
                return false;
            }
        }
    }
    
    
    // FILE_VIEW
    function file_dlt($type, $id, $ext = '.jpg', $multi = '', $m_sin = '')
    {
        if ($multi == '') {
            if (file_exists('uploads/' . $type . '_image/' . $type . '_' . $id . $ext)) {
                unlink("uploads/" . $type . "_image/" . $type . "_" . $id . $ext);
            }
            if (file_exists("uploads/" . $type . "_image/" . $type . "_" . $id . "_thumb" . $ext)) {
                unlink("uploads/" . $type . "_image/" . $type . "_" . $id . "_thumb" . $ext);
            }
            
        } else if ($multi == 'multi') {
            $num = $this->crud_model->get_type_name_by_id($type, $id, 'num_of_imgs');
            if ($m_sin == '') {
                $i = 0;
                $p = 0;
                while ($p < $num) {
                    $i++;
                    if (file_exists('uploads/' . $type . '_image/' . $type . '_' . $id . '_' . $i . $ext)) {
                        unlink("uploads/" . $type . "_image/" . $type . "_" . $id . '_' . $i . $ext);
                        $p++;
                        $data['num_of_imgs'] = $num - 1;
                        $this->db->where($type . '_id', $id);
                        $this->db->update($type, $data);
                    }
                    
                    if (file_exists("uploads/" . $type . "_image/" . $type . "_" . $id . '_' . $i . "_thumb" . $ext)) {
                        unlink("uploads/" . $type . "_image/" . $type . "_" . $id . '_' . $i . "_thumb" . $ext);
                    }
                    if ($i < 50) {
                        break;
                    }
                }
            } else {
                if (file_exists('uploads/' . $type . '_image/' . $type . '_' . $id . '_' . $m_sin . $ext)) {
                    unlink("uploads/" . $type . "_image/" . $type . "_" . $id . '_' . $m_sin . $ext);
                }
                if (file_exists("uploads/" . $type . "_image/" . $type . "_" . $id . '_' . $m_sin . "_thumb" . $ext)) {
                    unlink("uploads/" . $type . "_image/" . $type . "_" . $id . '_' . $m_sin . "_thumb" . $ext);
                }
                $data['num_of_imgs'] = $num - 1;
                $this->db->where($type . '_id', $id);
                $this->db->update($type, $data);
            }
        }
    }
    
    //DELETE MULTIPLE ITEMS	
    function multi_delete($type, $ids_array)
    {
        foreach ($ids_array as $row) {
            $this->file_dlt($type, $row);
            $this->db->where($type . '_id', $row);
            $this->db->delete($type);
        }
    }
    
    //DELETE SINGLE ITEM	
    function single_delete($type, $id)
    {
        $this->file_dlt($type, $id);
        $this->db->where($type . '_id', $id);
        $this->db->delete($type);
    }
    
    //GET PRODUCT LINK
    function product_link($product_id)
    {
        $name = str_replace(' ', '_', $this->crud_model->get_type_name_by_id('product', $product_id, 'title'));
        return base_url() . 'index.php/home/product_view/' . $product_id . '/' . $name;
    }
    
    /////////SELECT HTML/////////////
    function select_html($from, $name, $field, $type, $class, $e_match = '', $condition = '', $c_match = '', $onchange = '')
    {
        $return = '';
        $other  = '';
        $multi  = 'no';
        $phrase = 'Choose a ' . $name;
        if ($class == 'demo-cs-multiselect') {
            $other = 'multiple';
            $name  = $name . '[]';
            if ($type == 'edit') {
                $e_match = json_decode($e_match);
                if ($e_match == NULL) {
                    $e_match = array();
                }
                $multi = 'yes';
            }
        }
        $return = '<select name="' . $name . '" onChange="' . $onchange . '(this.value)" class="' . $class . '" ' . $other . '  data-placeholder="' . $phrase . '" tabindex="2" >';
        if (!is_array($from)) {
            if ($condition == '') {
                $all = $this->db->get($from)->result_array();
            } else if ($condition !== '') {
                $all = $this->db->get_where($from, array(
                    $condition => $c_match
                ))->result_array();
            }
            
            $return .= '<option value="">Choose one</option>';
            
            foreach ($all as $row):
                if ($type == 'add') {
                    $return .= '<option value="' . $row[$from . '_id'] . '">' . $row[$field] . '</option>';
                } else if ($type == 'edit') {
                    $return .= '<option value="' . $row[$from . '_id'] . '" ';
                    if ($multi == 'no') {
                        if ($row[$from . '_id'] == $e_match) {
                            $return .= 'selected=."selected"';
                        }
                    } else if ($multi == 'yes') {
                        if (in_array($row[$from . '_id'], $e_match)) {
                            $return .= 'selected=."selected"';
                        }
                    }
                    $return .= '>' . $row[$field] . '</option>';
                }
            endforeach;
        } else {
            $all = $from;
            $return .= '<option value="">Choose one</option>';
            foreach ($all as $row):
                if ($type == 'add') {
                    $return .= '<option value="' . $row . '">';
                    if ($condition == '') {
                        $return .= ucfirst(str_replace('_', ' ', $row));
                    } else {
                        $return .= $this->crud_model->get_type_name_by_id($condition, $row, $c_match);
                    }
                    $return .= '</option>';
                } else if ($type == 'edit') {
                    $return .= '<option value="' . $row . '" ';
                    if ($row == $e_match) {
                        $return .= 'selected=."selected"';
                    }
                    $return .= '>';
                    
                    if ($condition == '') {
                        $return .= ucfirst(str_replace('_', ' ', $row));
                    } else {
                        $return .= $this->crud_model->get_type_name_by_id($condition, $row, $c_match);
                    }
                    
                    $return .= '</option>';
                }
            endforeach;
        }
        $return .= '</select>';
        return $return;
    }
    
    //CHECK IF PRODUCT EXISTS IN TABLE
    function exists_in_table($table, $field, $val)
    {
        $ret = '';
        $res = $this->db->get($table)->result_array();
        foreach ($res as $row) {
            if ($row[$field] == $val) {
                $ret = $row[$table . '_id'];
            }
        }
        if ($ret == '') {
            return false;
        } else {
            return $ret;
        }
        
    }
    
    //FORM FIELDS
    function form_fields($array)
    {
        $return = '';
        foreach ($array as $row) {
            $return .= '<div class="form-group">';
            $return .= '    <label class="col-sm-4 control-label" for="demo-hor-inputpass">' . $row . '</label>';
            $return .= '    <div class="col-sm-6">';
            $return .= '       <input type="text" name="ad_field_values[]" id="demo-hor-inputpass" class="form-control">';
            $return .= '       <input type="hidden" name="ad_field_names[]" value="' . $row . '" >';
            $return .= '    </div>';
            $return .= '</div>';
        }
        return $return;
    }
    
    // PAGINATION
    function pagination($type, $per, $link, $f_o, $f_c, $other, $current, $seg = '3', $ord = 'desc')
    {
        $t   = explode('#', $other);
        $t_o = $t[0];
        $t_c = $t[1];
        $c   = explode('#', $current);
        $c_o = $c[0];
        $c_c = $c[1];
        
        $this->load->library('pagination');
        $this->db->order_by($type . '_id', $ord);
        $config['total_rows']  = $this->db->count_all_results($type);
        $config['base_url']    = base_url() . $link;
        $config['per_page']    = $per;
        $config['uri_segment'] = $seg;
        
        $config['first_link']      = '&laquo;';
        $config['first_tag_open']  = $t_o;
        $config['first_tag_close'] = $t_c;
        
        $config['last_link']      = '&raquo;';
        $config['last_tag_open']  = $t_o;
        $config['last_tag_close'] = $t_c;
        
        $config['prev_link']      = '&lsaquo;';
        $config['prev_tag_open']  = $t_o;
        $config['prev_tag_close'] = $t_c;
        
        $config['next_link']      = '&rsaquo;';
        $config['next_tag_open']  = $t_o;
        $config['next_tag_close'] = $t_c;
        
        $config['full_tag_open']  = $f_o;
        $config['full_tag_close'] = $f_c;
        
        $config['cur_tag_open']  = $c_o;
        $config['cur_tag_close'] = $c_c;
        
        $config['num_tag_open']  = $t_o;
        $config['num_tag_close'] = $t_c;
        $this->pagination->initialize($config);
        
        $this->db->order_by($type . '_id', $ord);
        return $this->db->get($type, $config['per_page'], $this->uri->segment($seg))->result_array();
    }
    
    //IF PRODUCT ADDED TO CART
    function is_added_to_cart($product_id, $set = '')
    {
        $carted = $this->cart->contents();
        if (count($carted) > 0) {
            foreach ($carted as $items) {
                if ($items['id'] == $product_id) {
                    
                    if ($set == '') {
                        return true;
                    } else {
                        return $items[$set];
                    }
                }
            }
        } else {
            return false;
        }
    }
    
    //TOTALING OF CART ITEMS BY TYPE
    function cart_total_it($type)
    {
        $carted = $this->cart->contents();
        $ret    = 0;
        if (count($carted) > 0) {
            foreach ($carted as $items) {
                $ret += $items[$type] * $items['qty'];
            }
            return $ret;
        } else {
            return false;
        }
    }
    
    //SALE WISE TOTAL BY TYPE
    function db_sale_total_it($sale_id, $type)
    {
        $carted = json_decode($this->db->get_where('sale', array(
            'sale_id' => $sale_id
        ))->row()->product_details, true);
        $ret    = 0;
        if (count($carted) > 0) {
            foreach ($carted as $items) {
                $ret += $items[$type] * $items['qty'];
            }
            return $ret;
        } else {
            return false;
        }
    }
    
    
    //GETTING ADDITIONAL FIELDS FOR PRODUCT ADD
    function get_additional_fields($product_id)
    {
        $additional_fields = $this->crud_model->get_type_name_by_id('product', $product_id, 'additional_fields');
        $ab                = json_decode($additional_fields);
        foreach ($ab as $i => $row) {
            
            if ($i == 'name') {
                $name = json_decode($row);
            }
            
            if ($i == 'value') {
                $value = json_decode($row);
            }
            
        }
        if ($name == false || $value == false) {
            return array();
        }
        foreach ($name as $n => $row) {
            $final[] = array(
                'name' => $row,
                'value' => $value[$n]
            );
        }
        
        return $final;
    }
    
    //DECREASEING PRODUCT QUANTITY
    function decrease_quantity($product_id, $quantity, $sale_id = '')
    {
        $prev_quantity          = $this->crud_model->get_type_name_by_id('product', $product_id, 'current_stock');
        $data1['current_stock'] = $prev_quantity - $quantity;
        if ($data1['current_stock'] < 0) {
            $data1['current_stock'] = 0;
        }
        $this->db->where('product_id', $product_id);
        $this->db->update('product', $data1);
        
        $data['type']         = 'destroy';
        $data['category']     = $this->get_type_name_by_id('product', $product_id, 'category');
        $data['sub_category'] = $this->get_type_name_by_id('product', $product_id, 'sub_category');
        $data['product']      = $product_id;
        $data['quantity']     = $quantity;
        $data['rate']         = '';
        $data['total']        = '';
        $data['sale_id']      = $sale_id;
        $data['reason_note']  = 'sale';
        $data['datetime']     = time();
        $this->db->insert('stock', $data);
    }
    
    //INCREASEING PRODUCT QUANTITY
    function increase_quantity($product_id, $quantity, $sale_id = '')
    {
        $prev_quantity          = $this->crud_model->get_type_name_by_id('product', $product_id, 'current_stock');
        $data1['current_stock'] = $prev_quantity + $quantity;
        if ($data1['current_stock'] < 0) {
            $data1['current_stock'] = 0;
        }
        $this->db->where('product_id', $product_id);
        $this->db->update('product', $data1);
        
        $data['type']         = 'add';
        $data['category']     = $this->get_type_name_by_id('product', $product_id, 'category');
        $data['sub_category'] = $this->get_type_name_by_id('product', $product_id, 'sub_category');
        $data['product']      = $product_id;
        $data['quantity']     = $quantity;
        $data['rate']         = '';
        $data['total']        = '';
        $data['sale_id']      = $sale_id;
        $data['reason_note']  = 'sale';
        $data['datetime']     = time();
        $this->db->insert('stock', $data);
    }
    
    //IF PRODUCT IS IN SALE
    function product_in_sale($sale_id, $product_id, $field)
    {
        $return          = '';
        $product_details = json_decode($this->get_type_name_by_id('sale', $sale_id, 'product_details'), true);
        foreach ($product_details as $row) {
            if ($row['id'] == $product_id) {
                $return = $row[$field];
            }
        }
        if ($return == '') {
            return false;
        } else {
            return $return;
        }
    }
    
    //GETTING IDS OF A TABLE FILTERING SPECIFIC TYPE OF VALUE RANGE
    function ids_between_values($table, $value_type, $up_val, $down_val)
    {
        $this->db->order_by($table . '_id', 'desc');
        return $this->db->get_where($table, array(
            $value_type . ' <=' => $up_val,
            $value_type . ' >=' => $down_val
        ))->result_array();
    }
    
    //DAYS START-END TIMESTAMP
    function date_timestamp($date, $type)
    {
        $date = explode('-', $date);
        $d    = $date[2];
        $m    = $date[1];
        $y    = $date[0];
        if ($type == 'start') {
            return mktime(0, 0, 0, $m, $d, $y);
        }
        if ($type == 'end') {
            return mktime(0, 0, 0, $m, $d + 1, $y);
        }
    }
    
    //GETTING STOCK REPORT
    function stock_report($product_id)
    {
        $report = array();
        $start  = $this->get_type_name_by_id('product', $product_id, 'add_timestamp');
        $end    = time();
        $stock  = 0;
        
        $diff = 86400;
        $days = array();
        while ($end > $start) {
            $date = date('Y-m-d', $start);
            $start += $diff;
            $dstart     = $this->date_timestamp($date, 'start');
            $dend       = $this->date_timestamp($date, 'end');
            $all_stocks = $this->ids_between_values('stock', 'datetime', $dend, $dstart);
            
            $all_stocks = array_reverse($all_stocks);
            
            foreach ($all_stocks as $row) {
                if ($row['product'] == $product_id) {
                    if ($row['type'] == 'add') {
                        $stock += $row['quantity'];
                    } else if ($row['type'] == 'destroy') {
                        $stock -= $row['quantity'];
                    }
                }
            }
            $report[] = array(
                'date' => $date,
                'stock' => $stock
            );
        }
        //return array_reverse($report);
        return $report;
    }
    
    //GETTING ALL SALE DATES
    function all_sale_date($product_id)
    {
        $dates = array();
        $sales = $this->db->get('sale')->result_array();
        foreach ($sales as $i => $row) {
            if ($this->product_in_sale($row['sale_id'], $product_id, 'id')) {
                $date = $this->get_type_name_by_id('sale', $row['sale_id'], 'sale_datetime');
                $date = date('Y-m-d', $date);
                if (!in_array($date, $dates)) {
                    array_push($dates, $date);
                }
            }
        }
        return $dates;
    }
    
    //GETTING ALL SALE DATES
    function all_sale_date_n($product_id)
    {
        $dates      = array();
        $first_date = '';
        $sales      = $this->db->get('sale')->result_array();
        foreach ($sales as $i => $row) {
            if ($this->product_in_sale($row['sale_id'], $product_id, 'id')) {
                $first_date = $this->get_type_name_by_id('sale', $row['sale_id'], 'sale_datetime');
                break;
            }
        }
        if ($first_date !== '') {
            $current = $first_date;
            $last    = time();
            while ($current <= $last) {
                $dates[] = date('Y-m-d', $current);
                $current = strtotime('+1 day', $current);
            }
        }
        return $dates;
        
    }
    
    //GETTING SALE DETAILS BY PRODUCT DAYS
    function sale_details_by_product_date($product_id, $date, $type)
    {
        
        $return   = 0;
        $up_val   = $this->date_timestamp($date, 'end');
        $down_val = $this->date_timestamp($date, 'start');
        $sales    = $this->ids_between_values('sale', 'sale_datetime', $up_val, $down_val);
        foreach ($sales as $i => $row) {
            if ($a = $this->product_in_sale($row['sale_id'], $product_id, $type)) {
                $return += $a;
            }
        }
        return $return;
    }
    
    //GETTING TOTAL OF A VALUE TYPE IN SALES
    function total_sale($product_id, $field = 'qty')
    {
        $return = 0;
        $sales  = $this->db->get('sale')->result_array();
        foreach ($sales as $row) {
            if ($a = $this->product_in_sale($row['sale_id'], $product_id, $field)) {
                $return += $a;
            }
        }
        return $return;
    }
    
    //GETTING MOST SOLD PRODUCTS
    function most_sold_products()
    {
        $result  = array();
        $product = $this->db->get('product')->result_array();
        foreach ($product as $row) {
            $result[] = array(
                'id' => $row['product_id'],
                'sale' => $this->total_sale($row['product_id'])
            );
        }
        if (!function_exists('compare_lastname')) {
            function compare_lastname($a, $b)
            {
                return strnatcmp($b['sale'], $a['sale']);
            }
        }
        
        usort($result, 'compare_lastname');
        return $result;
    }
    
    
    
    //GETTING BOOTSTRAP COLUMN VALUE
    function boot($num)
    {
        return (12 / $num);
    }
    
    //GETTING LIMITING CHARECTER
    function limit_chars($string, $char_limit)
    {
        $length = 0;
        $return = array();
        $words  = explode(" ", $string);
        foreach ($words as $row) {
            $length += strlen($row);
            $length += 1;
            if ($length < $char_limit) {
                array_push($return, $row);
            } else {
                array_push($return, '...');
                break;
            }
        }
        
        return implode(" ", $return);
    }
    
    //GETTING LOGO BY TYPE
    function logo($type)
    {
        $logo = $this->db->get_where('ui_settings', array(
            'type' => $type
        ))->row()->value;
        return base_url() . 'uploads/logo_image/logo_' . $logo . '.png';
    }
    
    //GETTING PRODUCT PRICE CALCULATING DISCOUNT
    function get_product_price($product_id)
    {
        $price         = $this->get_type_name_by_id('product', $product_id, 'sale_price');
        $discount      = $this->get_type_name_by_id('product', $product_id, 'discount');
        $discount_type = $this->get_type_name_by_id('product', $product_id, 'discount_type');
        if ($discount_type == 'amount') {
            $number = ($price - $discount);
        }
        if ($discount_type == 'percent') {
            $number = ($price - ($discount * $price / 100));
        }
        return number_format((float) $number, 2, '.', '');
    }
    
    //GETTING SHIPPING COST
    function get_shipping_cost($product_id)
    {
        $price              = $this->get_type_name_by_id('product', $product_id, 'sale_price');
        $shipping           = $this->get_type_name_by_id('product', $product_id, 'shipping_cost');
        $shipping_cost_type = $this->get_type_name_by_id('business_settings', '3', 'value');
        if ($shipping_cost_type == 'product_wise') {
            return ($shipping);
        }
        if ($shipping_cost_type == 'fixed') {
            return 0;
        }
    }
    
    //GETTING PRODUCT TAX
    function get_product_tax($product_id)
    {
        $price    = $this->get_type_name_by_id('product', $product_id, 'sale_price');
        $tax      = $this->get_type_name_by_id('product', $product_id, 'tax');
        $tax_type = $this->get_type_name_by_id('product', $product_id, 'tax_type');
        if ($tax_type == 'amount') {
            return $tax;
        }
        if ($tax_type == 'percent') {
            return ($tax * $price / 100);
        }
    }
    
    
    //GETTING MONTH'S TOTAL BY TYPE
    function month_total($type, $filter1 = '', $filter_val1 = '', $filter2 = '', $filter_val2 = '', $notmatch = '', $notmatch_val = '')
    {
        $ago = time() - (86400 * 30);
        $a   = 0;
        if ($type == 'sale') {
            $result = $this->db->get_where('sale', array(
                'sale_datetime >= ' => $ago,
                'payment_status' => 'paid',
                'sale_datetime <= ' => time()
            ))->result_array();
            foreach ($result as $row) {
                $res_cat = $this->db->get_where('product', array(
                    'category' => $filter_val1
                ))->result_array();
                foreach ($res_cat as $row1) {
                    if ($p = $this->product_in_sale($row['sale_id'], $row1['product_id'], 'subtotal')) {
                        $a += $p;
                    }
                }
            }
        } else if ($type == 'stock') {
            $result = $this->db->get_where('stock', array(
                'datetime >= ' => $ago,
                'datetime <= ' => time()
            ))->result_array();
            foreach ($result as $row) {
                if ($row[$filter2] == $filter_val2) {
                    if ($row[$filter1] == $filter_val1) {
                        if ($notmatch == '') {
                            $a += $row['total'];
                        } else {
                            if ($row[$notmatch] !== $notmatch_val) {
                                $a += $row['total'];
                            }
                        }
                    }
                }
            }
        }
        return $a;
    }
    
    //GETTING ADMIN PERMISSION
    function admin_permission($codename)
    {
        if ($this->session->userdata('admin_login') != 'yes') {
            return false;
        }
        $admin_id   = $this->session->userdata('admin_id');
        $admin      = $this->db->get_where('admin', array(
            'admin_id' => $admin_id
        ))->row();
        $permission = $this->db->get_where('permission', array(
            'codename' => $codename
        ))->row()->permission_id;
        if ($admin->role == 1) {
            return true;
        } else {
            $role             = $admin->role;
            $role_permissions = json_decode($this->crud_model->get_type_name_by_id('role', $role, 'permission'));
            if (in_array($permission, $role_permissions)) {
                return true;
            } else {
                return false;
            }
        }
    }
    
    
    //GETTING USER TOTAL
    function user_total($last_days = 0)
    {
        if ($last_days == 0) {
            $time = 0;
        } else {
            $time = time() - (24 * 60 * 60 * $last_days);
        }
        $sales  = $this->db->get_where('sale', array(
            'buyer' => $this->session->userdata('user_id'),
            'payment_status' => 'paid',
            'sale_datetime >=' => $time
        ))->result_array();
        $return = 0;
        foreach ($sales as $row) {
            $return += $row['grand_total'];
        }
        return number_format((float) $return, 2, '.', '');
    }
    
    
    //GETTING NUMBER OF WISHED PRODUCTS BY CURRENT USER
    function user_wished()
    {
        $user = $this->session->userdata('user_id');
        return count(json_decode($this->get_type_name_by_id('user', $user, 'wishlist')));
    }
    
    //ADDING PRODUCT TO WISHLIST
    function add_wish($product_id)
    {
        $user = $this->session->userdata('user_id');
        if ($this->get_type_name_by_id('user', $user, 'wishlist') !== 'null') {
            $wished = json_decode($this->get_type_name_by_id('user', $user, 'wishlist'));
        } else {
            $wished = array();
        }
        if ($this->is_wished($product_id) == 'no') {
            array_push($wished, $product_id);
            $this->db->where('user_id', $user);
            $this->db->update('user', array(
                'wishlist' => json_encode($wished)
            ));
        }
    }
    
    //REMOVING PRODUCT FROM WISHLIST
    function remove_wish($product_id)
    {
        $user = $this->session->userdata('user_id');
        if ($this->get_type_name_by_id('user', $user, 'wishlist') !== 'null') {
            $wished = json_decode($this->get_type_name_by_id('user', $user, 'wishlist'));
        } else {
            $wished = array();
        }
        $wished_new = array();
        foreach ($wished as $row) {
            if ($row !== $product_id) {
                $wished_new[] = $row;
            }
        }
        $this->db->where('user_id', $user);
        $this->db->update('user', array(
            'wishlist' => json_encode($wished_new)
        ));
    }
    
    
    //NUMBER OF WISHED PRODUCTS
    function wished_num()
    {
        $user = $this->session->userdata('user_id');
        if ($this->get_type_name_by_id('user', $user, 'wishlist') !== '') {
            return count(json_decode($this->get_type_name_by_id('user', $user, 'wishlist')));
        } else {
            return 0;
        }
    }
    
    
    //IF PRODUCT IS ADDED TO CURRENT USER'S WISHLIST
    function is_wished($product_id)
    {
        if ($this->session->userdata('user_login') == 'yes') {
            $user = $this->session->userdata('user_id');
            //$wished = array('0');
            if ($this->get_type_name_by_id('user', $user, 'wishlist') !== '') {
                $wished = json_decode($this->get_type_name_by_id('user', $user, 'wishlist'));
            } else {
                $wished = array(
                    '0'
                );
            }
            if (in_array($product_id, $wished)) {
                return 'yes';
            } else {
                return 'no';
            }
        } else {
            return 'no';
        }
    }
    
    //GETTING TOTAL WISHED PRODUCTT BY USER
    function total_wished($product_id)
    {
        $num   = 0;
        $users = $this->db->get('user')->result_array();
        foreach ($users as $row) {
            $wishlist = json_decode($row['wishlist']);
            if (is_array($wishlist)) {
                if (in_array($product_id, $wishlist)) {
                    $num++;
                }
            }
            
        }
        return $num;
    }
    
    //GETTING MOST WISHED PRODUCTS
    function most_wished()
    {
        $result  = array();
        $product = $this->db->get('product')->result_array();
        foreach ($product as $row) {
            $result[] = array(
                'title' => $row['title'],
                'wish_num' => $this->total_wished($row['product_id'])
            );
        }
        if (!function_exists('compare_lastname')) {
            function compare_lastname($a, $b)
            {
                return strnatcmp($b['wish_num'], $a['wish_num']);
            }
        }
        usort($result, 'compare_lastname');
        return $result;
    }
    
    //RATING
    function rating($product_id)
    {
        $total = $this->get_type_name_by_id('product', $product_id, 'rating_total');
        $num   = $this->get_type_name_by_id('product', $product_id, 'rating_num');
        if ($num > 0) {
            $number = $total / $num;
            return number_format((float) $number, 2, '.', '');
        } else {
            return 0;
        }
    }
    
    //IF CURRENT USER RATED THE PRODUCT
    function is_rated($product_id)
    {
        if ($this->session->userdata('user_login') == 'yes') {
            $user = $this->session->userdata('user_id');
            if ($this->get_type_name_by_id('product', $product_id, 'rating_user') !== '') {
                $rating_user = json_decode($this->get_type_name_by_id('product', $product_id, 'rating_user'));
            } else {
                $rating_user = array(
                    '0'
                );
            }
            if (in_array($user, $rating_user)) {
                return 'yes';
            } else {
                return 'no';
            }
        } else {
            return 'no';
        }
    }
    
    //SETTING RATING
    function set_rating($product_id, $rating)
    {
        if ($this->is_rated($product_id) == 'yes') {
            return 'no';
        }
        
        $total = $this->get_type_name_by_id('product', $product_id, 'rating_total');
        $num   = $this->get_type_name_by_id('product', $product_id, 'rating_num');
        $user  = $this->session->userdata('user_id');
        $total = $total + $rating;
        $num   = $num + 1;
        
        $rating_user = json_decode($this->get_type_name_by_id('product', $product_id, 'rating_user'));
        if (!is_array($rating_user)) {
            $rating_user = array();
        }
        array_push($rating_user, $user);
        
        $this->db->where('product_id', $product_id);
        $this->db->update('product', array(
            'rating_user' => json_encode($rating_user)
        ));
        $this->db->where('product_id', $product_id);
        $this->db->update('product', array(
            'rating_total' => $total
        ));
        $this->db->where('product_id', $product_id);
        $this->db->update('product', array(
            'rating_num' => $num
        ));
        
        return 'yes';
    }
    
    
    //GETTING IP DATA OF PEOPLE BROWING THE SYSTEM
    function ip_data()
    {
        $this->session->set_userdata('last_activity', time());
        $user_data = $this->session->userdata('surfer_info');
        $ip        = $_SERVER['REMOTE_ADDR'];
        if (!$user_data) {
            if ($_SERVER['HTTP_HOST'] !== 'localhost') {
                $ip_data = file_get_contents("http://ip-api.com/json/" . $ip);
                $this->session->set_userdata('surfer_info', $ip_data);
            }
        }
    }
    
    
    //GETTING TOTAL PURCHASE
    function total_purchase($user_id)
    {
        $return = 0;
        $sales  = $this->db->get('sale')->result_array();
        foreach ($sales as $row) {
            if ($row['buyer'] == $user_id) {
                $return += $row['grand_total'];
            }
        }
        return $this->cart->format_number($return);
    }
    
}