<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
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
        $this->load->database();
        $this->load->library('paypal');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->crud_model->ip_data();
    }
    
    /* FUNCTION: Loads Homepage*/
    public function index()
    {
        $page_data['min'] = $this->get_range_lvl('product_id !=', '', "min");
        $page_data['max'] = $this->get_range_lvl('product_id !=', '', "max");
        $this->db->order_by('product_id', 'desc');
        $page_data['featured_data'] = $this->db->get_where('product', array(
            'featured' => "ok",
            'status' => 'ok'
        ))->result_array();
        $page_data['page_name']     = "home";
        $page_data['page_title']    = translate('home');
        $this->load->view('front/index', $page_data);
    }
    
    /* FUNCTION: Loads Customer Profile Page */
    function profile()
    {
        if ($this->session->userdata('user_login') != "yes") {
            redirect(base_url(), 'refresh');
        }
        $page_data['page_name']    = "profile";
        $page_data['page_title']   = translate('my_profile');
        $page_data['all_products'] = $this->db->get_where('user', array(
            'user_id' => $this->session->userdata('user_id')
        ))->result_array();
        $page_data['user_info']    = $this->db->get_where('user', array(
            'user_id' => $this->session->userdata('user_id')
        ))->result_array();
        
        $this->load->view('front/index', $page_data);
    }
    
    /* FUNCTION: Loads Category filter page */
    function category($para1 = "", $para2 = "", $min = "", $max = "")
    {
        
        if ($para2 == "") {
            $page_data['all_products'] = $this->db->get_where('product', array(
                'category' => $para1
            ))->result_array();
        } else if ($para2 != "") {
            $page_data['all_products'] = $this->db->get_where('product', array(
                'sub_category' => $para2
            ))->result_array();
        }
        $page_data['range']            = $min . ';' . $max;
        $page_data['page_name']        = "product_list";
        $page_data['page_title']       = translate('products');
        $page_data['all_category']     = $this->db->get('category')->result_array();
        $page_data['all_sub_category'] = $this->db->get('sub_category')->result_array();
        $page_data['cur_sub_category'] = $para2;
        $page_data['cur_category']     = $para1;
        $page_data['category_data']    = $this->db->get_where('category', array(
            'category_id' => $para1
        ))->result_array();
        $this->load->view('front/index', $page_data);
    }
    
    /* FUNCTION: Search Products */
    function home_search($param = '')
    {
        $category = $this->input->post('category');
        $this->session->set_userdata('searched_cat', $category);
        if ($param !== 'top') {
            $sub_category = $this->input->post('sub_category');
            $range        = $this->input->post('range');
            $p            = explode(';', $range);
            redirect(base_url() . 'index.php/home/category/' . $category . '/' . $sub_category . '/' . $p[0] . '/' . $p[1], 'refresh');
        } else if ($param == 'top') {
            redirect(base_url() . 'index.php/home/category/' . $category, 'refresh');
        }
    }
    
    /* FUNCTION: Check if user logged in */
    function is_logged()
    {
        if ($this->session->userdata('user_login') == 'yes') {
            echo 'yah!good';
        } else {
            echo 'nope!bad';
        }
    }
    
    /* FUNCTION: Loads Product List */
    function listed($para1 = "", $para2 = "", $para3 = "")
    {
        $this->load->library('pagination');
        if ($para1 == "click") {
            if ($this->input->post('range')) {
                $range = $this->input->post('range');
            }
            $category     = $this->input->post('category');
            $category     = explode(',', $category);
            $sub_category = $this->input->post('sub_category');
            $sub_category = explode(',', $sub_category);
            $featured     = $this->input->post('featured');
            $name         = '';
            $cat          = '';
            $setter       = '';
            
            $this->db->where('status', 'ok');
            if ($featured == 'ok') {
                $this->db->where('featured', 'ok');
            }
            
            if (isset($range)) {
                $p = explode(';', $range);
                $this->db->where('sale_price >=', $p[0]);
                $this->db->where('sale_price <=', $p[1]);
            }
            
            $query = array();
            if (count($sub_category) > 0) {
                $i = 0;
                foreach ($sub_category as $row) {
                    $i++;
                    if ($row !== "") {
                        if ($row !== "0") {
                            $query[] = $row;
                            $setter  = 'get';
                        } else {
                            $this->db->where('sub_category !=', '0');
                        }
                    }
                }
                if ($setter == 'get') {
                    $this->db->where_in('sub_category', $query);
                }
            }
            
            if (count($category) > 0 && $setter !== 'get') {
                $i = 0;
                foreach ($category as $row) {
                    $i++;
                    if ($row !== "") {
                        if ($row !== "0") {
                            if ($i == 1) {
                                $this->db->where('category', $row);
                            } else {
                                $this->db->or_where('category', $row);
                            }
                        } else {
                            $this->db->where('category !=', '0');
                        }
                    }
                }
            }
            $this->db->order_by('product_id', 'desc');
            
            // pagination
            $config['total_rows'] = $this->db->count_all_results('product');
            $config['base_url']   = base_url() . 'index.php?home/listed/';
            if ($featured !== 'ok') {
                $config['per_page'] = 12;
            } else if ($featured == 'ok') {
                $config['per_page'] = 12;
            }
            $config['uri_segment']  = 5;
            $config['cur_page_giv'] = $para2;
            
            $function                  = "filter('click','none','none','0')";
            $config['first_link']      = '&laquo;';
            $config['first_tag_open']  = '<a rel="grow" class="btn-u btn-u-sea grow" onClick="' . $function . '">';
            $config['first_tag_close'] = '</a>';
            
            $rr                       = ($config['total_rows'] - 1) / $config['per_page'];
            $last_start               = floor($rr) * $config['per_page'];
            $function                 = "filter('click','none','none','" . $last_start . "')";
            $config['last_link']      = '&raquo;';
            $config['last_tag_open']  = '<a rel="grow" class="btn-u btn-u-sea grow" onClick="' . $function . '">';
            $config['last_tag_close'] = '</a>';
            
            $function                 = "filter('click','none','none','" . ($para2 - $config['per_page']) . "')";
            $config['prev_tag_open']  = '<a rel="grow" class="btn-u btn-u-sea grow" onClick="' . $function . '">';
            $config['prev_tag_close'] = '</a>';
            
            $function                 = "filter('click','none','none','" . ($para2 + $config['per_page']) . "')";
            $config['next_link']      = '&rsaquo;';
            $config['next_tag_open']  = '<a rel="grow" class="btn-u btn-u-sea grow" onClick="' . $function . '">';
            $config['next_tag_close'] = '</a>';
            
            $config['full_tag_open']  = '<ul class="pagination pagination-v2">';
            $config['full_tag_close'] = '</ul>';
            
            $config['cur_tag_open']  = '<a rel="grow" class="btn-u btn-u-red grow" class="active">';
            $config['cur_tag_close'] = '</a>';
            
            $function                = "filter('click','none','none',((this.innerHTML-1)*" . $config['per_page'] . "))";
            $config['num_tag_open']  = '<a rel="grow" class="btn-u btn-u-sea grow" onClick="' . $function . '">';
            $config['num_tag_close'] = '</a>';
            $this->pagination->initialize($config);
            
            
            $this->db->where('status', 'ok');
            if ($featured == 'ok') {
                $this->db->where('featured', 'ok');
                $grid_items_per_row = 3;
                $name               = 'Featured';
            } else {
                $grid_items_per_row = 3;
            }
            
            
            if (isset($range)) {
                $p = explode(';', $range);
                $this->db->where('sale_price >=', $p[0]);
                $this->db->where('sale_price <=', $p[1]);
            }
            
            $query = array();
            if (count($sub_category) > 0) {
                $i = 0;
                foreach ($sub_category as $row) {
                    $i++;
                    if ($row !== "") {
                        if ($row !== "0") {
                            $query[] = $row;
                            $setter  = 'get';
                        } else {
                            $this->db->where('sub_category !=', '0');
                        }
                    }
                }
                if ($setter == 'get') {
                    $this->db->where_in('sub_category', $query);
                }
            }
            
            if (count($category) > 0 && $setter !== 'get') {
                $i = 0;
                foreach ($category as $rowc) {
                    $i++;
                    if ($rowc !== "") {
                        if ($rowc !== "0") {
                            if ($i == 1) {
                                $this->db->where('category', $rowc);
                            } else {
                                $this->db->or_where('category', $rowc);
                            }
                        } else {
                            $this->db->where('category !=', '0');
                        }
                    }
                }
            }
            
            
            $this->db->order_by('product_id', 'desc');
            $page_data['all_products'] = $this->db->get('product', $config['per_page'], $para2)->result_array();
            
            if ($name != '') {
                $name .= ' : ';
            }
            if (isset($rowc)) {
                $cat = $rowc;
            } else {
                if ($setter == 'get') {
                    $cat = $this->crud_model->get_type_name_by_id('sub_category', $sub_category[0], 'category');
                }
            }
            if ($cat !== '') {
                if ($cat !== '0') {
                    $name .= $this->crud_model->get_type_name_by_id('category', $cat, 'category_name');
                } else {
                    $name = 'All Products';
                }
            } else {
                $name = 'All Products';
            }
            
        } elseif ($para1 == "load") {
            $page_data['all_products'] = $this->db->get('product')->result_array();
        }
        
        $page_data['category_data']      = $category;
        $page_data['viewtype']           = $para3;
        $page_data['name']               = $name;
        $page_data['count']              = $config['total_rows'];
        $page_data['grid_items_per_row'] = $grid_items_per_row;
        $this->load->view('front/listed', $page_data);
    }
    
    /* FUNCTION: Loads Featured Product Page */
    function featured_item($min = '', $max = '')
    {
        $page_data['page_name']        = "featured_list";
        $page_data['page_title']       = translate('featured_products');
        $page_data['range']            = $min . ';' . $max;
        $page_data['all_category']     = $this->db->get('category')->result_array();
        $page_data['all_sub_category'] = $this->db->get('sub_category')->result_array();
        $page_data['all_products']     = $this->db->get_where('product', array(
            'featured' => "ok",
            'status' => 'ok'
        ))->result_array();
        $this->load->view('front/index', $page_data);
    }
    
    /* FUNCTION: Loads Custom Pages */
    function page($parmalink = '')
    {
        $pagef                   = $this->db->get_where('page', array(
            'parmalink' => $parmalink
        ));
        $page_data['page_name']  = "page";
        $page_data['page_title'] = $parmalink;
        $page_data['page_items'] = $pagef->result_array();
        if ($this->session->userdata('admin_login') !== 'yes' && $pagef->row()->status !== 'ok') {
            redirect(base_url() . 'index.php/home/', 'refresh');
        }
        $this->load->view('front/index', $page_data);
    }
    
    
    /* FUNCTION: Loads Product View Page */
    function product_view($para1 = "")
    {
        $page_data['page_name']    = "product_view";
        $product_data              = $this->db->get_where('product', array(
            'product_id' => $this->security->xss_clean($para1),
            'status' => 'ok'
        ));
        $page_data['product_data'] = $product_data->result_array();
        $page_data['page_title']   = $product_data->row()->title;
        $page_data['product_tags'] = $product_data->row()->tag;
        
        $this->load->view('front/index', $page_data);
    }
    
    /* FUNCTION: Setting Frontend Language */
    function set_language($lang)
    {
        $this->session->set_userdata('language', $lang);
        $page_data['page_name'] = "home";
        redirect(base_url() . 'index.php/home/', 'refresh');
    }
    
    /* FUNCTION: Loads Contact Page */
    function contact($para1 = "")
    {
        $this->load->library('recaptcha');
        if ($para1 == 'send') {
            $this->recaptcha->recaptcha_check_answer();
            if ($this->recaptcha->getIsValid()) {
                $data['name']      = $this->input->post('name');
                $data['subject']   = $this->input->post('subject');
                $data['email']     = $this->input->post('email');
                $data['message']   = $this->input->post('message');
                $data['view']      = 'no';
                $data['timestamp'] = time();
                $this->db->insert('contact_message', $data);
                echo 'sent';
            } else {
                echo 'incor';
            }
        } else {
            $page_data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
            $page_data['page_name']      = "contact";
            $page_data['page_title']     = translate('contact');
            $this->load->view('front/index', $page_data);
        }
    }
    
    /* FUNCTION: Concerning Login */
    function login($para1 = "", $para2 = "")
    {
        $page_data['page_name'] = "login";
        if ($para1 == "do_login") {
            $signin_data = $this->db->get_where('user', array(
                'email' => $this->input->post('email'),
                'password' => sha1($this->input->post('password'))
            ));
            if ($signin_data->num_rows() > 0) {
                foreach ($signin_data->result_array() as $row) {
                    $this->session->set_userdata('user_login', 'yes');
                    $this->session->set_userdata('user_id', $row['user_id']);
                    $this->session->set_userdata('user_name', $row['username']);
                    $this->session->set_flashdata('alert', 'successful_signin');
                    $this->db->where('user_id', $row['user_id']);
                    $this->db->update('user', array(
                        'last_login' => time()
                    ));
                    echo 'done';
                }
            } else {
                echo 'failed';
            }
        } else if ($para1 == 'forget') {
            $query = $this->db->get_where('user', array(
                'email' => $this->input->post('email')
            ));
            if ($query->num_rows() > 0) {
                $user_id          = $query->row()->user_id;
                $password         = substr(hash('sha512', rand()), 0, 12);
                $data['password'] = sha1($password);
                $this->db->where('user_id', $user_id);
                $this->db->update('user', $data);
                if ($this->email_model->password_reset_email('user', $user_id, $password)) {
                    echo 'email_sent';
                } else {
                    echo 'email_not_sent';
                }
            } else {
                echo 'email_nay';
            }
        }
    }
    
    /* FUNCTION: Setting login page with facebook and google */
    function login_set($para1 = '', $para2 = '')
    {
        $fb_login_set = $this->crud_model->get_type_name_by_id('general_settings', '51', 'value');
        $g_login_set  = $this->crud_model->get_type_name_by_id('general_settings', '52', 'value');
        $page_data    = array();
        $appid        = $this->db->get_where('general_settings', array(
            'type' => 'fb_appid'
        ))->row()->value;
        $secret       = $this->db->get_where('general_settings', array(
            'type' => 'fb_secret'
        ))->row()->value;
        $config       = array(
            'appId' => $appid,
            'secret' => $secret
        );
        $this->load->library('Facebook', $config);
        
        if ($fb_login_set == 'ok') {
            // Try to get the user's id on Facebook
            $userId = $this->facebook->getUser();
            
            // If user is not yet authenticated, the id will be zero
            if ($userId == 0) {
                // Generate a login url
                //$page_data['url'] = $this->facebook->getLoginUrl(array('scope'=>'email')); 
                $page_data['url'] = $this->facebook->getLoginUrl(array(
                    'redirect_uri' => site_url('home/login_set/back/' . $para2),
                    'scope' => array(
                        "email"
                    ) // permissions here
                ));
                //redirect($data['url']);
            } else {
                // Get user's data and print it
                $page_data['user'] = $this->facebook->api('/me');
                $page_data['url']  = site_url('home/login_set/back/' . $para2); // Logs off application
                //print_r($user);
            }
            if ($para1 == 'back') {
                $user = $this->facebook->api('/me');
                if ($user_id = $this->crud_model->exists_in_table('user', 'fb_id', $user['id'])) {
                    
                } else {
                    $data['username']      = $user['name'];
                    $data['email']         = $user['email'];
                    $data['fb_id']         = $user['id'];
                    $data['wishlist']      = '[]';
                    $data['creation_date'] = time();
                    $data['password']      = substr(hash('sha512', rand()), 0, 12);
                    
                    $this->db->insert('user', $data);
                    $user_id = mysql_insert_id();
                }
                $this->session->set_userdata('user_login', 'yes');
                $this->session->set_userdata('user_id', $user_id);
                $this->session->set_userdata('user_name', $this->db->get_where('user', array(
                    'user_id' => $user_id
                ))->row()->username);
                $this->session->set_flashdata('alert', 'successful_signin');
                
                $this->db->where('user_id', $user_id);
                $this->db->update('user', array(
                    'last_login' => time()
                ));
                
                if ($para2 == 'cart') {
                    redirect(base_url() . 'index.php/home/cart_checkout', 'refresh');
                } else {
                    redirect(base_url() . 'index.php/home', 'refresh');
                }
            }
        }
        
        
        if ($g_login_set == 'ok') {
            $this->load->library('googleplus');
            if (isset($_GET['code'])) { //just_logged in
                $this->googleplus->client->authenticate();
                $_SESSION['token'] = $this->googleplus->client->getAccessToken();
                $g_user            = $this->googleplus->people->get('me');
                if ($user_id = $this->crud_model->exists_in_table('user', 'g_id', $g_user['id'])) {
                    
                } else {
                    $data['username']      = $g_user['displayName'];
                    $data['email']         = 'required';
                    $data['wishlist']      = '[]';
                    $data['g_id']          = $g_user['id'];
                    $data['g_photo']       = $g_user['image']['url'];
                    $data['creation_date'] = time();
                    $data['password']      = substr(hash('sha512', rand()), 0, 12);
                    $this->db->insert('user', $data);
                    $user_id = mysql_insert_id();
                }
                $this->session->set_userdata('user_login', 'yes');
                $this->session->set_userdata('user_id', $user_id);
                $this->session->set_userdata('user_name', $this->db->get_where('user', array(
                    'user_id' => $user_id
                ))->row()->username);
                $this->session->set_flashdata('alert', 'successful_signin');
                
                $this->db->where('user_id', $user_id);
                $this->db->update('user', array(
                    'last_login' => time()
                ));
                
                if ($para2 == 'cart') {
                    redirect(base_url() . 'index.php/home/cart_checkout', 'refresh');
                } else {
                    redirect(base_url() . 'index.php/home', 'refresh');
                }
            }
            if (@$_SESSION['token']) {
                $this->googleplus->client->setAccessToken($_SESSION['token']);
            }
            if ($this->googleplus->client->getAccessToken()) //already_logged_in
                {
                $page_data['g_user'] = $this->googleplus->people->get('me');
                $page_data['g_url']  = $this->googleplus->client->createAuthUrl();
                $_SESSION['token']   = $this->googleplus->client->getAccessToken();
            } else {
                $page_data['g_url'] = $this->googleplus->client->createAuthUrl();
            }
        }
        
        if ($para1 == 'login') {
            $this->load->view('front/login', $page_data);
        } elseif ($para1 == 'registration') {
            $this->load->view('front/logup', $page_data);
        }
    }
    
    /* FUNCTION: Logout set */
    function logout()
    {
        $appid  = $this->db->get_where('general_settings', array(
            'type' => 'fb_appid'
        ))->row()->value;
        $secret = $this->db->get_where('general_settings', array(
            'type' => 'fb_secret'
        ))->row()->value;
        $config = array(
            'appId' => $appid,
            'secret' => $secret
        );
        $this->load->library('Facebook', $config);
        
        $this->facebook->destroySession();
        $this->session->sess_destroy();
        redirect(base_url() . 'index.php/home/logged_out', 'refresh');
    }
    
    /* FUNCTION: Logout */
    function logged_out()
    {
        $this->session->set_flashdata('alert', 'successful_signout');
        redirect(base_url() . 'index.php/home/', 'refresh');
    }
    
    /* FUNCTION: Check if Email user exists */
    function exists()
    {
        $email  = $this->input->post('email');
        $user   = $this->db->get('user')->result_array();
        $exists = 'no';
        foreach ($user as $row) {
            if ($row['email'] == $email) {
                $exists = 'yes';
            }
        }
        echo $exists;
    }
    
    /* FUNCTION: Newsletter Subscription */
    function subscribe()
    {
        $subscribe_num = $this->session->userdata('subscriber');
        $email         = $this->input->post('email');
        $subscriber    = $this->db->get('subscribe')->result_array();
        $exists        = 'no';
        foreach ($subscriber as $row) {
            if ($row['email'] == $email) {
                $exists = 'yes';
            }
        }
        if ($exists == 'yes') {
            echo 'already';
        } else if ($subscribe_num >= 3) {
            echo 'already_session';
        } else if ($exists == 'no') {
            $subscribe_num = $subscribe_num + 1;
            $this->session->set_userdata('subscriber', $subscribe_num);
            $data['email'] = $email;
            $this->db->insert('subscribe', $data);
            echo 'done';
        }
    }
    
    /* FUNCTION: Customer Registration*/
    function registration($para1 = "", $para2 = "")
    {
        $page_data['page_name'] = "registration";
        if ($para1 == "add_info") {
            $data['username']      = $this->input->post('username');
            $data['email']         = $this->input->post('email');
            $data['address1']      = $this->input->post('address1');
            $data['address2']      = $this->input->post('address2');
            $data['phone']         = $this->input->post('phone');
            $data['surname']       = $this->input->post('surname');
            $data['zip']           = $this->input->post('zip');
            $data['city']          = $this->input->post('city');
            $data['langlat']       = '';
            $data['wishlist']      = '[]';
            $data['creation_date'] = time();
            
            if ($this->input->post('password1') == $this->input->post('password2')) {
                $password         = $this->input->post('password1');
                $data['password'] = sha1($password);
                $this->db->insert('user', $data);
                $this->email_model->account_opening('user', $data['email'], $password);
                redirect(base_url() . 'index.php/home/', 'refresh');
            }
        }
        if ($para1 == "update_info") {
            $id                  = $this->session->userdata('user_id');
            $data['username']    = $this->input->post('username');
            $data['surname']     = $this->input->post('surname');
            $data['address1']    = $this->input->post('address1');
            $data['address2']    = $this->input->post('address2');
            $data['phone']       = $this->input->post('phone');
            $data['city']        = $this->input->post('city');
            $data['skype']       = $this->input->post('skype');
            $data['google_plus'] = $this->input->post('google_plus');
            $data['facebook']    = $this->input->post('facebook');
            $data['zip']         = $this->input->post('zip');
            
            $this->crud_model->file_up('image', 'user', $id);
            
            $this->db->where('user_id', $id);
            $this->db->update('user', $data);
            redirect(base_url() . 'index.php/home/profile/', 'refresh');
        }
        if ($para1 == "update_password") {
            $user_data['password'] = $this->input->post('password');
            $account_data          = $this->db->get_where('user', array(
                'user_id' => $this->session->userdata('user_id')
            ))->result_array();
            foreach ($account_data as $row) {
                if (sha1($user_data['password']) == $row['password']) {
                    if ($this->input->post('password1') == $this->input->post('password2')) {
                        $data['password'] = sha1($this->input->post('password1'));
                        $this->db->where('user_id', $this->session->userdata('user_id'));
                        $this->db->update('user', $data);
                        redirect(base_url() . 'index.php/home/profile/', 'refresh');
                    }
                } else {
                    echo 'pass_prb';
                }
            }
            redirect(base_url() . 'index.php/home/', 'refresh');
        }
        $this->load->view('front/registration', $page_data);
    }
    
    function error()
    {
        $this->load->view('front/error');
    }
    
    
    /* FUNCTION: Product rating*/
    function rating($product_id, $rating)
    {
        if ($this->session->userdata('user_login') != "yes") {
            redirect(base_url() . 'index.php/home/login/', 'refresh');
        }
        if ($rating <= 5) {
            if ($this->crud_model->set_rating($product_id, $rating) == 'yes') {
                echo 'success';
            } else if ($this->crud_model->set_rating($product_id, $rating) == 'no') {
                echo 'already';
            }
        } else {
            echo 'failure';
        }
    }
    
    
    /* FUNCTION: Concering Add, Remove and Updating Cart Items*/
    function cart($para1 = '', $para2 = '', $para3 = '', $para4 = '')
    {
        
        if ($para1 == "add") {
            
            if ($para3 == '') {
                $para3 = 1;
            }
            
            $data = array(
                'id' => $para2,
                'qty' => $para3,
                'option' => str_replace('-', ',', str_replace('--', ')', str_replace('---', '(', $para4))),
                'price' => $this->crud_model->get_product_price($para2),
                'name' => $this->crud_model->get_type_name_by_id('product', $para2, 'title'),
                'shipping' => $this->crud_model->get_shipping_cost($para2),
                'tax' => $this->crud_model->get_product_tax($para2),
                'image' => $this->crud_model->file_view('product', $para2, '', '', 'thumb', 'src', 'multi', 'one')
            );
            
            $stock = $this->crud_model->get_type_name_by_id('product', $para2, 'current_stock');
            
            if (!$this->crud_model->is_added_to_cart($para2)) {
                if ($stock >= $para3) {
                    $this->cart->insert($data);
                    echo 'added';
                } else {
                    echo 'shortage';
                }
            } else {
                echo 'already';
            }
            
        }
        
        if ($para1 == "added_list") {
            $page_data['carted'] = $this->cart->contents();
            $this->load->view('front/added_list', $page_data);
        }
        
        if ($para1 == "empty") {
            $this->cart->destroy();
        }
        
        if ($para1 == "quantity_update") {
            
            $carted = $this->cart->contents();
            foreach ($carted as $items) {
                if ($items['rowid'] == $para2) {
                    $product = $items['id'];
                }
            }
            $current_quantity = $this->crud_model->get_type_name_by_id('product', $product, 'current_stock');
            $msg              = 'not_limit';
            
            foreach ($carted as $items) {
                if ($items['rowid'] == $para2) {
                    if ($current_quantity >= $para3) {
                        $data = array(
                            'rowid' => $items['rowid'],
                            'qty' => $para3
                        );
                    } else {
                        $msg  = $current_quantity;
                        $data = array(
                            'rowid' => $items['rowid'],
                            'qty' => $current_quantity
                        );
                    }
                } else {
                    $data = array(
                        'rowid' => $items['rowid'],
                        'qty' => $items['qty']
                    );
                }
                $this->cart->update($data);
            }
            $return = '';
            $carted = $this->cart->contents();
            foreach ($carted as $items) {
                if ($items['rowid'] == $para2) {
                    $return = currency() . $items['subtotal'];
                }
            }
            $return .= '---' . $msg;
            echo $return;
        }
        
        
        if ($para1 == "upd_color") {
            
            $carted = $this->cart->contents();
            
            foreach ($carted as $items) {
                if ($items['rowid'] == $para2) {
                    $rowid    = $items['rowid'];
                    $qty      = $items['qty'];
                    $id       = $items['id'];
                    $price    = $items['price'];
                    $name     = $items['name'];
                    $shipping = $items['shipping'];
                    $tax      = $items['tax'];
                    $image    = $items['image'];
                    
                    $data1 = array(
                        'rowid' => $items['rowid'],
                        'qty' => 0
                    );
                    
                    $this->cart->update($data1);
                    
                    $data2 = array(
                        'rowid' => $rowid,
                        'id' => $id,
                        'qty' => $qty,
                        'option' => str_replace('-', ',', str_replace('--', ')', str_replace('---', '(', $para3))),
                        'price' => $price,
                        'name' => $name,
                        'shipping' => $shipping,
                        'tax' => $tax,
                        'image' => $image
                    );
                    $this->cart->insert($data2);
                    
                }
            }
            $carted = $this->cart->contents();
        }
        
        if ($para1 == "remove_one") {
            $carted = $this->cart->contents();
            foreach ($carted as $items) {
                if ($items['rowid'] == $para2) {
                    $data = array(
                        'rowid' => $items['rowid'],
                        'qty' => 0
                    );
                } else {
                    $data = array(
                        'rowid' => $items['rowid'],
                        'qty' => $items['qty']
                    );
                }
                $this->cart->update($data);
            }
        }
        
        if ($para1 == 'calcs') {
            $total = $this->cart->total();
            if ($this->crud_model->get_type_name_by_id('business_settings', '3', 'value') == 'product_wise') {
                $shipping = $this->crud_model->cart_total_it('shipping');
            } elseif ($this->crud_model->get_type_name_by_id('business_settings', '3', 'value') == 'fixed') {
                $shipping = $this->crud_model->get_type_name_by_id('business_settings', '2', 'value');
            }
            $tax   = $this->crud_model->cart_total_it('tax');
            $grand = $total + $shipping + $tax;
            
            if ($para2 == 'full') {
                $total = $this->cart->format_number($total);
                $ship  = $this->cart->format_number($shipping);
                $tax   = $this->cart->format_number($tax);
                $grand = $this->cart->format_number($grand);
                $count = count($this->cart->contents());
                
                if ($total == '') {
                    $total = 0;
                }
                if ($ship == '') {
                    $ship = 0;
                }
                if ($tax == '') {
                    $tax = 0;
                }
                if ($grand == '') {
                    $grand = 0;
                }
                
                $total = currency() . $total;
                $ship  = currency() . $shipping;
                $tax   = currency() . $tax;
                $grand = currency() . $grand;
                
                echo $total . '-' . $ship . '-' . $tax . '-' . $grand . '-' . $count;
            }
        }
        
    }
    
    /* FUNCTION: Loads Cart Checkout Page*/
    function cart_checkout($para1 = "")
    {
        $carted = $this->cart->contents();
        if (count($carted) <= 0) {
            redirect(base_url() . 'index.php/home/', 'refresh');
        }
        $page_data['logger']     = $para1;
        $page_data['page_name']  = "cart";
        $page_data['page_title'] = translate('my_cart');
        $page_data['carted']     = $this->cart->contents();
        $this->load->view('front/index', $page_data);
    }
    
    
    /* FUNCTION: Finalising Purchase*/
    function cart_finish($para1 = "", $para2 = "")
    {
        if ($this->session->userdata('user_login') == 'yes') {
            $carted   = $this->cart->contents();
            $total    = $this->cart->total();
            $exchange = $this->crud_model->get_type_name_by_id('business_settings', '8', 'value');
            $vat_per  = '';
            $vat      = $this->crud_model->cart_total_it('tax');
            if ($this->crud_model->get_type_name_by_id('business_settings', '3', 'value') == 'product_wise') {
                $shipping = $this->crud_model->cart_total_it('shipping');
            } else {
                $shipping = $this->crud_model->get_type_name_by_id('business_settings', '2', 'value');
            }
            $grand_total     = $total + $vat + $shipping;
            $product_details = json_encode($carted);
            
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $this->db->update('user', array(
                'langlat' => $this->input->post('langlat')
            ));
            
            if ($this->input->post('payment_type') == 'paypal') {
                if ($para1 == 'go') {
                    
                    $data['buyer']             = $this->session->userdata('user_id');
                    $data['product_details']   = $product_details;
                    $data['shipping_address']  = json_encode($_POST);
                    $data['vat']               = $vat;
                    $data['vat_percent']       = $vat_per;
                    $data['shipping']          = $shipping;
                    $data['delivery_status']   = 'pending';
                    $data['payment_type']      = $para1;
                    $data['payment_status']    = 'due';
                    $data['payment_details']   = 'none';
                    $data['grand_total']       = $grand_total;
                    $data['sale_datetime']     = time();
                    $data['delivary_datetime'] = '';
                    $paypal_email              = $this->crud_model->get_type_name_by_id('business_settings', '1', 'value');
                    
                    $this->db->insert('sale', $data);
                    $sale_id           = mysql_insert_id();
                    $data['sale_code'] = date('Ym', $data['sale_datetime']) . $sale_id;
                    $this->db->where('sale_id', $sale_id);
                    $this->db->update('sale', $data);
                    
                    $this->session->set_userdata('sale_id', $sale_id);
                    
                    /****TRANSFERRING USER TO PAYPAL TERMINAL****/
                    $this->paypal->add_field('rm', 2);
                    $this->paypal->add_field('no_note', 0);
                    $this->paypal->add_field('cmd', '_cart');
                    $this->paypal->add_field('upload', '1');
                    $i = 1;
                    
                    foreach ($carted as $val) {
                        $this->paypal->add_field('item_number_' . $i, $i);
                        $this->paypal->add_field('item_name_' . $i, $val['name']);
                        $this->paypal->add_field('amount_' . $i, ($val['price'] / $exchange));
                        if ($this->crud_model->get_type_name_by_id('business_settings', '3', 'value') == 'product_wise') {
                            $this->paypal->add_field('shipping_' . $i, (($val['shipping'] / $exchange) * $val['qty']));
                        }
                        $this->paypal->add_field('tax_' . $i, ($val['tax'] / $exchange));
                        $this->paypal->add_field('quantity_' . $i, $val['qty']);
                        $i++;
                    }
                    if ($this->crud_model->get_type_name_by_id('business_settings', '3', 'value') == 'fixed') {
                        $this->paypal->add_field('shipping_1', ($this->crud_model->get_type_name_by_id('business_settings', '2', 'value') / $exchange));
                    }
                    //$this->paypal->add_field('amount', $grand_total);
                    $this->paypal->add_field('custom', $sale_id);
                    $this->paypal->add_field('business', $paypal_email);
                    $this->paypal->add_field('notify_url', base_url() . 'index.php/home/paypal_ipn');
                    $this->paypal->add_field('cancel_return', base_url() . 'index.php/home/paypal_cancel');
                    $this->paypal->add_field('return', base_url() . 'index.php/home/paypal_success');
                    
                    $this->paypal->submit_paypal_post();
                    // submit the fields to paypal
                }
                
                
            } else if ($this->input->post('payment_type') == 'cash_on_delivery') {
                if ($para1 == 'go') {
                    $data['buyer']             = $this->session->userdata('user_id');
                    $data['product_details']   = $product_details;
                    $data['shipping_address']  = json_encode($_POST);
                    $data['vat']               = $vat;
                    $data['vat_percent']       = $vat_per;
                    $data['shipping']          = $shipping;
                    $data['delivery_status']   = 'pending';
                    $data['payment_type']      = 'cash_on_delivery';
                    $data['payment_status']    = 'due';
                    $data['payment_details']   = '';
                    $data['grand_total']       = $grand_total;
                    $data['sale_datetime']     = time();
                    $data['delivary_datetime'] = '';
                    
                    $this->db->insert('sale', $data);
                    $sale_id           = mysql_insert_id();
                    $data['sale_code'] = date('Ym', $data['sale_datetime']) . $sale_id;
                    $this->db->where('sale_id', $sale_id);
                    $this->db->update('sale', $data);
                    
                    foreach ($carted as $value) {
                        $this->crud_model->decrease_quantity($value['id'], $value['qty'], $sale_id);
                    }
                    $this->cart->destroy();
                    //echo $sale_id;
                    redirect(base_url() . 'index.php/home/invoice/' . $sale_id, 'refresh');
                }
            }
            
        } else {
            //echo 'nope';
            redirect(base_url() . 'index.php/home/cart_checkout/need_login', 'refresh');
        }
        
    }
    
    
    /* FUNCTION: Verify paypal payment by IPN*/
    function paypal_ipn()
    {
        if ($this->paypal->validate_ipn() == true) {
            
            $data['payment_details']   = json_encode($_POST);
            $data['payment_timestamp'] = strtotime(date("m/d/Y"));
            $data['payment_type']      = 'paypal';
            $data['payment_status']    = 'paid';
            $sale_id                   = $_POST['custom'];
            $this->db->where('sale_id', $sale_id);
            $this->db->update('sale', $data);
        }
    }
    
    /* FUNCTION: Loads after cancelling paypal*/
    function paypal_cancel()
    {
        $sale_id = $this->session->userdata('sale_id');
        $this->db->where('sale_id', $sale_id);
        $this->db->delete('sale');
        $this->session->set_userdata('sale_id', '');
        $this->session->set_flashdata('alert', 'payment_cancel');
        redirect(base_url() . 'index.php/home/cart_checkout/', 'refresh');
    }
    
    /* FUNCTION: Loads after successful paypal payment*/
    function paypal_success()
    {
        $carted  = $this->cart->contents();
        $sale_id = $this->session->userdata('sale_id');
        foreach ($carted as $value) {
            $this->crud_model->decrease_quantity($value['id'], $value['qty']);
            $data['type']         = 'destroy';
            $data['category']     = $this->db->get_where('product', array(
                'product_id' => $value['id']
            ))->row()->category;
            $data['sub_category'] = $this->db->get_where('product', array(
                'product_id' => $value['id']
            ))->row()->sub_category;
            $data['product']      = $value['id'];
            $data['quantity']     = $value['qty'];
            $data['total']        = 0;
            $data['reason_note']  = 'sale';
            $data['sale_id']      = $sale_id;
            $data['datetime']     = time();
            $this->db->insert('stock', $data);
        }
        $this->cart->destroy();
        $this->session->set_userdata('sale_id', '');
        redirect(base_url() . 'index.php/home/invoice/' . $sale_id, 'refresh');
    }
    
    
    /* FUNCTION: Concerning wishlist*/
    function wishlist($para1 = "", $para2 = "")
    {
        if ($para1 == 'add') {
            $this->crud_model->add_wish($para2);
        } else if ($para1 == 'remove') {
            $this->crud_model->remove_wish($para2);
        } else if ($para1 == 'num') {
            echo $this->crud_model->wished_num();
        }
        
    }
    
    /* FUNCTION: Check if Customer is logged in*/
    function check_login($para1 = "")
    {
        if ($para1 == 'state') {
            if ($this->session->userdata('user_login') == 'yes') {
                echo 'hypass';
            }
            if ($this->session->userdata('user_login') !== 'yes') {
                echo 'nypose';
            }
        } else if ($para1 == 'id') {
            echo $this->session->userdata('user_id');
        } else {
            echo $this->crud_model->get_type_name_by_id('user', $this->session->userdata('user_id'), $para1);
        }
    }
    
    /* FUNCTION: Invoice showing*/
    function invoice($para1 = "", $para2 = "")
    {
        $page_data['sale_id']    = $para1;
        $page_data['page_name']  = "invoice";
        $page_data['page_title'] = translate('invoice');
        $this->load->view('front/index', $page_data);
    }
    
    /* FUNCTION: Legal pages load - terms & conditions / privacy policy*/
    function legal($type = "")
    {
        $page_data['type']       = $type;
        $page_data['page_name']  = "legal";
        $page_data['page_title'] = translate($type);
        $this->load->view('front/index', $page_data);
    }
    
    /* FUNCTION: Price Range Load by AJAX*/
    function get_ranger($by = "", $id = "", $start = '', $end = '')
    {
        $min = $this->get_range_lvl($by, $id, "min");
        $max = $this->get_range_lvl($by, $id, "max");
        if ($start == '') {
            $start = $min;
        }
        if ($end == '') {
            $end = $max;
        }
        
        $return = '' . '<input type="text" id="rangelvl" value="" name="range" />' . '<script>' . '	$("#rangelvl").ionRangeSlider({' . '		hide_min_max: false,' . '		keyboard: true,' . '		min:' . $min . ',' . '		max:' . $max . ',' . '		from:' . $start . ',' . '		to:' . $end . ',' . '		type: "double",' . '		step: 1,' . '		prefix: "$",' . '		grid: true,' . '		onFinish: function (data) {' . "			filter('click','none','none','0');" . '		}' . '	});' . '</script>';
        return $return;
    }
    
    /* FUNCTION: Price Range Load by AJAX*/
    function get_range_lvl($by = "", $id = "", $type = "")
    {
        if ($type == "min") {
            $set = 'asc';
        } elseif ($type == "max") {
            $set = 'desc';
        }
        $this->db->limit(1);
        $this->db->order_by('sale_price', $set);
        if (count($a = $this->db->get_where('product', array(
            $by => $id
        ))->result_array()) > 0) {
            foreach ($a as $r) {
                return $r['sale_price'];
            }
        } else {
            return 0;
        }
    }
    
    /* FUNCTION: AJAX loadable scripts*/
    function others($para1 = "", $para2 = "", $para3 = "", $para4 = "")
    {
        if ($para1 == "get_sub_by_cat") {
            $return = '';
            $subs   = $this->db->get_where('sub_category', array(
                'category' => $para2
            ))->result_array();
            foreach ($subs as $row) {
                $return .= '<option value="' . $row['sub_category_id'] . '">' . ucfirst($row['sub_category_name']) . '</option>' . "\n\r";
            }
            echo $return;
        } else if ($para1 == "get_range_by_cat") {
            if ($para2 == 0) {
                echo $this->get_ranger("product_id !=", "", $para3, $para4);
            } else {
                echo $this->get_ranger("category", $para2, $para3, $para4);
            }
        } else if ($para1 == "get_range_by_sub") {
            echo $this->get_ranger("sub_category", $para2);
        }
    }
    
}



/* End of file home.php */
/* Location: ./application/controllers/home.php */
