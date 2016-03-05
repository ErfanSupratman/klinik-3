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
                        <td><?php echo $no_RM;?></td>                                       
                    </tr>
                    <tr>
                        <td><strong>Nama</strong></td>
                        <td>: </td>
                        <td><?php echo $nama;?></td>                                       
                    </tr>
                    <tr>
                        <td><strong>Tanggal Periksa</strong></td>
                        <td>: </td>
                        <td><?php echo $tanggal_periksa;?></td>                                       
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
                title: 'Tabel List Obat',
                paging: true,
                pageSize: 10,
                sorting: true,
                defaultSorting: 'no ASC',
                actions: 
                {
                    listAction: '<?=base_url()?>index.php/listobat/list_barang/'+ <?php echo $nomor;?> +'',
                    createAction: '<?=base_url()?>index.php/listobat/create_barang/'+ <?php echo $nomor;?> +''
                    // updateAction: '<?=base_url()?>index.php/proses/updatehistory',
                    // deleteAction: '<?=base_url()?>index.php/proses/hapushistory',
                },
                fields: 
                {                   
                    id_list_barang: 
                    {
                        key: true,
                        create: false,
                        edit: false,
                        list: false
                    },
                    id_hasil_periksa: 
                    {
                        create: false,
                        edit: false,
                        list: false
                    },
                    id_barang: 
                    {
                        width: '9%',
                        title: 'Nama',
                        options: '../get_barang'
                    },
                    jumlah_barang1: 
                    {
                        width: '8%',
                        title: 'Jumlah dari Dokter'
                    },
                    jumlah_barang2: 
                    {
                        create: false,
                        title: 'Jumlah beli',
                        width: '8%'
                    }
                },
            });

          
            //Load person list from server
            $('#PeopleTableContainer').jtable('load');
        });

    </script>
</div>


