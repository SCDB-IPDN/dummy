<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('praja'); ?>">Praja</a></li>
    </ol>
    <h1 class="page-header">Data Keprajaan</h1>
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <span><a href="" class="btn btn-sm btn-success" data-toggle="modal"
                                data-target="#tambah-data-praja">TAMBAH</a></span>
                    </h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                            data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                            data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                            data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                            data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                </div>

				<div class="card-body">
					<div class="row">
						<div class="col-xl-7 col-lg-8">
							<?php echo $this->session->flashdata('notifpraja') ?>
							<form method="POST" action="<?php echo base_url() ?>praja/uploadaja" enctype="multipart/form-data">
									<div class="form-group">
											<label for="exampleInputEmail2">UNGGAH FILE EXCEL BERITA SESUAI TEMPLATE</label>
											<span class="ml-2">
													<i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
											</span>
											<input for="struk" type="file" name="struk" class="form-control">
									</div>
									<button id="struk" type="submit" class="btn btn-success">UPLOAD FILE</button>
									<a href="<?php echo base_url() ?>assets/download/datapraja.xlsx" class="btn btn-primary">TEMPLATE</a>
							</form>
						</div>
					</div>
				</div>

                <div class="table-responsive">
                    <br>

                    <?php if ($this->session->flashdata('praja') != NULL) { ?>
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Notif!</strong> <?php echo $this->session->flashdata('praja') ?>
                    </div>
                    <?php } ?>
                    <div class="panel-body">

                        <table id="data-praja" class="table table-striped table-bordered table-td-valign-middle"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Opsi</th>
                                    <th>NPP</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tingkat</th>
                                    <th>Angkatan</th>
                                    <th>Status</th>
                                    <th>Penempatan</th>
                                    <th>Fakultas</th>
                                    <th>Prodi</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>NISN</th>
                                    <th>NPWP</th>
                                    <th>No SPCP</th>
                                    <th>NIK</th>
                                    <th>Agana</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data-praja"
        class="modal fade">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data PRAJA</h4>
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>

                </div>
                <form class="form-horizontal" action="<?php echo base_url('praja/tambah_praja') ?>" method="post"
                    enctype="multipart/form-data" role="form">

                    <div class="modal-body">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user-graduate fa-2x icon-praja"></i>
                            <h5>⠀ Data Diri Praja </h5>

                        </div>
                        <br>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl">
                                    <label class="col-form-label">Nama:</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap ....">
                                </div>
                                <div class="col-xl-2">
                                    <label class="col-form-label">NPP:</label>
                                    <input type="text" class="form-control" name="npp" placeholder="NPP ....">
                                </div>

                                <div class="col-xl-2">
                                    <div class="form-group">
                                        <label class="col-form-label">Jenis Kelamin:</label>

                                        <select name="jk" class="form-control" required="">
                                            <option value="">-Pilih Jenis Kelamin-</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl">
                                    <label class="col-form-label">Tempat Lahir:</label>
                                    <input type="text" class="form-control" name="tmpt_lahir"
                                        placeholder="Tempat Lahir ....">
                                </div>
                                <div class="col-xl">
                                    <label class="col-form-label">Tanggal lahir:</label>
                                    <input type="date" class="form-control" name="tgl_lahir">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl">
                                    <label class="col-form-label">NISN:</label>
                                    <input type="text" class="form-control" name="nisn" placeholder="NISN ....">
                                </div>
                                <div class="col-xl">
                                    <label class="col-form-label">NPWP:</label>
                                    <input type="text" class="form-control" name="npwp" placeholder="NPWP ....">
                                </div>
                                <div class="col-xl">
                                    <label class="col-form-label">NO SPCP:</label>
                                    <input type="text" class="form-control" name="no_spcp" placeholder="No SPCP ....">
                                </div>
                                <div class="col-xl">
                                    <label class="col-form-label">NIK:</label>
                                    <input type="text" class="form-control" name="nik_praja"
                                        placeholder="NIK Praja ....">
                                </div>
                                <div class="col-xl">
                                    <label class="col-form-label">Agama:</label>
                                    <!-- <input type="text" class="form-control" id="agama" name="agama" placeholder="Agama ...." readonly> -->
                                    <select name="agama" class="form-control">
                                        <option value="">-Pilih Agama-</option>
                                        <?php foreach ($agamaa as $x) { ?>
                                        <option value="<?php echo $x->nama_agama; ?>"><?php echo $x->nama_agama; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">

                                <div class="col-xl-3">
                                    <label class="col-form-label">Alamat:</label>
                                    <input type="text" class="form-control" name="alamat" placeholder="Alamat ....">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Ubah -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data-praja"
        class="modal fade">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data PRAJA</h4>
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>

                </div>
                <form class="form-horizontal" action="<?php echo base_url('praja/view_edit') ?>" method="post"
                    enctype="multipart/form-data" role="form">

                    <div class="modal-body">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user-graduate fa-2x icon-praja"></i>
                            <h5>⠀ Data Diri Praja </h5>

                        </div>
                        <br>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl">
                                    <label class="col-form-label">Nama:</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Nama Lengkap ....">
                                </div>
                                <div class="col-xl-2">
                                    <label class="col-form-label">NPP:</label>
                                    <input type="text" class="form-control" id="npp" name="npp" placeholder="NPP ....">
                                </div>

                                <div class="col-xl-2">
                                    <div class="form-group">
                                        <label class="col-form-label">Jenis Kelamin:</label>

                                        <select name="jk" id="jk" class="form-control" required="">
                                            <option value="">-Pilih Jenis Kelamin-</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl">
                                    <label class="col-form-label">Tempat Lahir:</label>
                                    <input type="text" class="form-control" id="tmpt_lahir" name="tmpt_lahir"
                                        placeholder="Tempat Lahir ....">
                                </div>
                                <div class="col-xl">
                                    <label class="col-form-label">Tanggal lahir:</label>
                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl">
                                    <label class="col-form-label">NISN:</label>
                                    <input type="text" class="form-control" id="nisn" name="nisn"
                                        placeholder="NISN ....">
                                </div>
                                <div class="col-xl">
                                    <label class="col-form-label">NPWP:</label>
                                    <input type="text" class="form-control" id="npwp" name="npwp"
                                        placeholder="NPWP ....">
                                </div>
                                <div class="col-xl">
                                    <label class="col-form-label">NO SPCP:</label>
                                    <input type="text" class="form-control" id="no_spcp" name="no_spcp"
                                        placeholder="No SPCP ....">
                                </div>
                                <div class="col-xl">
                                    <label class="col-form-label">NIK:</label>
                                    <input type="text" class="form-control" id="nik_praja" name="nik_praja"
                                        placeholder="NIK Praja ....">
                                </div>
                                <div class="col-xl">
                                    <label class="col-form-label">Agama:</label>
                                    <!-- <input type="text" class="form-control" id="agama" name="agama" placeholder="Agama ...." readonly> -->
                                    <select name="agama" id="agama" class="form-control">
                                        <option value="">-Pilih Agama-</option>
                                        <?php foreach ($agamaa as $x) { ?>
                                        <option value="<?php echo $x->nama_agama; ?>"><?php echo $x->nama_agama; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">

                                <div class="col-xl-3">
                                    <label class="col-form-label">Alamat:</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        placeholder="Alamat ....">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Modal Ubah -->

    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hapus-data-praja"
        class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data PRAJA</h4>
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>

                </div>
                <form class="form-horizontal" action="<?php echo base_url('praja/hapus_praja') ?>" method="post"
                    enctype="multipart/form-data" role="form">

                    <div class="modal-body">
                        <div class="d-flex align-items-center">
                            <h5>⠀Apakah anda yakin ingin menghapus praja ? </h5>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl">
                                    <input type="hidden" id="idxx" name="id">
                                    <input type="text" class="form-control" id="namaxx" name="nama"
                                        placeholder="Nama Lengkap ...." disabled>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info" type="submit"> Hapus&nbsp;</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>

<script>
$(document).ready(function() {
    // list MOU
    var url = '<?php echo base_url('praja/get_praja'); ?>';

    var list_mou = $('#data-praja').DataTable({
        dom: 'Bfrtip',
        buttons: [{
                extend: 'copy',
                className: '',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            }
        ],
        responsive: true,
        "ajax": {
            "url": url,
            "dataSrc": ""
        }
    });
});

$(document).ready(function() {
    // Untuk sunting
    $('#edit-data-praja').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)

        // Isi nilai pada field
        modal.find('#npp').attr("value", div.data('npp'));
        modal.find('#nama').attr("value", div.data('nama'));
        modal.find('#jk').val(div.data('jk'));
        modal.find('#nisn').attr("value", div.data('nisn'));
        modal.find('#no_spcp').attr("value", div.data('no_spcp'));
        modal.find('#npwp').attr("value", div.data('npwp'));
        modal.find('#nik_praja').attr("value", div.data('nik_praja'));
        modal.find('#tmpt_lahir').attr("value", div.data('tmpt_lahir'));
        modal.find('#tgl_lahir').attr("value", div.data('tgl_lahir'));
        modal.find('#agama').val(div.data('agama'));
        modal.find('#alamat').attr("value", div.data('alamat'));

    });

    $('#hapus-data-praja').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)

        // Isi nilai pada field

        modal.find('#namaxx').attr("value", div.data('nama'));
        modal.find('#idxx').attr("value", div.data('id'));


    });

});
</script>
