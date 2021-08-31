<?php

class Praja_model extends CI_Model
{

	public function get_angkatan()
	{
		return $this->db->query('SELECT DISTINCT angkatan
		FROM tbl_praja
		where angkatan = "28" or angkatan = "28" or angkatan = "29" or angkatan = "30" or angkatan = "31"')->result_array();
	}

	public function get_prod()
	{

		return $this->db->query("SELECT DISTINCT substring_index(prodi,' ',1) as prodi from tbl_praja group by prodi")->result_array();
	}


	public function get_provinsi()
	{
		$prov = $this->db->query("SELECT provinsi , count(provinsi) as jumlah from tbl_praja group by provinsi");
		return $prov;
	}


	public function get_praja()
	{
		$result = $this->db->query("SELECT *,CASE WHEN jk= 'P' THEN 'Perempuan'
			WHEN jk= 'L' THEN 'Laki-Laki' END AS jeniskelamin FROM tbl_praja ");
		return $result;
	}


	public function get_detail($npp)
	{

		$result = $this->db->query("SELECT *,CASE WHEN jk= 'P' THEN 'Perempuan'WHEN jk= 'L' THEN 'Laki-Laki' END AS jk FROM tbl_praja WHERE tbl_praja.npp = '$npp' ");

		return $result;
	}


	public function get_table()
	{
		$result = $this->db->query("SELECT * FROM tbl_praja");

		return $result;
	}

	public function view_edit($editnya)
	{
		$npp =  $editnya['npp'];
		$no_spcp =  $editnya['no_spcp'];
		$nama =  $editnya['nama'];
		$jk =  $editnya['jk'];
		$nisn =  $editnya['nisn'];
		$npwp =  $editnya['npwp'];
		$nik_praja =  $editnya['nik_praja'];
		$tmpt_lahir =  $editnya['tmpt_lahir'];
		$tgl_lahir =  $editnya['tgl_lahir'];
		$alamat =  $editnya['alamat'];
		$rt =  $editnya['rt'];
		$rw =  $editnya['rw'];
		$nama_dusun =  $editnya['nama_dusun'];
		$kelurahan =  $editnya['kelurahan'];
		$kode_pos =  $editnya['kode_pos'];
		$kab_kota =  $editnya['kab_kota'];
		$provinsi =  $editnya['provinsi'];
		$agama =  $editnya['agama'];
		$kecamatan =  $editnya['kecamatan'];
		$tlp_pribadi =  $editnya['tlp_pribadi'];
		$tlp_rumah =  $editnya['tlp_rumah'];
		$email =  $editnya['email'];
		$prodi =  $editnya['prodi'];
		$penerima_pks =  $editnya['penerima_pks'];
		$no_pks =  $editnya['no_pks'];
		$tgl_masuk_kuliah =  $editnya['tgl_masuk_kuliah'];
		$tahun_masuk_kuliah =  $editnya['tahun_masuk_kuliah'];
		$status =  $editnya['status'];
		$tingkat =  $editnya['tingkat'];
		$angkatan =  $editnya['angkatan'];
		$fakultas =  $editnya['fakultas'];
		$biaya_masuk =  $editnya['biaya_masuk'];
		$mulai_semester =  $editnya['mulai_semester'];
		$jenis_tinggal =  $editnya['jenis_tinggal'];
		$alat_transport =  $editnya['alat_transport'];
		$kewarganegaraan =  $editnya['kewarganegaraan'];
		$pembiayaan =  $editnya['pembiayaan'];
		$jalur_masuk =  $editnya['jalur_masuk'];
		$nik_ayah  =  $editnya['nik_ayah'];
		$nama_ayah  =  $editnya['nama_ayah'];
		$tgllahir_ayah  =  $editnya['tgllahir_ayah'];
	    $pendidikan_ayah  =  $editnya['pendidikan_ayah'];
		$pekerjaan_ayah  =  $editnya['pekerjaan_ayah'];
		$penghasilan_ayah  =  $editnya['penghasilan_ayah'];
		$tlp_ayah  =  $editnya['tlp_ayah'];
		$nik_ibu  =  $editnya['nik_ibu'];
		$nama_ibu  =  $editnya['nama_ibu'];
		$tgllahir_ibu =  $editnya['tgllahir_ibu'];
		$pendidikan_ibu  =  $editnya['pendidikan_ibu'];
		$pekerjaan_ibu =  $editnya['pekerjaan_ibu'];
		$penghasilan_ibu  =  $editnya['penghasilan_ibu'];
		$tlp_ibu  =  $editnya['tlp_ibu'];
		$nik_wali =  $editnya['nik_wali'];
		$nama_wali  =  $editnya['nama_wali'];
		$tgllahir_wali  =  $editnya['tgllahir_wali'];
		$tlp_wali =  $editnya['tlp_wali'];
		$pendidikan_wali  =  $editnya['pendidikan_ibu'];
		$pekerjaan_wali =  $editnya['pekerjaan_ibu'];
		$penghasilan_wali  =  $editnya['penghasilan_ibu'];
		$jenis_pendaftaran  =  $editnya['jenis_pendaftaran'];
		$penempatan  =  $editnya['penempatan'];

		// print("<pre>".print_r($editnya,true)."</pre>");exit();

		$hasil = $this->db->query("UPDATE tbl_praja 
			SET 
			npp = '$npp',
			no_spcp = '$no_spcp',
			nama = '$nama',
			nisn = '$nisn',
			npwp = '$npwp',
			nik_praja = '$nik_praja',
			tmpt_lahir = '$tmpt_lahir',
			tgl_lahir = '$tgl_lahir',
			alamat = '$alamat',
			rt = '$rt',
			rw = '$rw',
			nama_dusun = '$nama_dusun',
			kelurahan = '$kelurahan',
			kode_pos = '$kode_pos',
			tlp_pribadi = '$tlp_pribadi',
			tlp_rumah = '$tlp_rumah',
			email = '$email',
			penerima_pks = '$penerima_pks',
			no_pks = '$no_pks',
			tgl_masuk_kuliah = '$tgl_masuk_kuliah',
			tahun_masuk_kuliah = '$tahun_masuk_kuliah',
			status = '$status',
			tingkat = '$tingkat',
			angkatan = '$angkatan',
			biaya_masuk = '$biaya_masuk',
			nik_ayah = '$nik_ayah',
			nama_ayah = '$nama_ayah',
			tgllahir_ayah = '$tgllahir_ayah',
			tlp_ayah = '$tlp_ayah',
			nik_ibu = '$nik_ibu',
			nama_ibu = '$nama_ibu',
			tgllahir_ibu = '$tgllahir_ibu',
			tlp_ibu = '$tlp_ibu',
			nik_wali = '$nik_wali',
			nama_wali = '$nama_wali',
			tgllahir_wali = '$tgllahir_wali',
			tlp_wali = '$tlp_wali',
			penempatan = '$penempatan'

			WHERE npp ='$npp'
			");

		return $hasil;
	}

	public function agama()
	{
		return $this->db->query("SELECT * FROM agama ");
	}

	public function jenistinggal()
	{
		return $this->db->query("SELECT * FROM jenis_tinggal ");
	}

	public function prodi()
	{
		return $this->db->query("SELECT * FROM program_studi ");
	}

	public function kewarganegaraan()
	{
		return $this->db->query("SELECT * FROM negara ");
	}

	public function jenispendaftaran()
	{
		return $this->db->query("SELECT * FROM jenis_pendaftaran ");
	}

	public function pembiayaan()
	{
		return $this->db->query("SELECT * FROM jenis_pembiayaan ");
	}

	public function jalurmasuk()
	{
		return $this->db->query("SELECT * FROM jalur_masuk ");
	}

	public function pendidikan()
	{
		return $this->db->query("SELECT * FROM jenjang_pendidikan ");
	}


	public function pekerjaan()
	{
		return $this->db->query("SELECT * FROM pekerjaan ");
	}

	public function penghasilan()
	{
		return $this->db->query("SELECT * FROM penghasilan ");
	}

	public function alattransportasi()
	{
		return $this->db->query("SELECT * FROM alat_transportasi ");
	}

	public function mulaisemester()
	{
		return $this->db->query("SELECT * FROM semester ");
	}

	public function get_fakultas()
	{
		return $this->db->query("SELECT * FROM program_studi where kode_fakultas ='FPP' or kode_fakultas ='FMP' or kode_fakultas ='FPM' group BY kode_fakultas");
	}
	public function get_prodi()
	{
		return $this->db->query("SELECT nama_program_studi FROM program_studi order by nama_program_studi ASC");
	}

	public function get_will()
	{
		return  $this->db->query("SELECT * FROM `wilayah` GROUP BY id_provinsi ");
	}

	public function get_namakecamatan()
	{
		return  $this->db->query("SELECT nama_kecamatan FROM `wilayah` ");
	}

	public function get_kampus()
	{
		return  $this->db->query("SELECT nama_satker FROM `tbl_satker` ");
	}

	function get_sub_category($category_id)
	{
		$query = $this->db->get_where('program_studi', array('kode_fakultas' => $category_id));

		return $query;
	}

	function get_sub_provinsi($prov)
	{

		$this->db->select('*');
		$this->db->from('wilayah');
		$this->db->where(array('nama_provinsi' => $prov));
		$this->db->group_by('nama_kabkota');
		$query = $this->db->get();

		return $query;
	}

	function get_sub_kabkota($kab)
	{

		$this->db->select('*');
		$this->db->from('wilayah');
		$this->db->where(array('nama_kabkota' => $kab));
		$this->db->group_by('nama_kecamatan');
		$query = $this->db->get();

		// $query = $this->db->query("SELECT * FROM wilayah WHERE nama_kabkota = '$kab'");

		return $query;
	}

	public function get_statuspraja()
	{
		return $this->db->query("SELECT * FROM hukuman");
	}

	function cari($npp)
	{
		$query = $this->db->get_where('tbl_praja', array('npp' => $npp));
		return $query;
	}

	public function getcoba($npp)
	{
		// $nama = strtoupper(str_replace('-', ' ', $nama));
		$result = $this->db->query("SELECT npp,nama,status,angkatan,tingkat FROM tbl_praja WHERE npp = '$npp'");

		return $result;
	}

	public function log($log)
	{
		return $this->db->insert('tbl_log', $log);
	}

	public function exportdata($angkatan)
	{
		$result = $this->db->query("SELECT *, CASE WHEN jk= 'P' THEN 'Perempuan'
			WHEN jk= 'L' THEN 'Laki-Laki' ELSE 'Belum Ada ' END AS jk FROM tbl_praja WHERE angkatan = '$angkatan'");
		return $result;
	}
}
