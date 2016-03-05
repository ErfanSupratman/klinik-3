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
                    listAction: '<?=base_url()?>index.php/tambahanggota/listantrian',
                    deleteAction: '<?=base_url()?>index.php/tambahanggota/deleteantrian'              
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
                        width: '10%'
                    },
                    Umur: 
                    {
                        title: 'Umur',
                        create: false,
                        width: '5%'                            
                    },
                    
                    alamat: 
                    {
                        title: 'Alamat Pasieen',
                        create: false                            
                    },
                    telp: 
                    {
                        title: 'Telepon',
                        create: false                            
                    }
                },
            });

            //Load person list from server
            $('#PeopleTableContainer').jtable('load');
        });

    </script>
</div>


