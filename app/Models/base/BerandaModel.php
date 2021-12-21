<?php namespace App\Models\base;

use CodeIgniter\Model;

class BerandaModel extends Model
{
    protected $themes;

    public function __construct() {

        parent::__construct();
        $db      = \Config\Database::connect();

        //mendefinisikan varible themes
        //dan 'meload' table themes
        $this->themes = $db->table('themes'); 
        $this->acara = $db->table('acara');
        $this->cerita = $db->table('cerita');
        $this->data = $db->table('data');
        $this->komen = $db->table('komen');
        $this->mempelai = $db->table('mempelai');
        $this->rules = $db->table('rules');
        $this->themes = $db->table('themes');
        $this->users = $db->table('users');
        $this->album = $db->table('album');
        $this->setting = $db->table('setting');
        $this->testimoni = $db->table('testimoni');
        $this->pembayaran = $db->table('pembayaran');
    }
    

    //mengambil semua data pada table themes
    public function get_all_themes(){
        return $this->themes->get();
    }

    public function get_themes_by_name($nama){
        $query = $this->themes->where('nama_theme', $nama)->get();
        return $query->getResult();
    }

    //mengambil data user
    public function get_users()
    {
        return $this->users->get()->getResultArray();
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
    public function get_setting(){
        $builder = $this->setting;
        $builder->select('*');
        $builder->where('id', '1');
        $query = $builder->get();
        return $query->getResult();
    }
    public function get_testimoni(){
        $builder = $this->testimoni;
        $builder->select('testimoni.*,data.kunci');
        $builder->join('data', 'data.id_user = testimoni.id_user');
        $builder->where('testimoni.status', '2');
        $query = $builder->get();
        return $query;
    }
    
    public function get_pembayaran($id){
        $builder = $this->pembayaran;
        $builder->select('*');
        $builder->where('id_user', $id);
        $query = $builder->get();
        return $query->getResult();
    }

} 