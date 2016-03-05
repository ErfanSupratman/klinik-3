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
            <label class="control-label" for="nama">Nama Pasien</label>
            <div class="controls">
                <input type="text" name="nama" id="nama" value="<?php echo set_value('nama');?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="rm">No. RM Pasien</label>
            <div class="controls">
                <input type="text" name="rm" id="rm" value="<?php echo set_value('rm');?>">
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
                title: 'Tabel Tambah Antrian',
                paging: true,
                pageSize: 10,
                sorting: true,
                defaultSorting: 'nomer ASC',
                actions: 
                {
                    listAction: '<?=base_url()?>index.php/listdokter/listpasien'              
                },
                fields: 
                {                   
                    nomer: 
                    {
                        key: true,
                        create: false,
                        edit: false,
                        list: false
                    },
                    no_RM: 
                    {
                        create: false,
                        width: '8%',
                        title: 'No. RM'
                    },
                    nama: 
                    {
                        title: 'Nama Pasein',
                        create: false,
                        width: '10%'
                    },
                    tgl_lahir: 
                    {
                        title: 'Tanggal Lahir',
                        create: false,
                        width: '5%'
                    },
                    Proses:
                    {
                        title: 'Lihat History',
                        display: function (data) 
                        {
                            return '<a href="<?php echo site_url() ?>/proses/prosespasien/'+ data.record.no_RM +'">Lihat</a>'; 
                        },
                        edit: false,
                        sorting: false,
                        create: false
                    }
                },
            });

            //Load person list from server
            $('#go').click(function (e) {
                e.preventDefault();
                $('#PeopleTableContainer').jtable('load', {
                    nama: $('#nama').val(),
                    rm: $('#rm').val()
                });
            });
            $('#go').click();
        });

    </script>
</div>


