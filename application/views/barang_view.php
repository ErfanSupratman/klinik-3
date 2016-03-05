<div id="content" class="span10">
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="report.php">Admin</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><i class="icon-tasks"></i>
            <a href="report.php">Report</a>
         </li>
    </ul>

    <form class="form-horizontal" id="myform" method="POST" >
            <div class="control-group">
                <label class="control-label" for="nama">Nama Barang</label>
                <div class="controls">
                    <input type="text" name="nama" id="nama" value="<?php echo set_value('nama');?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="rm">Kode Barang</label>
                <div class="controls">
                    <input type="text" name="kode" id="kode" value="<?php echo set_value('kode');?>">
                </div>
            </div>
            <div class="form-actions">
                <input class="hidden" type="text" name="action" id="action" value="">
                <button class="btn btn-primary" type="submit" name="go" id="go">Cari</button>
                <button type="reset" class="btn">Cancel</button>
            </div>
        </form>   

	<div id="PeopleTableContainer" class="table"></div>
    <script type="text/javascript">

        $(document).ready(function () {

            //Prepare jTable
            $('#PeopleTableContainer').jtable({
                title: 'Tabel Barang',
                paging: true,
                pageSize: 10,
                sorting: true,
                defaultSorting: 'no ASC',
                actions: 
                {
                    listAction: '<?=base_url()?>index.php/barang/listbarang',
                    updateAction: '<?=base_url()?>index.php/barang/updatebarang',
                    deleteAction: '<?=base_url()?>index.php/barang/hapusbarang',
                    createAction: '<?=base_url()?>index.php/barang/createbarang'            
                },
                fields: 
                {                   
                    no: 
                    {
                        key: true,
                        create: false,
                        edit: false,
                        list: false
                    },
                    kode_barang: 
                    {
                        create: false,
                        edit: false,
                        width: '12%',
                        title: 'Kode Barang'
                    },
                    nama_barang: 
                    {
                        title: 'Nama Barang',
                        width: '15%'
                    },
                    jenis: 
                    {
                        title: 'Jenis',
                        width: '10%'
                    },
                    jumlah: 
                    {
                        title: 'Stock',
                        width: '7%'                            
                    },
                    
                    harga: 
                    {
                        title: 'Harga',
                        sorting: false                            
                    }
                },
            });

            //Load person list from server
            $('#go').click(function (e) {
                e.preventDefault();
                $('#PeopleTableContainer').jtable('load', {
                    nama: $('#nama').val(),
                    kode: $('#kode').val()
                });
            });
            $('#go').click();
        });

    </script>
</div>


