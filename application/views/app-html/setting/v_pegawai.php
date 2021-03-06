<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Bidang : <?php echo ucwords(strtolower($this->bpn->bidang($this->uri->segment(3)))) ?></h3>
                    <!--<a href="#" class="btn btn-default pull-right" title="" data-toggle="modal" data-target="#add_pegawai"><i class="fa fa-plus"></i> Tambah Pegawai</a>-->
                </div>
                <div class="box-body table-responsive">
                    <div class="col-md-12">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 50px">#</th>
                                    <th>Nama Pegawai</th>
                                    <th>Jabatan</th>
                                    <th style="width: 100px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = (!$this->input->get('page')) ? 0 : $this->input->get('page');
                                foreach ($data_pegawai as $row) : ?>
                                    <tr>
                                        <td><?php echo ++$no; ?>.</td>
                                        <td><?php echo ucwords(strtolower($row->nama_pegawai)); ?></td>
                                        <td><?php echo ucwords(strtolower($row->jabatan)); ?></td>
<!--                                        <td class="text-center">
                                            <a href="#" onclick="edit_pegawai('<?php echo $row->id_pegawai; ?>', '<?php echo $row->id_bidang ?>');" class="btn btn-xs btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="#" onclick="delete_pegawai('<?php echo $row->id_pegawai; ?>', '<?php echo $row->id_bidang ?>');" class="btn btn-xs btn-danger" title="Hapus"><i class="fa fa-trash-o"></i></a>
                                        </td>-->
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="col-md-12">
                            <?php echo $this->pagination->create_links(); ?> 
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">

                </div>
            </div>
            <!-- /.box -->
        </div>
    </div><!--./row-->
</section>

<div class="modal modal-default" id="add_pegawai" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <form action="<?php echo site_url("bidang/set_pegawai?method=add&bidang={$this->uri->segment(3)}"); ?>" id="form_add_pegawai" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Menambahkan Pegawai</h4>
                </div>
                <div class="modal-body">
                    <label>Pegawai :</label>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input style="text-transform: capitalize" name="pegawai" type="text" class="form-control" autocomplete="off" placeholder="*Masukkan Nama Pegawai..." required>
                            </div>
                        </div>
                    </div>
                    <label>Jabatan :</label>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input style="text-transform: capitalize" name="jabatan" type="text" class="form-control" autocomplete="off" placeholder="*Masukkan Jabatan Pegawai..." required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary"> Tambahkan</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal modal-default" id="edit_pegawai" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <form action="" id="form_edit_pegawai" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> Update Pegawai</h4>
                </div>
                <div class="modal-body">
                    <label>Pegawai :</label>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input style="text-transform: capitalize" name="pegawai" id="nama_pegawai" type="text" class="form-control" autocomplete="off" placeholder="*Masukkan Nama Pegawai..." required>
                            </div>
                        </div>
                    </div>
                    <label>Jabatan :</label>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input style="text-transform: capitalize" name="jabatan" id="jabatan" type="text" class="form-control" autocomplete="off" placeholder="*Masukkan Jabatan Pegawai..." required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary"> Update</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Hapus -->
<div class="modal modal-default" id="delete_pegawai" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus pegawai?</h4>
            </div>
            <div class="modal-body">
                <p>Data yang berkaitan dengan pegawai akan secara otomatis terhapus.</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default pull-left" data-dismiss="modal">Tidak</a>
                <div id="del_pegawai"></div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->