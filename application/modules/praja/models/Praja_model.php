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

	public function view_edit($input_data)
	{
		$npp = $input_data['npp'];
        return $this->db->where('npp', $npp)->update('tbl_praja', $input_data);

	}

	public function tambah_praja($input_data)
	{
		return $this->db->insert('tbl_praja', $input_data);

	}

	public function hapus_praja($id){
		return $this->db->where('id', $id)->delete('tbl_praja');
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
