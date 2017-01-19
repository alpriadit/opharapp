<?php
$PESAN = $this->session->userdata('PESAN');
?>
<input type="hidden" value="" id="noagendaVALUE">
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form id="form_upload" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"> No Agenda  </label>
                                    <div class="col-sm-7">
                                        <input type="text" name="noagenda" id="noagenda" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"> No BA  </label>
                                    <div class="col-sm-7">
                                        <input type="text" name="noba" id="noba" class="form-control"  >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"> No Tiket  </label>
                                    <div class="col-sm-7">
                                        <input type="text" name="no_tiket" id="no_tiket" class="form-control"  >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"> Tanggal Catat  </label>
                                    <div class="col-sm-7">
                                        <input type="text" name="tgl_catat" value="" class="form-control" id="tgl_catat" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"> Jenis Transaksi  </label>
                                    <div class="col-sm-7">
                                        <select name="jenis_transaksi" id="jenis_transaksi" class="form-control" maxlength="6">
                                            <option value="">--- Pilih Jenis Transaksi ---</option>
                                            <?php foreach ($rs_jenis_transaksi as $row) { ?>
                                            <option value="<?php echo $row['JENIS_TRANSAKSI']; ?>" ><?php echo strtoupper($row['JENIS_TRANSAKSI']); ?></option>   
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="btn-group">
                            <button class="btn btn-primary btn-sm" id="bcari" onclick="cari()" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Harap Tunggu"><i class="fa fa-search fa-fw"></i> Cari</button>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-info btn-sm" id="button_refresh" href="<?php echo base_url('home/dokumen'); ?> "><i class="fa fa-refresh fa-fw"></i> Refresh</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="10%">NOAGENDA</th>
                                    <th width="10%">NO_BA</th>
                                    <th width="20%">JENIS_TRANSAKSI</th>
                                    <th width="10%">NO_TIKET</th>
                                    <th width="10%">TGL_CATAT</th>
                                    <th width="40%">FILE</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="notifikasi" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5><i id="font" class="fa"></i> <div style="display:inline" id="status"></div></h5>
                </div>
                <div class="modal-body">
                    <p id="teks"></p>
                </div>
                <div class="modal-footer">
                    <button id="button_close" type="button" class="btn" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="modal_upload" class="modal fade bs-example-modal-lg modal-primary" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-lg">
            <form id="form_upload_file" class="form-horizontal" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="m_id_upload" id="m_id_upload" value="" />
                <input type="hidden" name="m_noagenda" id="m_noagenda" value="" />
                <input type="hidden" name="noba" id="m_noba" value=""/>
                <input type="hidden" name="jenis_transaksi" id="m_jenis_transaksi" value=""/>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>FORM UPLOAD DOKUMEN</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"> Unggah Dokumen : </label>
                                    <div class="col-sm-7">
                                        <input type="file" name="nama_file" id="nama_file" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="button_close" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-warning" id="button_simpan" onclick="simpan()" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Harap Tunggu"><i class="fa fa-save fa-fw"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($PESAN)) {
    ?>
    <div id="notifikasi1" class="modal fade bs-example-modal-sm modal-danger" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5><i id="font" class="fa fa-warning fa-fw"></i> Gagal</h5>
                </div>
                <div class="modal-body">
                    <p><?php echo $PESAN; ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
</section>
<script type="text/javascript">
    
    $('#tgl_catat').datepicker({
        format: 'mm/dd/yyyy',
        autoclose: true
    });
    // set first
    $('#bsimpan').attr('disabled', 'disabled');

    function cari() {
        $('#notifikasi').removeClass('modal-danger');
        $('#notifikasi').removeClass('modal-warning');
        $('#notifikasi').removeClass('modal-success');
        $('#font').removeClass('fa-danger fa-fw');
        $('#font').removeClass('fa-warning fa-fw');
        $('#font').removeClass('fa-check fa-fw');
        $('#button_close').removeClass('btn-danger');
        $('#button_close').removeClass('btn-warning');
        $('#button_close').removeClass('btn-success');
        var noagenda = $('#noagenda').val();
        var noba = $('#noba').val();
        var tgl_catat = $('#tgl_catat').val();
        $('#form_upload').ajaxForm({
            url: "<?php echo base_url('home/dokumen_cari'); ?>",
            type: "POST",
            data: {"noagenda": noagenda, "tgl_catat": tgl_catat},
            beforeSend: function () {
                $('#bcari').attr('disabled', 'disabled');
                $('#button_load').attr('disabled', 'disabled');
                $('#bsimpan').attr('disabled', 'disabled');
                $('#button_refresh').attr('disabled', 'disabled');
                $('#bcari').button('loading');
            },
            success: function (msg) {
                var msg = $.parseJSON(msg);
                if (msg.status == 'Gagal') {
                    $('#notifikasi').modal('show');
                    $('#notifikasi').addClass('modal-danger');
                    $('#font').addClass('fa-danger fa-fw');
                    $('#button_close').addClass('btn-danger');
                    $('#status').html(msg.status);
                    $('#teks').html(msg.pesan);
                    $('#bcari').removeAttr('disabled');
                    $('#button_load').removeAttr('disabled');
                    $('#bsimpan').attr('disabled', 'disabled');
                    $('#button_refresh').removeAttr('disabled');
                    $('#bcari').button('reset');
                } else if (msg.status == 'Warning') {
                    $('#notifikasi').modal('show');
                    $('#notifikasi').addClass('modal-warning');
                    $('#font').addClass('fa-warning fa-fw');
                    $('#button_close').addClass('btn-warning');
                    $('#status').html(msg.status);
                    $('#teks').html(msg.pesan);
                    $('#bcari').removeAttr('disabled');
                    $('#button_load').removeAttr('disabled');
                    $('#bsimpan').attr('disabled', 'disabled');
                    $('#button_refresh').removeAttr('disabled');
                    $('#bcari').button('reset');
                } else if (msg.status == 'Sukses') {
                    $('#bcari').removeAttr('disabled');
                    $('#button_load').removeAttr('disabled');
                    $('#bsimpan').removeAttr('disabled');
                    $('#button_refresh').removeAttr('disabled');
                    $('#bcari').button('reset');
                    loaddata();
                }
            },
        });
    }

    function simpan() {
        $('#notifikasi').removeClass('modal-danger');
        $('#notifikasi').removeClass('modal-warning');
        $('#notifikasi').removeClass('modal-success');
        $('#font').removeClass('fa-danger fa-fw');
        $('#font').removeClass('fa-warning fa-fw');
        $('#font').removeClass('fa-check fa-fw');
        $('#button_close').removeClass('btn-danger');
        $('#button_close').removeClass('btn-warning');
        $('#button_close').removeClass('btn-success');
        var noagenda = $('#m_noagenda').val();
        var noba = $('#m_noba').val();
        var m_id_upload = $('#m_id_upload').val();
        $('#form_upload_file').ajaxForm({
            url: "<?php echo base_url('home/dokumen_process'); ?>",
            type: "POST",
            data: {"noagenda": noagenda, },
            beforeSend: function () {
                $('#modal_upload').modal('hide');
                $('#bcari').attr('disabled', 'disabled');
                $('#button_load').attr('disabled', 'disabled');
                $('#bsimpan').attr('disabled', 'disabled');
                $('#button_refresh').attr('disabled', 'disabled');
                $('#bcari').button('loading');
            },
            success: function (msg) {
                var msg = $.parseJSON(msg);
                if (msg.status == 'Gagal') {
                    $('#notifikasi').modal('show');
                    $('#notifikasi').addClass('modal-danger');
                    $('#font').addClass('fa-danger fa-fw');
                    $('#button_close').addClass('btn-danger');
                    $('#status').html(msg.status);
                    $('#teks').html(msg.pesan);
                    $('#bcari').removeAttr('disabled');
                    $('#button_load').removeAttr('disabled');
                    $('#bsimpan').attr('disabled', 'disabled');
                    $('#button_refresh').removeAttr('disabled');
                    $('#bcari').button('reset');
                } else if (msg.status == 'Warning') {
                    $('#notifikasi').modal('show');
                    $('#notifikasi').addClass('modal-warning');
                    $('#font').addClass('fa-warning fa-fw');
                    $('#button_close').addClass('btn-warning');
                    $('#status').html(msg.status);
                    $('#teks').html(msg.pesan);
                    $('#bcari').removeAttr('disabled');
                    $('#button_load').removeAttr('disabled');
                    $('#bsimpan').removeAttr('disabled');
                    $('#button_refresh').removeAttr('disabled');
                    $('#bcari').button('reset');
                } else if (msg.status == 'Sukses') {
                    $('#notifikasi').modal('show');
                    $('#notifikasi').addClass('modal-success');
                    $('#font').addClass('fa-check fa-fw');
                    $('#button_close').addClass('btn-success');
                    $('#status').html(msg.status);
                    $('#teks').html(msg.pesan);
                    $('#bcari').removeAttr('disabled');
                    $('#button_load').removeAttr('disabled');
                    $('#bsimpan').removeAttr('disabled');
                    $('#button_refresh').removeAttr('disabled');
                    $('#bcari').button('reset');
                    loaddata();
                }
            },
        });
    }

    function loaddata() {
        var noagenda = $('#noagenda').val();
        var noba = $('#noba').val();
        var no_tiket = $('#no_tiket').val();
        var jenis_transaksi = $('#jenis_transaksi').val();
        var tgl_catat = $('#tgl_catat').val();
        var table;
        table = $('#table').DataTable({
            "ajax": {
                "url": "<?php echo base_url('home/dokumen_load_params') ?>",
                "type": "POST",
                "data": {"noagenda": noagenda, "noba": noba, "jenis_transaksi": jenis_transaksi, "no_tiket": no_tiket, "tgl_catat": tgl_catat},
            },
            "paging": false,
            // "pageLength": 3,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false,
        });
        $('#bcari').attr('disabled', 'disabled');
        table.destroy();
    }

    function modal_upload(noagenda, noba, m_jenis_transaksi, m_id_upload) {
        $('#modal_upload').modal('show');
        $("#m_noagenda").val('');
        $("#m_noagenda").val(noagenda);
        $("#m_noba").val('');
        $("#m_noba").val(noba);
        $("#m_jenis_transaksi").val('');
        $("#m_jenis_transaksi").val(m_jenis_transaksi);
        $("#m_id_upload").val('');
        $("#m_id_upload").val(m_id_upload);

    }


<?php
if (isset($PESAN)) {
    ?>
        $(document).ready(function () {
            $('#notifikasi1').modal('show');
        });
    <?php
}
?>



</script>