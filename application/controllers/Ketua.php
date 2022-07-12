<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ketua extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Beranda';
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user'] = $user;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ketua/index', $data);
        $this->load->view('templates/footer');
    }

    public function visual()
    {
        $data['title'] = 'Visualisasi Hasil';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['jumlah_anggota'] = $this->db->get('data_anggota')->num_rows();
        $data['jumlah_kriteria'] = $this->db->get('kriteria')->num_rows();

        $this->db->select('*');
        $this->db->from('data_anggota');
        $this->db->join('penilaian','data_anggota.id_anggota = penilaian.id_anggota','LEFT');
        $this->db->join('hasil','data_anggota.id_anggota = hasil.id_anggota','LEFT'); 
        $data['perangkingan'] = $this->db->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ketua/visual', $data);
        $this->load->view('templates/footer');
    }

    public function hasil()
    {
        $data['title'] = 'Laporan Hasil';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->db->select('*');
        $this->db->from('data_anggota');
        $this->db->join('penilaian','data_anggota.id_anggota = penilaian.id_anggota','LEFT');
        $this->db->join('hasil','data_anggota.id_anggota = hasil.id_anggota','LEFT');
        $this->db->order_by('hasil','desc');   
        $data['perangkingan'] = $this->db->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ketua/hasil', $data);
        $this->load->view('templates/footer');
    }

    public function print()
    {
        $data['title'] = 'Hasil Perangkingan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->db->select('*');
        $this->db->from('data_anggota');
        $this->db->join('penilaian','data_anggota.id_anggota = penilaian.id_anggota','LEFT');
        $this->db->join('hasil','data_anggota.id_anggota = hasil.id_anggota','LEFT');
        $this->db->order_by('hasil','desc');   
        $data['perangkingan'] = $this->db->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('ketua/print', $data);
        $this->load->view('templates/footer');
    }
}
