<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="<?php echo base_url('assets/img/logo gunung salak.png');?>">
<title>Adventurer Gunung Salak</title>
<!-- Bootstrap core CSS -->
<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<link href="<?php echo base_url('assets/css/ie10-viewport-bug-workaround.css');?>" rel="stylesheet">
 <!-- Font Icons -->
<link href="<?php echo base_url('assets/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/plugins/ionicon/css/ionicons.min.css');?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/css/material-design-iconic-font.min.css');?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/datepicker/datepicker3.css');?>">
<link href="<?php echo base_url('assets/plugins/timepicker/bootstrap-timepicker.min.css');?>" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/magnific-popup/magnific-popup.css');?>"/>
<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="<?php echo base_url('assets/js/ie-emulation-modes-warning.js');?>"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- Custom styles for this template -->
<link href="<?php echo base_url('assets/css/carousel.css');?>" rel="stylesheet">
 <script>
    function validateSearch() {
        var x = document.forms["searchForm"]["word"].value;
        if (x == "") {
            $error_search = "Key searching tidak ditemukan";
            document.getElementById("error").innerHTML = $error_search;
            return false;
        }
    }
</script>
</head>