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
            <label class="control-label" for="nama">Nama Diagnosa</label>
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
                title: 'Tabel Diagnosa',
                paging: true,
                pageSize: 10,
                sorting: true,
                defaultSorting: 'no ASC',
                actions: 
                {
                    listAction: '<?=base_url()?>index.php/diagnosa/listdiagnosa',
                    updateAction: '<?=base_url()?>index.php/diagnosa/updatediagnosa',
                    deleteAction: '<?=base_url()?>index.php/diagnosa/hapusdiagnosa',
                    createAction: '<?=base_url()?>index.php/diagnosa/creatediagnosa'            
                },
                fields: 
                {                   
                    no_diagnosa: 
                    {
                        key: true,
                        create: false,
                        edit: false,
                        list: false
                    },
                    nama_diagnosa: 
                    {
                        title: 'Nama Diagnosa',
                        width: '15%'
                    },
                    keterangan_diagnosa: 
                    {
                        title: 'Keterangan',
                        width: '10%',
                        type: 'textarea'
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


