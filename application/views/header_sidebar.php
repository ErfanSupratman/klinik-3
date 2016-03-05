<!DOCTYPE html>

<html lang="en">
<head>

  <meta charset="utf-8">
    <title>SI Klinik</title>
    <meta name="description" content="Bootstrap Metro Dashboard">
    <meta name="author" content="Dennis Ji">
    <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!-- end: Meta -->

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->
    <link id="bootstrap-style" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link id="base-style" href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
    <link id="base-style-responsive" href="<?php echo base_url() ?>assets/css/style-responsive.css" rel="stylesheet">
   
    <link href="<?php echo base_url() ?>assets/jtable/jtable/themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/jtable/jtable/themes/metro/blue/jtable.css" rel="stylesheet" type="text/css" />
    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'> -->
    <!-- end: CSS -->
    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<link id="ie-style" href="css/ie.css" rel="stylesheet">
<![endif]-->

<!--[if IE 9]>
<link id="ie9style" href="css/ie9.css" rel="stylesheet">
<![endif]-->

<!-- start: Favicon -->

    <!-- <link href="<?php echo base_url() ?>/assets/jtable\themes\metro\blue" rel="stylesheet" type="text/css" /> -->
    <script src="<?php echo base_url() ?>assets/js/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery-ui-1.10.0.custom.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/jtable/jtable/jquery.jtable.js" type="text/javascript"></script> 
    
    <!-- end: Favicon -->
    
    
    
    <style type="text/css">
            #sortedtable thead th {
                color: #00f;
                font-weight: bold;
                text-decoration: underline;
    }
    </style>
     <script>
    function startTime() {
        var today=new Date();
        var d=today.getDate();
        var y=today.getFullYear();
        var h=today.getHours();
        var m=today.getMinutes();
        var s=today.getSeconds();
        switch (new Date().getDay()) {
            case 0:
                day = "Minggu";
                break;
            case 1:
                day = "Senin";
                break;
            case 2:
                day = "Selasa";
                break;
            case 3:
                day = "Rabu";
                break;
            case 4:
                day = "Kamis";
                break;
            case 5:
                day = "Jumat";
                break;
            case 6:
                day = "Sabtu";
                break;
        } 

        switch (new Date().getMonth()) {
            case 0:
                mo = "Januari";
                break;
            case 1:
                mo = "Februari";
                break;
            case 2:
                mo = "Maret";
                break;
            case 3:
                mo = "April";
                break;
            case 4:
                mo = "Mei";
                break;
            case 5:
                mo = "Juni";
                break;
            case 6:
                mo = "Juli";
                break;
            case 7:
                mo = "Agustus";
                break;
            case 8:
                mo = "September";
                break;
            case 9:
                mo = "Oktober";
                break;
            case 10:
                mo = "November";
                break;
            case 11:
                mo = "Desember";
                break;    
        }
        m = checkTime(m);
        s = checkTime(s);
        
        document.getElementById('txt').innerHTML = day+", "+d+" "+mo+" "+y+" pukul "+h+":"+m+":"+s;
        var t = setTimeout(function(){startTime()},500);
    }

    function checkTime(i) {
        if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }
</script>
</head>

<body onload="startTime()">
    <!-- start: Header -->
    <div class="navbar">
    <div class="navbar-inner">
    <div class="container-fluid">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
          <div style=" padding-left:0px; padding-top:10px" class="brand" id="txt"><a  href="index.html"><span></span></a></div>
     
        <!-- start: Header Menu -->
        
        <div class="nav-no-collapse header-nav">
            <ul class="nav pull-right">
            
            
                <!-- end: User Dropdown -->
            </ul>
        </div>
        <!-- end: Header Menu -->

    </div>
</div>
</div>
    <!-- start: Header -->

    <div class="container-fluid-full">
        <div class="row-fluid">

            <!-- start: Main Menu -->
            <div id="sidebar-left" class="span2">
                <div class="nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <!-- start sidebar -->
                        <li>
                            <a class="dropmenu" href="#"><i class="icon-home"></i><span class="hidden-tablet"> Resepsionis</span></a>
                            <ul>
                                <li><a class="submenu" href="<?=site_url("tambahantrian")?>"><i class="icon-tasks"></i><span class="hidden-tablet">  Tambah Anggota </span></a></li>
                                <li><a class="submenu" href="<?=site_url("tambahanggota")?>"><i class="icon-tasks"></i><span class="hidden-tablet">  List Antrian </span></a></li>
                            </ul>   
                        </li>

                        <li>
                            <a class="submenu" href="<?=site_url("barang")?>"><i class="icon-home"></i><span class="hidden-tablet"> Barang</span></a>
                        </li>
                        <li>
                            <a class="submenu" href="<?=site_url("terapi")?>"><i class="icon-home"></i><span class="hidden-tablet"> List Terapi </span></a>
                        </li>
                        <li>
                            <a class="submenu" href="<?=site_url("diagnosa")?>"><i class="icon-home"></i><span class="hidden-tablet"> List Diagnosa </span></a>
                        </li>
                        <li>
                            <a class="dropmenu" href="#"><i class="icon-home"></i><span class="hidden-tablet"> Dokter</span></a>
                            <ul>
                                <li><a class="submenu" href="<?=site_url("antriandokter")?>"><i class="icon-tasks"></i><span class="hidden-tablet">  List Antrian </span></a></li>
                                <li><a class="submenu" href="<?=site_url("listdokter")?>"><i class="icon-tasks"></i><span class="hidden-tablet">  List Pasien </span></a></li>
                            </ul>
                        </li>
                         <li>
                            <a class="dropmenu" href="#"><i class="icon-home"></i><span class="hidden-tablet"> Kasir 1</span></a>
                        </li>
                         <li>
                            <a class="dropmenu" href="#"><i class="icon-home"></i><span class="hidden-tablet"> Kasir 2</span></a>
                        </li>
                        <li><a class="submenu" href="<?=base_url()?>index.php/logout"><i class="icon-remove"></i><span class="hidden-tablet">  Logout </span></a></li>
                    </ul>
                </div>
            </div>