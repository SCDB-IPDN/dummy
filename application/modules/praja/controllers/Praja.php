<?php defined("BASEPATH") or exit("No direct script access allowed");

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Shared\Date;


class Praja extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Praja_model');
  }

  public function index()
  {
      $data = $this->Praja_model->get_table()->result();
      $x['data'] = $data;

      $prov = $this->Praja_model->get_provinsi()->result();
      $x['prov'] = $prov;

      $agamaa = $this->Praja_model->agama()->result();
      $x['agamaa'] = $agamaa;

      $jenistinggal = $this->Praja_model->jenistinggal()->result();
      $x['jenistinggal'] = $jenistinggal;

      $prodi = $this->Praja_model->prodi()->result();
      $x['prodi'] = $prodi;

      $kewarganegaraan = $this->Praja_model->kewarganegaraan()->result();
      $x['kewarganegaraan'] = $kewarganegaraan;

      $jenispendaftaran = $this->Praja_model->jenispendaftaran()->result();
      $x['jenispendaftaran'] = $jenispendaftaran;

      $pembiayaan = $this->Praja_model->pembiayaan()->result();
      $x['pembiayaan'] = $pembiayaan;

      $jalurmasuk = $this->Praja_model->jalurmasuk()->result();
      $x['jalurmasuk'] = $jalurmasuk;

      $pendidikan = $this->Praja_model->pendidikan()->result();
      $x['pendidikan'] = $pendidikan;

      $pekerjaan = $this->Praja_model->pekerjaan()->result();
      $x['pekerjaan'] = $pekerjaan;

      $penghasilan = $this->Praja_model->penghasilan()->result();
      $x['penghasilan'] = $penghasilan;

      $alattransportasi = $this->Praja_model->alattransportasi()->result();
      $x['alattransportasi'] = $alattransportasi;

      $mulaisemester = $this->Praja_model->mulaisemester()->result();
      $x['mulaisemester'] = $mulaisemester;

      $fakulll = $this->Praja_model->get_fakultas()->result();
      $x['fakulll'] = $fakulll;

      $proddd = $this->Praja_model->get_prodi()->result();
      $x['proddd'] = $proddd;

      $wilayah = $this->Praja_model->get_will()->result();
      $x['wilayah'] = $wilayah;

      $kecc = $this->Praja_model->get_namakecamatan()->result();
      $x['kecc'] = $kecc;

      $kampus = $this->Praja_model->get_kampus()->result();
      $x['kampus'] = $kampus;

     


      $this->load->view("include/head");
      $this->load->view("include/top-header");
      $this->load->view('view_praja', $x);
      $this->load->view("include/sidebar");
      $this->load->view("include/panel");
      $this->load->view("include/footer");
    
  }

  public function angkat()
  {
    $tmt_list = $this->Praja_model->get_angkatan();

    $tmt = [];
    foreach ($tmt_list as $t) {
      $tmt[] =  $t['angkatan'];
    }
    echo json_encode($tmt);
  }

  public function prod()
  {
    $tmt_list = $this->Praja_model->get_prod();

    $tmt = [];
    foreach ($tmt_list as $t) {
      $tmt[] =  $t['prodi'];
    }
    echo json_encode($tmt);
  }

  function get_praja()
  {
    // $data = $this->Praja_model->get_praja()->result();
    $data = $this->Praja_model->get_table()->result();
    $x['data'] = $data;

    $dataall = array();

    $no = 1;
    foreach ($data as $r) {
      $npp = $r->npp == NULL ? "<i><font>Tidak ada data</font></i>": $r->npp;
      $nama = $r->nama == NULL ? "<i><font>Tidak ada data</font></i>": $r->nama;
      $jk = $r->jk == NULL ? "<i><font>Tidak ada data</font></i>": $r->jk ;
      $tingkat = $r->tingkat == NULL ? "<i><font>Tidak ada data</font></i>": $r->tingkat;
      $angkatan = $r->angkatan== NULL ? "<i><font>Tidak ada data</font></i>": $r->angkatan;
      $status = $r->status== NULL ? "<i><font>Tidak ada data</font></i>": $r->status;
      $penempatan = $r->penempatan== NULL ? "<i><font>Tidak ada data</font></i>": $r->penempatan;
      $fakultas = $r->fakultas== NULL ? "<i><font>Tidak ada data</font></i>": $r->fakultas;
      $prodi = $r->prodi== NULL ? "<i><font>Tidak ada data</font></i>": $r->prodi;
      $tmpt_lahir = $r->tmpt_lahir== NULL ? "<i><font>Tidak ada data</font></i>":$r->tmpt_lahir;
      $tgl_lahir = $r->tgl_lahir== NULL ? "<i><font>Tidak ada data</font></i>":$r->tgl_lahir;
      $nisn = $r->nisn== NULL ? "<i><font>Tidak ada data</font></i>":$r->nisn;
      $npwp = $r->npwp == NULL ? "<i><font>Tidak ada data</font></i>": $r->npwp;
      $no_spcp = $r->no_spcp== NULL ? "<i><font>Tidak ada data</font></i>":$r->no_spcp;
      $nik_praja = $r->nik_praja== NULL ? "<i><font>Tidak ada data</font></i>":$r->nik_praja;
      $agama = $r->agama== NULL ? "<i><font>Tidak ada data</font></i>":$r->agama;
      $alamat = $r->alamat== NULL ? "<i><font>Tidak ada data</font></i>":$r->alamat;
      $rt = $r->rt== NULL ? "<i><font>Tidak ada data</font></i>":$r->rt;
      $rw = $r->rw== NULL ? "<i><font>Tidak ada data</font></i>":$r->rw;
      $provinsi = $r->provinsi== NULL ? "<i><font>Tidak ada data</font></i>":$r->provinsi;
      $kab_kota = $r->kab_kota== NULL ? "<i><font>Tidak ada data</font></i>":$r->kab_kota;
      $kelurahan = $r->kelurahan== NULL ? "<i><font>Tidak ada data</font></i>":$r->kelurahan;
      $nama_dusun = $r->nama_dusun== NULL ? "<i><font>Tidak ada data</font></i>":$r->nama_dusun;
      $kecamatan = $r->kecamatan== NULL ? "<i><font>Tidak ada data</font></i>":$r->kecamatan;
      $kode_pos = $r->kode_pos== NULL ? "<i><font>Tidak ada data</font></i>":$r->kode_pos;
      $jenis_tinggal = $r->jenis_tinggal== NULL ? "<i><font>Tidak ada data</font></i>":$r->jenis_tinggal;
      $tlp_pribadi = $r->tlp_pribadi== NULL ? "<i><font>Tidak ada data</font></i>":$r->tlp_rumah;
      $tlp_rumah = $r->tlp_rumah== NULL ? "<i><font>Tidak ada data</font></i>":$r->email;
      $email = $r->email== NULL ? "<i><font>Tidak ada data</font></i>":$r->email;
      $kewarganegaraan = $r->kewarganegaraan== NULL ? "<i><font>Tidak ada data</font></i>":$r->kewarganegaraan;
      $jenis_pendaftaran = $r->jenis_pendaftaran== NULL ? "<i><font>Tidak ada data</font></i>":$r->jenis_pendaftaran;
      $tgl_masuk_kuliah = $r->tgl_masuk_kuliah== NULL ? "<i><font>Tidak ada data</font></i>":$r->tgl_masuk_kuliah;
      $tahun_masuk_kuliah = $r->tahun_masuk_kuliah== NULL ? "<i><font>Tidak ada data</font></i>":$r->tahun_masuk_kuliah;
      $pembiayaan = $r->pembiayaan== NULL ? "<i><font>Tidak ada data</font></i>": $r->pembiayaan;
      $alat_transport = $r->alat_transport== NULL ? "<i><font>Tidak ada data</font></i>":$r->alat_transport;
      $biaya_masuk = $r->biaya_masuk== NULL ? "<i><font>Tidak ada data</font></i>": $r->biaya_masuk;
      $jalur_masuk = $r->jalur_masuk== NULL ? "<i><font>Tidak ada data</font></i>":$r->jalur_masuk;
      $penerima_pks = $r->penerima_pks== NULL ? "<i><font>Tidak ada data</font></i>":$r->penerima_pks;
      $no_pks = $r->no_pks== NULL ? "<i><font>Tidak ada data</font></i>":$r->no_pks;
      $mulai_semester = $r->mulai_semester== NULL ? "<i><font>Tidak ada data</font></i>":$r->mulai_semester;

      $nik_ayah = $r->nik_ayah== NULL ? "<i><font>Tidak ada data</font></i>":$r->nik_ayah;
      $nama_ayah = $r->nama_ayah== NULL ? "<i><font>Tidak ada data</font></i>":$r->nama_ayah;
      $tgllahir_ayah = $r->tgllahir_ayah== NULL ? "<i><font>Tidak ada data</font></i>":$r->tgllahir_ayah;
      $pendidikan_ayah = $r->pendidikan_ayah== NULL ? "<i><font>Tidak ada data</font></i>":$r->pendidikan_ayah;
      $pekerjaan_ayah = $r->pekerjaan_ayah== NULL ? "<i><font>Tidak ada data</font></i>":$r->pekerjaan_ayah;
      $penghasilan_ayah = $r->penghasilan_ayah== NULL ? "<i><font>Tidak ada data</font></i>":$r->penghasilan_ayah;
      $tlp_ayah = $r->tlp_ayah== NULL ? "<i><font>Tidak ada data</font></i>":$r->tlp_ayah;
      $nik_ibu = $r->nik_ibu== NULL ? "<i><font>Tidak ada data</font></i>":$r->nik_ibu;
      $nama_ibu = $r->nama_ibu== NULL ? "<i><font>Tidak ada data</font></i>":$r->nama_ibu;
      $tgllahir_ibu = $r->tgllahir_ibu== NULL ? "<i><font>Tidak ada data</font></i>":$r->tgllahir_ibu;
      $pendidikan_ibu = $r->pendidikan_ibu == NULL ? "<i><font>Tidak ada data</font></i>":$r->pendidikan_ibu;
      $pekerjaan_ibu = $r->pekerjaan_ibu == NULL ? "<i><font>Tidak ada data</font></i>":$r->pekerjaan_ibu;
      $penghasilan_ibu = $r->penghasilan_ibu == NULL ? "<i><font>Tidak ada data</font></i>":$r->penghasilan_ibu;
      $tlp_ibu = $r->tlp_ibu == NULL ? "<i><font>Tidak ada data</font></i>":$r->tlp_ibu;

      $nik_wali = $r->nik_wali == NULL ? "<i><font>Tidak ada data</font></i>":$r->nik_wali;
      $nama_wali = $r->nama_wali == NULL ? "<i><font>Tidak ada data</font></i>":$r->nama_wali;
      $tgllahir_wali = $r->tgllahir_wali == NULL ? "<i><font>Tidak ada data</font></i>":$r->tgllahir_wali;
      $pendidikan_wali = $r->pendidikan_wali == NULL ? "<i><font>Tidak ada data</font></i>":$r->pendidikan_wali ;
      $pekerjaan_wali = $r->pekerjaan_wali == NULL ? "<i><font>Tidak ada data</font></i>":$r->pekerjaan_wali;
      $penghasilan_wali = $r->penghasilan_wali == NULL ? "<i><font>Tidak ada data</font></i>":$r->penghasilan_wali;
      $tlp_wali = $r->tlp_wali== NULL ? "<i><font>Tidak ada data</font></i>":$r->tlp_wali;

     
			$opsi = "
			
				<a 
				href='javascript:;' 
				data-id='$r->id' 
				data-nama='$r->nama' 
				data-npp='$r->npp' 
				data-jk='$r->jk' 
				data-tmpt_lahir='$r->tmpt_lahir' 
				data-tgl_lahir='$r->tgl_lahir' 
				data-nisn='$r->nisn' 
				data-npwp='$r->npwp' 
				data-no_spcp='$r->no_spcp' 
				data-nik_praja='$r->nik_praja' 
				data-agama='$r->agama'   
				data-alamat='$r->alamat'
				data-rt='$r->rt'
				data-rw='$r->rw'
				data-provinsi='$r->provinsi'
				data-kab_kota='$r->kab_kota'
				data-kelurahan='$r->kelurahan'
				data-nama_dusun='$r->nama_dusun'
				data-kecamatan='$r->kecamatan'
				data-kode_pos='$r->kode_pos'
				data-jenis_tinggal='$r->jenis_tinggal'
				data-tlp_pribadi='$r->tlp_pribadi'
				data-tlp_rumah='$r->tlp_rumah'
				data-email='$r->email'
				data-tingkat='$r->tingkat'
				data-angkatan='$r->angkatan'
				data-status='$r->status'
				data-fakultas='$r->fakultas'
				data-prodi='$r->prodi'
				data-kewarganegaraan='$r->kewarganegaraan'
				data-jenis_pendaftaran='$r->jenis_pendaftaran'
				data-tgl_masuk_kuliah='$r->tgl_masuk_kuliah'
				data-tahun_masuk_kuliah='$r->tahun_masuk_kuliah'
				data-pembiayaan='$r->pembiayaan'
				data-alat_transport='$r->alat_transport'
				data-biaya_masuk ='$r->biaya_masuk'
				data-jalur_masuk='$r->jalur_masuk'
				data-penerima_pks='$r->penerima_pks'
				data-no_pks='$r->no_pks'
				data-mulai_semester='$r->mulai_semester'

				data-nik_ayah='$r->nik_ayah'
				data-nama_ayah='$r->nama_ayah'
				data-tgllahir_ayah='$r->tgllahir_ayah'
				data-pendidikan_ayah='$r->pendidikan_ayah'
				data-pekerjaan_ayah='$r->pekerjaan_ayah'
				data-penghasilan_ayah='$r->penghasilan_ayah'
				data-tlp_ayah='$r->tlp_ayah'
				data-nik_ibu='$r->nik_ibu'
				data-nama_ibu='$r->nama_ibu'
				data-tgllahir_ibu='$r->tgllahir_ibu'
				data-pendidikan_ibu='$r->pendidikan_ibu'
				data-pekerjaan_ibu='$r->pekerjaan_ibu'
				data-penghasilan_ibu='$r->penghasilan_ibu'
				data-tlp_ibu='$r->tlp_ibu'

				data-nik_wali='$r->nik_wali'
				data-nama_wali='$r->nama_wali'
				data-tgllahir_wali='$r->tgllahir_wali'
				data-pendidikan_wali='$r->pendidikan_wali'
				data-pekerjaan_wali='$r->pekerjaan_wali'
				data-penghasilan_wali='$r->penghasilan_wali'
				data-tlp_wali='$r->tlp_wali'
				data-penempatan='$r->penempatan'


				data-toggle='modal' data-target='#edit-data-praja' class='btn btn-primary'><i class='fa fas fa-edit'></i></a>   ";

       
			$dataall[] = array(
        $no++,
        $opsi,
        
        $npp,
        $nama,
        $jk,
        $tingkat,
        $angkatan,
        $status,
        $penempatan,
        $fakultas,
        $prodi,
        $tmpt_lahir,
        $tgl_lahir,
        $nisn,
        $npwp,
        $no_spcp,
        $nik_praja,
        $agama,
        $alamat,
        $rt,
        $rw,
        $provinsi,
        $kab_kota,
        $kelurahan,
        $nama_dusun,
        $kecamatan,
        $kode_pos,
        $jenis_tinggal,
        $tlp_pribadi,
        $tlp_rumah,
        $email,
        $kewarganegaraan,
        $jenis_pendaftaran,
        $tgl_masuk_kuliah,
        $tahun_masuk_kuliah,
        $pembiayaan,
        $alat_transport,
        $biaya_masuk,
        $jalur_masuk,
        $penerima_pks,
        $no_pks,
        $mulai_semester,

        $nik_ayah,
        $nama_ayah,
        $tgllahir_ayah,
        $pendidikan_ayah,
        $pekerjaan_ayah,
        $penghasilan_ayah,
        $tlp_ayah,
        $nik_ibu,
        $nama_ibu,
        $tgllahir_ibu,
        $pendidikan_ibu,
        $pekerjaan_ibu,
        $penghasilan_ibu,
        $tlp_ibu,

        $nik_wali,
        $nama_wali,
        $tgllahir_wali,
        $pendidikan_wali,
        $pekerjaan_wali,
        $penghasilan_wali,
        $tlp_wali

      );
    }
    echo json_encode($dataall);
  }

  public function view_edit()
  {

      $editnya['npp'] = $this->input->post('npp', true);
      $editnya['no_spcp'] = $this->input->post('no_spcp', true);
      $editnya['nama'] = $this->input->post('nama', true);
      $editnya['jk'] = $this->input->post('jk', true);
      $editnya['nisn'] = $this->input->post('nisn', true);
      $editnya['npwp'] = $this->input->post('npwp', true);
      $editnya['nik_praja'] = $this->input->post('nik_praja', true);
      $editnya['tmpt_lahir'] = $this->input->post('tmpt_lahir', true);
      $editnya['tgl_lahir'] = $this->input->post('tgl_lahir', true);
      $editnya['alamat'] = $this->input->post('alamat', true);
      $editnya['rt'] = $this->input->post('rt', true);
      $editnya['rw'] = $this->input->post('rw', true);
      $editnya['nama_dusun'] = $this->input->post('nama_dusun', true);
      $editnya['kelurahan'] = $this->input->post('kelurahan', true);
      $editnya['kode_pos'] = $this->input->post('kode_pos', true);
      $editnya['kab_kota'] = $this->input->post('kab_kota', true);
      $editnya['provinsi'] = $this->input->post('provinsi', true);
      $editnya['agama'] = $this->input->post('agama', true);
      $editnya['kecamatan'] = $this->input->post('kecamatan', true);
      $editnya['tlp_pribadi'] = $this->input->post('tlp_pribadi', true);
      $editnya['tlp_rumah'] = $this->input->post('tlp_rumah', true);
      $editnya['email'] = $this->input->post('email', true);
      $editnya['prodi'] = $this->input->post('prodi', true);
      $editnya['penerima_pks'] = $this->input->post('penerima_pks', true);
      $editnya['no_pks'] = $this->input->post('no_pks', true);
      $editnya['tgl_masuk_kuliah'] = $this->input->post('tgl_masuk_kuliah', true);
      $editnya['tahun_masuk_kuliah'] = $this->input->post('tahun_masuk_kuliah', true);
      $editnya['status'] = $this->input->post('status', true);
      $editnya['tingkat'] = $this->input->post('tingkat', true);
      $editnya['angkatan'] = $this->input->post('angkatan', true);
      $editnya['fakultas'] = $this->input->post('fk', true);
      $editnya['biaya_masuk'] = $this->input->post('biaya_masuk', true);
      $editnya['mulai_semester'] = $this->input->post('mulai_semester', true);
      $editnya['jenis_tinggal'] = $this->input->post('jenis_tinggal', true);
      $editnya['alat_transport'] = $this->input->post('alat_transport', true);
      $editnya['kewarganegaraan'] = $this->input->post('kewarganegaraan', true);
      $editnya['pembiayaan'] = $this->input->post('pembiayaan', true);
      $editnya['jalur_masuk'] = $this->input->post('jalur_masuk', true);
      $editnya['nik_ayah'] = $this->input->post('nik_ayah', true);
      $editnya['nama_ayah'] = $this->input->post('nama_ayah', true);
      $editnya['tgllahir_ayah'] = $this->input->post('tgllahir_ayah', true);
      $editnya['pendidikan_ayah'] = $this->input->post('pendidikan_ayah', true);
      $editnya['pekerjaan_ayah'] = $this->input->post('pekerjaan_ayah', true);
      $editnya['penghasilan_ayah'] = $this->input->post('penghasilan_ayah', true);
      $editnya['tlp_ayah'] = $this->input->post('tlp_ayah', true);
      $editnya['nik_ibu'] = $this->input->post('nik_ibu', true);
      $editnya['nama_ibu'] = $this->input->post('nama_ibu', true);
      $editnya['tgllahir_ibu'] = $this->input->post('tgllahir_ibu', true);
      $editnya['pendidikan_ibu'] = $this->input->post('pendidikan_ibu', true);
      $editnya['pekerjaan_ibu'] = $this->input->post('pekerjaan_ibu', true);
      $editnya['penghasilan_ibu'] = $this->input->post('penghasilan_ibu', true);
      $editnya['tlp_ibu'] = $this->input->post('tlp_ibu', true);
      $editnya['nik_wali'] = $this->input->post('nik_wali', true);
      $editnya['nama_wali'] = $this->input->post('nama_wali', true);
      $editnya['tgllahir_wali'] = $this->input->post('tgllahir_wali', true);
      $editnya['pendidikan_wali'] = $this->input->post('pendidikan_wali', true);
      $editnya['pekerjaan_wali'] = $this->input->post('pekerjaan_wali', true);
      $editnya['penghasilan_wali'] = $this->input->post('penghasilan_wali', true);
      $editnya['tlp_wali'] = $this->input->post('tlp_wali', true);
      $editnya['jenis_pendaftaran'] = $this->input->post('jenis_pendaftaran', true);
      $editnya['penempatan'] = $this->input->post('penempatan', true);
      $nama = $this->input->post('nama', true);
      // print("<pre>".print_r($editnya,true)."</pre>");exit();
      $result = $this->Praja_model->view_edit($editnya);
      // var_dump($editnya);exit();



      if (!$result) {
        $this->session->set_flashdata('praja', 'DATA PRAJA GAGAL DIUBAH.');
        redirect('praja');
      } else {

        $isi = $editnya['npp'];
        $log['user'] = $this->session->userdata('nip');
        $log['Ket'] = "Mengedit Data Praja, NPP Praja = $isi";
        $log['tanggal'] = date('Y-m-d H:i:s');
        // var_dump($log);exit();
        $this->Praja_model->log($log);

        $this->session->set_flashdata('praja', 'DATA PRAJA - ' . $nama . ' - BERHASIL DIUBAH.');
        redirect('praja');
      }
  }

  function get_sub_category()
  {
    $category_id = $this->input->post('prodi', TRUE);
    $data = $this->Praja_model->get_sub_category($category_id)->result();
    echo json_encode($data);
  }


  function get_sub_provinsi()
  {
    $prov = $this->input->post('kab_kota');
    $data = $this->Praja_model->get_sub_provinsi($prov)->result();
    echo json_encode($data);
  }

  function get_sub_kabkota()
  {
    $kec = $this->input->post('kecamatan');
    $data = $this->Praja_model->get_sub_kabkota($kec)->result();
    echo json_encode($data);
  }

  function editstatus()
  {
		$data = $this->Praja_model->get_statuspraja()->result();
		$x['data'] = json_encode($data);

		$pra = $this->Praja_model->get_praja()->result();
		$x['pra'] = $pra;

		$this->load->view("include/head");
		$this->load->view("include/top-header");
		$this->load->view("view_status", $x);
		$this->load->view("include/sidebar");
		$this->load->view("include/panel");
		$this->load->view("include/footer");
  }

  public function cari()
  {
    $npp = $_GET['npp'];
    $cari = $this->Praja_model->cari($npp)->result();
    echo json_encode($cari);
  }

  public function tambah_status()
  {
		$data = $this->Praja_model->getcoba($this->input->post('npp', true))->row_array();
		if ($this->input->post('status', true) == "turuntingkat" && $data['tingkat'] == 1) {
			$ting = $data['tingkat'];
			$ang = $data['angkatan'];
		} else if ($this->input->post('status', true) == "turuntingkat") {
			$ting = $data['tingkat'] - 1;
			$ang = $data['angkatan'] + 1;
		} else if ($this->input->post('status', true) != "turuntingkat") {
			$ting = $data['tingkat'];
			$ang = $data['angkatan'];
		}

		$tingkatann = $this->input->post('status', true);
		$keterangann = $this->input->post('keterangan', true);
		$tgl = date('Y-m-d');

		$nya = array();
		$config['upload_path']          = './assets/uploads_skpraja/';
		$config['allowed_types']        = 'pdf|docx';
		$config['max_size']             = 2000000;
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('fileToUpload')) {
			$nya = array(
				'npp'      => $data['npp'],
				'nama'      => $data['nama'],
				'status'      => $tingkatann,
				'tingkat'      => $ting,
				'angkatan' => $ang,
				'keterangan' => $keterangann,
				'tgl' => $tgl,
				'bukti' => $this->upload->data("file_name")

			);
			$this->db->insert('hukuman', $nya);
		}

		if ($this->input->post('status', true) == "turuntingkat") {
			$statusakhir = "aktif";
		} else {
			$statusakhir = $this->input->post('status', true);
		}

		$uptudate = array();
		$uptudate = array(
			'npp'      => $data['npp'],
			'nama'      => $data['nama'],
			'status'      => $statusakhir,
			'tingkat'      => $ting,
			'angkatan' => $ang

		);
		// var_dump($uptudate);exit();

		$nih = $this->db->where('npp', $data['npp']);
		$nih = $this->db->update('tbl_praja', $uptudate);

		if (!$nih) {
			$this->session->set_flashdata('praja', 'DATA PRAJA GAGAL DIUBAH.');
			redirect('praja/editstatus');
		} else {
			$isi = $data['npp'];
			$log['user'] = $this->session->userdata('nip');
			$log['Ket'] = "Mengedit Status Praja, NPP Praja = $isi";
			$log['tanggal'] = date('Y-m-d H:i:s');
			// var_dump($log);exit();
			$this->Praja_model->log($log);

			$this->session->set_flashdata('praja', 'DATA PRAJA BERHASIL DIUBAH.');
			redirect('praja/editstatus');
		}
    
  }

  function export($angkatan = NULL)
  {

    $semua_pengguna = $this->Praja_model->exportdata($angkatan)->result();

    $spreadsheet = new Spreadsheet;

    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('A1', 'NPP')
      ->setCellValue('B1', 'NAMA')
      ->setCellValue('C1', 'TEMPAT LAHIR')
      ->setCellValue('D1', 'TGL LAHIR')
      ->setCellValue('E1', 'L/P')
      ->setCellValue('F1', 'NIK')
      ->setCellValue('G1', 'AGAMA')
      ->setCellValue('H1', 'NISN')
      ->setCellValue('I1', 'JALUR PENDAFTARAN')
      ->setCellValue('J1', 'NPWP')
      ->setCellValue('K1', 'KEWARGANEGARAAN')
      ->setCellValue('L1', 'JENIS PENDAFTARAN')
      ->setCellValue('M1', 'TANGGAL MASUK KULIAH')
      ->setCellValue('N1', 'MULAI SEMESTER')
      ->setCellValue('O1', 'ALAMAT')
      ->setCellValue('P1', 'RT')
      ->setCellValue('Q1', 'RW')
      ->setCellValue('R1', 'NAMA DUSUN')
      ->setCellValue('S1', 'KELURAHAN')
      ->setCellValue('T1', 'KECAMATAN')
      ->setCellValue('U1', 'KODE POS')
      ->setCellValue('V1', 'JENIS TINGGAL')
      ->setCellValue('W1', 'ALAT TRANSPORTASI')
      ->setCellValue('X1', 'TELEPON RUMAH')
      ->setCellValue('Y1', 'NO HP')
      ->setCellValue('Z1', 'EMAIL')
      ->setCellValue('AA1', 'TERIMA KPS')
      ->setCellValue('AB1', 'NO KPS')
      ->setCellValue('AC1', 'NIK AYAH')
      ->setCellValue('AD1', 'NAMA AYAH')
      ->setCellValue('AE1', 'TGL LAHIR AYAH')
      ->setCellValue('AF1', 'PENDIDIKAN Ayah')
      ->setCellValue('AG1', 'PEKERJAAN AYAH')
      ->setCellValue('AH1', 'PENGHASILAN AYAH')
      ->setCellValue('AI1', 'NIK IBU')
      ->setCellValue('AJ1', 'NAMA IBU')
      ->setCellValue('AK1', 'TGL LAHIR IBU')
      ->setCellValue('AL1', 'PENDIDIKAN IBU')
      ->setCellValue('AM1', 'PEKERJAAN IBU')
      ->setCellValue('AN1', 'PENGHASILAN IBU')
      ->setCellValue('AO1', 'NAMA WALI')
      ->setCellValue('AP1', 'TGL LAHIR WALI')
      ->setCellValue('AQ1', 'PENDIDIKAN WALI')
      ->setCellValue('AR1', 'PEKERJAAN WALI')
      ->setCellValue('AS1', 'PENGHASILAN WALI')
      ->setCellValue('AT1', 'JENIS PEMBIAYAAN')
      ->setCellValue('AU1', 'JUMLAH BIAYA MASUK')
      ->setCellValue('AV1', 'PRODI');


    $kolom = 2;
    $nomor = 1;


    foreach ($semua_pengguna as $pengguna) {
      // var_dump($pengguna);exit();

      $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $kolom, $pengguna->npp)
        ->setCellValue('B' . $kolom, $pengguna->nama)
        ->setCellValue('C' . $kolom, $pengguna->tmpt_lahir)
        ->setCellValue('D' . $kolom, $pengguna->tgl_lahir)
        ->setCellValue('E' . $kolom, $pengguna->jk)
        ->setCellValue('F' . $kolom, $pengguna->nik_praja)
        ->setCellValue('G' . $kolom, $pengguna->agama)
        ->setCellValue('H' . $kolom, $pengguna->nisn)
        ->setCellValue('I' . $kolom, $pengguna->jalur_masuk)
        ->setCellValue('J' . $kolom, $pengguna->npwp)
        ->setCellValue('K' . $kolom, $pengguna->kewarganegaraan)
        ->setCellValue('L' . $kolom, $pengguna->jenis_pendaftaran)
        ->setCellValue('M' . $kolom, $pengguna->tgl_masuk_kuliah)
        ->setCellValue('N' . $kolom, $pengguna->mulai_semester)
        ->setCellValue('O' . $kolom, $pengguna->alamat)
        ->setCellValue('P' . $kolom, $pengguna->rt)
        ->setCellValue('Q' . $kolom, $pengguna->rw)
        ->setCellValue('R' . $kolom, $pengguna->nama_dusun)
        ->setCellValue('S' . $kolom, $pengguna->kelurahan)
        ->setCellValue('T' . $kolom, $pengguna->kecamatan)
        ->setCellValue('U' . $kolom, $pengguna->kode_pos)
        ->setCellValue('V' . $kolom, $pengguna->jenis_tinggal)
        ->setCellValue('W' . $kolom, $pengguna->alat_transport)
        ->setCellValue('X' . $kolom, $pengguna->tlp_rumah)
        ->setCellValue('Y' . $kolom, $pengguna->tlp_pribadi)
        ->setCellValue('Z' . $kolom, $pengguna->email)
        ->setCellValue('AA' . $kolom, $pengguna->penerima_pks)
        ->setCellValue('AB' . $kolom, $pengguna->no_pks)
        ->setCellValue('AC' . $kolom, $pengguna->nik_ayah)
        ->setCellValue('AD' . $kolom, $pengguna->nama_ayah)
        ->setCellValue('AE' . $kolom, $pengguna->tgllahir_ayah)
        ->setCellValue('AF' . $kolom, $pengguna->pendidikan_ayah)
        ->setCellValue('AG' . $kolom, $pengguna->pekerjaan_ayah)
        ->setCellValue('AH' . $kolom, $pengguna->penghasilan_ayah)
        ->setCellValue('AI' . $kolom, $pengguna->nik_ibu)
        ->setCellValue('AJ' . $kolom, $pengguna->nama_ibu)
        ->setCellValue('AK' . $kolom, $pengguna->tgllahir_ibu)
        ->setCellValue('AL' . $kolom, $pengguna->pendidikan_ibu)
        ->setCellValue('AM' . $kolom, $pengguna->pekerjaan_ibu)
        ->setCellValue('AN' . $kolom, $pengguna->penghasilan_ibu)
        ->setCellValue('AO' . $kolom, $pengguna->nama_wali)
        ->setCellValue('AP' . $kolom, $pengguna->tgllahir_wali)
        ->setCellValue('AQ' . $kolom, $pengguna->pendidikan_wali)
        ->setCellValue('AR' . $kolom, $pengguna->pekerjaan_wali)
        ->setCellValue('AS' . $kolom, $pengguna->penghasilan_wali)
        ->setCellValue('AT' . $kolom, $pengguna->pembiayaan)
        ->setCellValue('AU' . $kolom, $pengguna->biaya_masuk)
        ->setCellValue('AV' . $kolom, $pengguna->prodi);

      $kolom++;
      $nomor++;
      // var_dump($pengguna->$no_spcp);exit();

    }

    $writer = new Xlsx($spreadsheet);

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="DataPraja.xlsx"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
  }
}