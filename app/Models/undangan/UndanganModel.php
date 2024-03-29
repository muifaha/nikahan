<?php namespace App\Models\undangan;

use CodeIgniter\Model;

class UndanganModel extends Model
{
    //mendefinisikan variable agar bisa digunakan
	//secara global
    protected $acara,$cerita,$data,$komen,$mempelai,$order,$rules,$themes,$users,$album;

    public function __construct() {

        parent::__construct();
        $db      = \Config\Database::connect();

        //mengisi variable global dengan data
        //untuk meload tabel
        $this->acara = $db->table('acara');
        $this->cerita = $db->table('cerita');
        $this->data = $db->table('data');
        $this->komen = $db->table('komen');
        $this->mempelai = $db->table('mempelai');
        $this->order = $db->table('order');
        $this->rules = $db->table('rules');
        $this->themes = $db->table('themes');
        $this->users = $db->table('users');
        $this->album = $db->table('album');
        $this->pengunjung = $db->table('pengunjung');
        $this->pembayaran = $db->table('pembayaran');
        $this->setting = $db->table('setting');

    }

    //mengambil data user
    public function get_users()
    {
        return $this->users->get()->getResultArray();
    }

    //untuk mengecek domain
    //dan mengambil domain sesuai dengan data(domain) yang dikirim
    public function cek_domain($domain)
    {
        return $this->order->where('domain', $domain)->get();
    }

    //mengambil data mempelai sesuai dengan data(id_user) yang dikirim
    public function get_mempelai($id){
        return $this->mempelai->where('id_user', $id)->get();
    }

    //mengambil data acara sesuai dengan data(id_user) yang dikirim
    public function get_acara($id){
        return $this->acara->where('id_user', $id)->get();
    }

    //mengambil data komen sesuai dengan data(id_user) yang dikirim
    public function get_komen($id){
        return $this->komen->where('id_user', $id)->get()->getResultArray();
    }

    //mengambil data data sesuai dengan data(id_user) yang dikirim
    public function get_data($id){
        return $this->data->where('id_user', $id)->get();
    }

    //mengambil data cerita sesuai dengan data(id_user) yang dikirim
    public function get_cerita($id){
        return $this->cerita->where('id_user', $id)->get()->getResultArray();
    }

    //mengambil data cerita album dengan data(id_user) yang dikirim
    public function get_album($id){
        return $this->album->where('id_user', $id)->get()->getResultArray();
    }

    //mengambil data rules sesuai dengan data(id_user) yang dikirim
    public function get_rules($id){
        return $this->rules->where('id_user', $id)->get();
    }

    //mengambil data order sesuai dengan data(id_user) yang dikirim
    public function get_order($id){
        $builder = $this->db->table('order');
        $builder->select('*');
        $builder->join('themes', 'themes.id = order.theme', 'left');
        $builder->where('order.id_user', $id);
        return $builder->get();
    }

    public function get_all_themes(){
        return $this->themes->get();
    }

    public function cek_themes($kode){
        return $this->themes->where('kode_theme', $kode)->get();
    }

    public function add_komen($data){
    	return $this->komen->insert($data);
    }

    public function insert_traffic($data){
    	return $this->pengunjung->insert($data);
    }

    public function get_setting(){
        $builder = $this->setting;
        $builder->select('*');
        $builder->where('id', '1');
        $query = $builder->get();
        return $query->getResult();
    }

    public function get_pembayaran($id){
        $builder = $this->pembayaran;
        $builder->select('*');
        $builder->where('id_user', $id);
        $query = $builder->get();
        return $query->getResult();
    }
} 
