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
    <div class="box span6">
        <div class="box-header">
            <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Data Pasien</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
            </div>
        </div>
            <table class="table-condensed">
                <tbody>
                    <tr>
                        <td><strong>No RM</strong></td>
                        <td>: </td>
                        <td><?php echo $no_rm;?></td>                                       
                    </tr>
                    <tr>
                        <td><strong>Nama</strong></td>
                        <td>: </td>
                        <td><?php echo $nama;?></td>                                       
                    </tr>
                    <tr>
                        <td><strong>Alamat</strong></td>
                        <td>: </td>
                        <td><?php echo $alamat;?></td>                                       
                    </tr>
                    <tr>
                        <td><strong>Umur</strong></td>
                        <td>: </td>
                        <td><?php echo $umur;?> Tahun</td>
                    </tr>                                
                  </tbody>
             </table>       
        
    </div>
    <div class="form-horizontal" id="myform">
        <div class="control-group">
          
        </div>
        
    </div>


  <div id="PeopleTableContainer" class="table"></div>
    <script type="text/javascript">

        $(document).ready(function () {

            //Prepare jTable
            $('#PeopleTableContainer').jtable({
                title: 'Tabel Histori Pemeriksaan',
                paging: true,
                pageSize: 10,
                sorting: true,
                defaultSorting: 'no ASC',
                actions: 
                {

                    // {"Result":"OK","Record":[{"no":"64","no_RM":"15.0003","tanggal_periksa":"2016-02-28","haid":"2016-02-25","no_diagnosa":"2","no_terapi":"2","keterangan":"adsadasdsadasd","status_obat":"ya"}]}
                    listAction: '<?=base_url()?>index.php/proses/listhistory/'+ <?php echo $no_rm;?> +'',
                    updateAction: '<?=base_url()?>index.php/proses/updatehistory',
                    deleteAction: '<?=base_url()?>index.php/proses/hapushistory',
                    // createAction: '<?=base_url()?>index.php/proses/createhistory/'+ <?php echo $no_rm;?> +''
                    createAction: function (postData) {
                        // console.log("creating from custom function...");
                        return $.Deferred(function ($dfd) {
                            $.ajax({
                                url: '<?=base_url()?>index.php/proses/createhistory/'+ <?php echo $no_rm;?> +'',
                                type: 'POST',
                                dataType: 'json',
                                data: postData,
                                success: function (data) {
                                    if(data.Record[0].status_obat == "ya"){
                                        window.location = '<?=base_url()?>index.php/listobat/lihatobat/'+ data.Record[0].no +''
                                    }
                                    $dfd.resolve(data);
                                },
                                error: function () {
                                    $dfd.reject();
                                }
                            });
                        });
                    }

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
                    tanggal_periksa: 
                    {
                        create: false,
                        width: '9%',
                        title: 'Tanggal Periksa'
                    },
                    haid: 
                    {
                        width: '8%',
                        title: 'Tanggal Haid',
                        type: 'date'
                    },
                    no_diagnosa: 
                    {
                        title: 'Diagnosa',
                        width: '8%',
                        options: '../get_diagnosa'
                    },
                    no_terapi: 
                    {
                        title: 'Terapi',
                        width: '7%',
                        options: '../get_terapi'
                    },
                    no_listbarang: 
                    {
                        create: false,
                        edit: false,
                        list: false
                    },
                    keterangan: 
                    {
                        title: 'Keterangan',
                        sorting: false,
                        type: 'textarea'
                    },
                    status_obat: 
                    {
                        title: 'Obat?',
                        sorting: false,
                        width: '3%',
                        options: [{ Value: 'ya', DisplayText: 'Ya' }, { Value: 'tidak', DisplayText: 'Tidak' }]
                    },
                    lihat:
                    {
                        title: 'Lihat Obat',
                        display: function (data) 
                        {
                            return '<a href="<?php echo site_url() ?>/listobat/lihatobat/'+ data.record.no +'">Lihat</a>';
                        },
                        edit: false,
                        sorting: false,
                        create: false
                    }
                },
            });

          
            //Load person list from server
            $('#PeopleTableContainer').jtable('load');
        });

    </script>
</div>


