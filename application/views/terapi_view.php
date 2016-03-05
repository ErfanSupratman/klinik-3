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
            <label class="control-label" for="nama">Nama Terapi</label>
            <div class="controls">
                <input type="text" name="nama" id="nama" value="<?php echo set_value('nama');?>">
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
                title: 'Tabel Terapi',
                paging: true,
                pageSize: 10,
                sorting: true,
                defaultSorting: 'no ASC',
                actions: 
                {
                    listAction: '<?=base_url()?>index.php/terapi/listterapi',
                    updateAction: '<?=base_url()?>index.php/terapi/updateterapi',
                    deleteAction: '<?=base_url()?>index.php/terapi/hapusterapi',
                    createAction: '<?=base_url()?>index.php/terapi/createterapi'            
                },
                fields: 
                {                   
                    no_terapi: 
                    {
                        key: true,
                        create: false,
                        edit: false,
                        list: false
                    },
                    nama_terapi: 
                    {
                        title: 'Nama Terapi',
                        width: '15%'
                    },
                    keterangan_terapi: 
                    {
                        title: 'Keterangan',
                        width: '10%',
                        type: 'textarea'
                    },
                    harga_terapi: 
                    {
                        title: 'Harga',
                        width: '10%'
                    }
                },
            });

            //Load person list from server
            $('#go').click(function (e) {
                e.preventDefault();
                $('#PeopleTableContainer').jtable('load', {
                    nama: $('#nama').val()
                });
            });
            $('#go').click();
        });

    </script>
</div>


