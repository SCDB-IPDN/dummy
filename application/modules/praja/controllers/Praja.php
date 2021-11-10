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

	public function uploadaja(){
		// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['struk']['name']) && in_array($_FILES['struk']['type'], $file_mimes)) {

				$arr_file = explode('.', $_FILES['struk']['name']);
				$extension = end($arr_file);

				if($extension != 'xlsx') {
						$this->session->set_flashdata('notifberita', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

						redirect("berita_eksternal"); 
				} else {
						$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
				}

				$loadexcel  = $reader->load($_FILES['struk']['tmp_name']);
				$sheet  = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

				$list_sheet = $loadexcel->getSheetNames();

				$sheetData = $loadexcel->getSheetByName($list_sheet[0])->toArray(null, true, true ,true);

				$data = array();
				$numrow = 0;

				foreach($sheetData as $row){
						
						if($numrow >= 1){
								if(isset($row['B']) && isset($row['C']) && isset($row['D']) && isset($row['E'])
								&& isset($row['F'])
								&& isset($row['G'])
								&& isset($row['H'])
								&& isset($row['I'])
								&& isset($row['J'])
								&& isset($row['K'])
								&& isset($row['L'])
								&& isset($row['M'])
								&& isset($row['N'])
								&& isset($row['O'])
								&& isset($row['P'])
								&& isset($row['Q'])
								){
										array_push($data, array(
												'npp'       => $row['B'],
												'nama'           => $row['C'],
												'jk'            => $row['D'],
												'tingkat'         => $row['E'],
												'angkatan'         => $row['F'],
												'status'         => $row['G'],
												'penempatan'         => $row['H'],
												'fakultas'         => $row['I'],
												'prodi'         => $row['J'],
												'tmpt_lahir'         => $row['K'],
												'tgl_lahir'         => $row['L'],
												'nisn'         => $row['M'],
												'npwp'         => $row['N'],
												'no_spcp'         => $row['O'],
												'nik'         => $row['P'],
												'agama'         => $row['Q']
										));
								}else{
										$this->session->set_flashdata('notifpraja', '<div class="alert alert-success"><b>PROSES IMPORT GAGAL !!!</b> Pastikan format isian excel sesuai template!</div>');
										//redirect halaman
										redirect('praja');
								}
						}
					 $numrow++;
				}

				// INSERT TO DATABASE
				$this->db->insert_batch('tbl_praja', $data);

				//upload success
				$this->session->set_flashdata('notifpraja', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
				//redirect halaman
				redirect('praja');
		}
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


				data-toggle='modal' data-target='#edit-data-praja' class='btn btn-primary'><i class='fa fas fa-edit'></i></a>
				
				<a 
				href='javascript:;' 
				data-id='$r->id' 
				data-nama='$r->nama' 				


				data-toggle='modal' data-target='#hapus-data-praja' class='btn btn-danger'><i class='fa fas fa-trash'></i></a>
				";

       
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
        $alamat

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
      $editnya['agama'] = $this->input->post('agama', true);
      
      $nama = $this->input->post('nama', true);

      $result = $this->Praja_model->view_edit($editnya);

      if (!$result) {
        $this->session->set_flashdata('praja', 'DATA PRAJA GAGAL DIUBAH.');
        redirect('praja');
      } else {

        $isi = $editnya['npp'];
        $log['user'] = $this->session->userdata('nip');
        $log['Ket'] = "Mengedit Data Praja, NPP Praja = $isi";
        $log['tanggal'] = date('Y-m-d H:i:s');
        $this->Praja_model->log($log);

        $this->session->set_flashdata('praja', 'DATA PRAJA - ' . $nama . ' - BERHASIL DIUBAH.');
        redirect('praja');
      }
  }

	public function tambah_praja()
  {
      $input_data['npp'] = $this->input->post('npp', true);
      $input_data['no_spcp'] = $this->input->post('no_spcp', true);
      $input_data['nama'] = $this->input->post('nama', true);
      $input_data['jk'] = $this->input->post('jk', true);
      $input_data['nisn'] = $this->input->post('nisn', true);
      $input_data['npwp'] = $this->input->post('npwp', true);
      $input_data['nik_praja'] = $this->input->post('nik_praja', true);
      $input_data['tmpt_lahir'] = $this->input->post('tmpt_lahir', true);
      $input_data['tgl_lahir'] = $this->input->post('tgl_lahir', true);
      $input_data['alamat'] = $this->input->post('alamat', true);
      $input_data['agama'] = $this->input->post('agama', true);
      
      $nama = $this->input->post('nama', true);

      $result = $this->Praja_model->tambah_praja($input_data);

      if (!$result) {
        $this->session->set_flashdata('praja', 'DATA PRAJA GAGAL DITAMBAH.');
        redirect('praja');
      } else {

        $isi = $input_data['npp'];
        $log['user'] = $this->session->userdata('nip');
        $log['Ket'] = "Menambahkan Data Praja, NPP Praja = $isi";
        $log['tanggal'] = date('Y-m-d H:i:s');
        $this->Praja_model->log($log);

        $this->session->set_flashdata('praja', 'DATA PRAJA - ' . $nama . ' - BERHASIL DITAMBAH.');
        redirect('praja');
      }
  }

	function hapus_praja(){
		$id = $this->input->post('id', true);

		$result = $this->Praja_model->hapus_praja($id);

      if (!$result) {
        $this->session->set_flashdata('praja', 'DATA PRAJA GAGAL DIHAPUS.');
        redirect('praja');
      } else {

        $isi = $id;
        $log['user'] = $this->session->userdata('nip');
        $log['Ket'] = "Menghapus Data Praja, Id Praja = $isi";
        $log['tanggal'] = date('Y-m-d H:i:s');
        $this->Praja_model->log($log);

        $this->session->set_flashdata('praja', 'DATA PRAJA BERHASIL DIHAPUS.');
        redirect('praja');
      }
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

