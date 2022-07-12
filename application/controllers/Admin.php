<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Beranda';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function kelolaketua()
    {
        $data['title'] = 'Kelola Akun Ketua';
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user'] = $user;
        $data['data_ketua'] = $this->db->get_where('user', ['role_id' => 2])->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelolaketua', $data);
        $this->load->view('templates/footer');
    }

    public function tambahketua()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
			'is_unique' => 'This username has already registered! '
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
			'min_length' => 'Password too short!'
		]);

        $data['title'] = 'Kelola Akun Ketua';
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user'] = $user;

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambahketua', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
				'username' => htmlspecialchars($this->input->post('username', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time(),
			];

			$this->db->insert('user', $data);
            
            redirect('Admin/kelolaketua');
        }
    }

    public function editketua($id)
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
			'is_unique' => 'This username has already registered! '
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
			'min_length' => 'Password too short!'
		]);

        $data['title'] = 'Kelola Akun Ketua';
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user'] = $user;
        $data['ketua'] = $this->db->get_where('user', ['id' => $id])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/editketua', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
				'username' => htmlspecialchars($this->input->post('username', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time(),
			];

			$this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('user');
            
            redirect('Admin/kelolaketua');
        }
    }

    public function cariketua()
    {
        $data['title'] = 'Kelola Akun Ketua';
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user'] = $user;

        $query = "SELECT * FROM user where role_id = 2 AND username like '%" . $this->input->post('cari') . "%'";
        $data['cari'] = $this->db->query($query)->result_array();
        $data['hitung'] = $this->db->query($query)->num_rows();
        $data['text'] = $this->input->post('cari');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/cariketua', $data);
        $this->load->view('templates/footer');
    }

    public function hapusketua($id)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->delete('user');
        redirect('Admin/kelolaketua');
    }

    public function kriteria()
    {
        $data['title'] = 'Kelola Kriteria';
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user'] = $user;
        $data['data_kriteria'] = $this->db->get('kriteria')->result_array();
        $query = "SELECT SUM(bobot) AS total FROM kriteria";
        $data['bobot'] = $this->db->query($query)->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kriteria', $data);
        $this->load->view('templates/footer');
    }

    public function tambahkriteria()
    {
        $this->form_validation->set_rules('nama', 'Nama Kriteria', 'required');
        $this->form_validation->set_rules('bobot', 'Bobot Kriteria', 'required');

        $data['title'] = 'Kelola Kriteria';
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user'] = $user;
        

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambahkriteria', $data);
            $this->load->view('templates/footer');
        } else {
            $hitungkriteria = $this->db->get('kriteria')->num_rows();
            $data = [
                'id_kriteria' => $hitungkriteria+1,
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'bobot' => $this->input->post('bobot')/100,
            ];
            $this->db->insert('kriteria', $data);

            $this->db->from('kriteria');
            $this->db->order_by("id_kriteria", "desc");
            $this->db->limit(1);
            $query = $this->db->get()->row_array();

            $this->db->query("ALTER TABLE penilaian ADD c".$query['id_kriteria']." int(25)");
            $this->db->query("ALTER TABLE normalisasi ADD c".$query['id_kriteria']." float");
            
            redirect('Admin/kriteria');
        }
    }

    public function editkriteria($id)
    {
        $this->form_validation->set_rules('nama', 'Nama Kriteria', 'required');
        $this->form_validation->set_rules('bobot', 'Bobot Kriteria', 'required');

        $data['title'] = 'Kelola Kriteria';
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user'] = $user;
        $data['kriteria'] = $this->db->get_where('kriteria', ['id_kriteria' => $id])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/editkriteria', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'bobot' => $this->input->post('bobot')/100,
            ];

            $this->db->set($data);
            $this->db->where('id_kriteria', $id);
            $this->db->update('kriteria');
            
            $this->_hitungsaw();
            redirect('Admin/kriteria');
        }
    }

    public function carikriteria()
    {
        $data['title'] = 'Kelola Kriteria';
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user'] = $user;

        $query = "SELECT * FROM kriteria where nama like '%" . $this->input->post('cari') . "%'";
        $data['cari'] = $this->db->query($query)->result_array();
        $data['hitung'] = $this->db->query($query)->num_rows();
        $data['text'] = $this->input->post('cari');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/carikriteria', $data);
        $this->load->view('templates/footer');
    }

    public function hapuskriteria($id)
    {
        $where = array('id_kriteria' => $id);
        $this->db->where($where);
        $this->db->delete('kriteria');

        $this->db->query("ALTER TABLE penilaian DROP c".$id);
        $this->db->query("ALTER TABLE normalisasi DROP c".$id);
        $this->_hitungsaw();
        redirect('Admin/kriteria');
    }

    public function kelola()
    {
        $data['title'] = 'Kelola Anggota';
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user'] = $user;
        $data['data_anggota'] = $this->db->get('data_anggota')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelola', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('id', 'Id Angota', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama Angota', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('pekerjaan', 'TPekerjaan', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        $data['title'] = 'Kelola Anggota';
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user'] = $user;

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_anggota' => htmlspecialchars($this->input->post('id', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'jk' => htmlspecialchars($this->input->post('jk', true)),
                'tgl_masuk' => htmlspecialchars($this->input->post('tgl_masuk', true)),
                'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan', true)),
                'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            ];

            $this->db->insert('data_anggota', $data);
            
            redirect('Admin/kelola');
        }
    }

    public function editdata($id)
    {
        $this->form_validation->set_rules('nama', 'Nama Angota', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('pekerjaan', 'TPekerjaan', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        $data['title'] = 'Kelola Anggota';
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user'] = $user;
        $data['anggota'] = $this->db->get_where('data_anggota', ['id_anggota' => $id])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'jk' => htmlspecialchars($this->input->post('jk', true)),
                'tgl_masuk' => htmlspecialchars($this->input->post('tgl_masuk', true)),
                'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan', true)),
                'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            ];

            $this->db->set($data);
            $this->db->where('id_anggota', $id);
            $this->db->update('data_anggota');
            
            redirect('Admin/kelola');
        }
    }

    public function lihatdata($id){
        $data['title'] = 'Kelola Anggota';
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user'] = $user;
        $data['anggota'] = $this->db->get_where('data_anggota', ['id_anggota' => $id])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/lihat', $data);
        $this->load->view('templates/footer');
    }

    public function caridata()
    {
        $data['title'] = 'Kelola Data';
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user'] = $user;

        $query = "SELECT * FROM data_anggota where nama like '%" . $this->input->post('cari') . "%'";
        $data['cari'] = $this->db->query($query)->result_array();
        $data['hitung'] = $this->db->query($query)->num_rows();
        $data['text'] = $this->input->post('cari');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/caridata', $data);
        $this->load->view('templates/footer');
    }

    public function hapusdata($id)
    {
        $where = array('id_anggota' => $id);
        $this->db->where($where);
        $this->db->delete('data_anggota');

        $where = array('id_anggota' => $id);
        $this->db->where($where);
        $this->db->delete('penilaian');

        $this->_hitungsaw();
        redirect('Admin/kelola');
    }

    public function penilaian()
    {
        $data['title'] = 'Penilaian Anggota';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['data_anggota'] = $this->db->get('data_anggota')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/penilaian', $data);
        $this->load->view('templates/footer');
    }

    public function tambahpenilaian($id)
    {
        
        $data['title'] = 'Penilaian Anggota';
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user'] = $user;
        $data['anggota'] = $this->db->get_where('data_anggota', ['id_anggota' => $id])->row_array();

        $hitung = $this->db->get_where('penilaian', ['id_anggota' => $id])->row_array();
        $data['hitung'] = $hitung;
        if($hitung){
            $data['penilaian'] = $this->db->get_where('penilaian', ['id_anggota' => $id])->row_array();
        }

        $kriteria = $this->db->get('kriteria')->result_array();
        $data['kriteria'] = $kriteria;

        $this->form_validation->set_rules('tahun', 'Tahun/Periode', 'required');
        foreach ($kriteria as $k):
            $this->form_validation->set_rules('c'.$k['id_kriteria'], $k['nama'], 'required');
        endforeach;

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambahpenilaian', $data);
            $this->load->view('templates/footer');
        } else {
            $query = "SELECT * FROM penilaian where id_anggota=$id and tahun=".$this->input->post('tahun');
            $cek = $this->db->query($query)->num_rows();
            if($cek == 0){
                $data = [
                    'tahun' => $this->input->post('tahun'),
                    'id_anggota' => $id,
                ];
                $this->db->insert('penilaian', $data);
            }
            foreach ($kriteria as $k){
                $data = [
                    'c'.$k['id_kriteria'] => $this->input->post('c'.$k['id_kriteria']),
                ];
                $this->db->set($data);
                $this->db->where('id_anggota', $id);
                $this->db->update('penilaian');
            }

            $this->_hitungsaw();

            
            redirect('Admin/penilaian');
        }
    }

    public function _hitungsaw()
    {
        $kriteria = $this->db->get('kriteria')->result_array();
        // mengisi tabel normalisasi
        $this->db->select('*');
        $this->db->from('data_anggota');
        $this->db->join('penilaian','data_anggota.id_anggota = penilaian.id_anggota');      
        $matriks = $this->db->get()->result_array();

        $this->db->empty_table('normalisasi');
        $no = 1;
        foreach ($matriks as $m) {
            $data = [
                'id_normalisasi' => $no++,
                'id_anggota' => $m['id_anggota'],
                'tahun' => $m['tahun'],
            ];
            $this->db->insert('normalisasi', $data);   

            foreach ($kriteria as $k){
                $this->db->order_by('c'.$k['id_kriteria'],'desc');
                $c = $this->db->get('penilaian')->row_array();

                $data = [
                    'c'.$k['id_kriteria'] => $m['c'.$k['id_kriteria']]/$c['c'.$k['id_kriteria']],
                ];
                $this->db->set($data);
                $this->db->where('id_anggota', $m['id_anggota']);
                $this->db->update('normalisasi');
            } 
        }

        // Mengisi Tabel Hasil
        $this->db->select('*');
        $this->db->from('data_anggota');
        $this->db->join('normalisasi','data_anggota.id_anggota = normalisasi.id_anggota');      
        $matriks = $this->db->get()->result_array();

        $this->db->empty_table('hasil');
        $no = 1;
        foreach ($matriks as $m) {
            $hasil = 0;
            foreach ($kriteria as $k){
                $hasil += $m['c'.$k['id_kriteria']]*$k['bobot'];
            } 
            $data = [
                'id_hasil' => $no++,
                'hasil' => $hasil,
                'id_anggota' => $m['id_anggota'],
                'tahun' => $m['tahun'],
            ];
    
            $this->db->insert('hasil', $data);    
        }
    }

    public function caripenilaian()
    {
        $data['title'] = 'Penilaian Anggota';
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user'] = $user;

        $query = "SELECT * FROM data_anggota where nama like '%" . $this->input->post('cari') . "%'";
        $data['cari'] = $this->db->query($query)->result_array();
        $data['hitung'] = $this->db->query($query)->num_rows();
        $data['text'] = $this->input->post('cari');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/caripenilaian', $data);
        $this->load->view('templates/footer');
    }

    public function matriks()
    {
        $data['title'] = 'Matriks Awal';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['data_anggota'] = $this->db->get('penilaian')->result_array();

        $this->db->select('*');
        $this->db->from('data_anggota');
        $this->db->join('penilaian','data_anggota.id_anggota = penilaian.id_anggota');
        $this->db->order_by("data_anggota.id_anggota", "asc"); 
        $data['matriks'] = $this->db->get()->result_array();

        $data['kriteria'] = $this->db->get('kriteria')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/matriks', $data);
        $this->load->view('templates/footer');
    }

    public function normalisasi()
    {
        $data['title'] = 'Normalisasi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->db->select('*');
        $this->db->from('data_anggota');
        $this->db->join('normalisasi','data_anggota.id_anggota = normalisasi.id_anggota');
        $this->db->order_by("data_anggota.id_anggota", "asc");    
        $data['normalisasi'] = $this->db->get()->result_array();

        $data['kriteria'] = $this->db->get('kriteria')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/normalisasi', $data);
        $this->load->view('templates/footer');
    }

    public function hasil()
    {
        $data['title'] = 'Hasil Perhitungan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->db->select('*');
        $this->db->from('data_anggota');
        $this->db->join('hasil','data_anggota.id_anggota = hasil.id_anggota');
        $this->db->order_by("data_anggota.id_anggota", "asc");   
        $data['hasil'] = $this->db->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/hasil', $data);
        $this->load->view('templates/footer');
    }

    public function perangkingan()
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
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/perangkingan', $data);
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
        $this->load->view('admin/print', $data);
        $this->load->view('templates/footer');
    }
}
