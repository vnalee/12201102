<?php
class Karyawan extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('M_karyawan');
        $this->load->library('form_validation');
    }

    function index() {
        $data['karyawan'] = $this->M_karyawan->tampil_data()->result();
        $this->load->view('tampil_data',$data);
    }

    function tambah() {
        $data['status'] = ['Menikah','Belum Menikah'];
        $data['jabatan'] = ['Manager','Direktur','Staff'];
        $this->load->view('input_data',$data);
    }

    function tambah_aksi() {
        $this->form_validation->set_rules('nama','Nama','required|min_length[5]|max_length[15]');

        if($this->form_validation->run() == TRUE){
        $nama = $this->input->post('nama');
        $status = $this->input->post('status');
        $jabatan = $this->input->post('jabatan');

        if($status == 'Menikah' && $jabatan == 'Manager') 
        {
            $gaji = 10000000;
        }
        elseif ($status == 'Belum Menikah' && $jabatan == 'Manager')
        {
            $gaji = 7500000;
        }
        elseif ($status == 'Menikah' && $jabatan == 'Direktur') 
        {
            $gaji = 12000000;
        }
        elseif ($status == 'Belum Menikah' && $jabatan == 'Direktur')
        {
            $gaji = 11000000;
        }
        elseif($status == 'Menikah' && $jabatan == 'Staff') 
        {
            $gaji = 5000000;
        }
        elseif ($status == 'Belum Menikah' && $jabatan == 'Staff')
        {
            $gaji = 4000000;
        }

        $tunjangan = 0.4 * $gaji;
        $total = $gaji + $tunjangan;

        $config['max_size']=2048;
        $config['allowed_types']="png|jpg|jpeg|gif";
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']=FCPATH.'images';

        $this->load->library('upload');
        $this->upload->initialize($config);

        $this->upload->do_upload('foto');
        $data_image=$this->upload->data('file_name');
        $location='images/';
        $foto=$location.$data_image;

        $data = array(
            'nama' => $nama,
            'status' => $status,
            'jabatan' => $jabatan,
            'gaji' => $gaji,
            'tunjangan' => $tunjangan,
            'total' => $total,
            'foto' => $foto
            );
        $this->M_karyawan->input_data($data,'table_12201102');
        redirect('karyawan/index');
        }else{
            $data['status'] = ['Menikah','Belum Menikah'];
            $data['jabatan'] = ['Manager','Direktur','Staff'];
            $this->load->view('input_data', $data);
        }
    }
    function edit ($id) {
        $where = array('id' => $id);
        $data['karyawan'] = $this->M_karyawan->edit_data($where,'table_12201102')->result();
        $data['status'] = ['Menikah','Belum Menikah'];
        $data['jabatan'] = ['Manager','Direktur','Staff'];
        $this->load->view('edit_data',$data);
    }

    function update() {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $status = $this->input->post('status');
        $jabatan = $this->input->post('jabatan');

        if($status == 'Menikah' && $jabatan == 'Manager') 
        {
            $gaji = 10000000;
        }
        elseif ($status == 'Belum Menikah' && $jabatan == 'Manager')
        {
            $gaji = 7500000;
        }
        elseif ($status == 'Menikah' && $jabatan == 'Direktur') 
        {
            $gaji = 12000000;
        }
        elseif ($status == 'Belum Menikah' && $jabatan == 'Direktur')
        {
            $gaji = 11000000;
        }
        elseif($status == 'Menikah' && $jabatan == 'Staff') 
        {
            $gaji = 5000000;
        }
        elseif ($status == 'Belum Menikah' && $jabatan == 'Staff')
        {
            $gaji = 4000000;
        }

        $tunjangan = 0.4 * $gaji;
        $total = $gaji + $tunjangan;

        $config['max_size']=2048;
        $config['allowed_types']="png|jpg|jpeg|gif";
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']=FCPATH.'images';

        $this->load->library('upload');
        $this->upload->initialize($config);

        $this->upload->do_upload('foto');
        $data_image=$this->upload->data('file_name');
        $location='images/';
        $foto=$location.$data_image;

        $data = array(
            'nama' => $nama,
            'status' => $status,
            'jabatan' => $jabatan,
            'gaji' => $gaji,
            'tunjangan' => $tunjangan,
            'total' => $total,
            'foto' => $foto
        );

        $where = array(
            'id' => $id
        );

        $this->M_karyawan->update_data($where,$data,'table_12201102');
        redirect('karyawan/index');
    } 

    function hapus ($id) {
        $where = array('id' => $id);
        $this->M_karyawan->hapus_data($where,'table_12201102');
        redirect('karyawan/index');
    }
}