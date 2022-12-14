<?php 
session_start();
if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] != true){
    header("Location: index.php");
}
include_once("connection.php");
// Get clients
$clients = mysqli_query($mysqli, "SELECT * FROM clients where 1 ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<!--
BeyondAdmin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.1
Version: 1.3
Purchase: http://wrapbootstrap.com
-->

<html xmlns="http://www.w3.org/1999/xhtml">

<!-- Head -->
<head>
    <meta charset="utf-8" />
    <title>Clients</title>

    <meta name="description" content="Clients page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/weather-icons.min.css" rel="stylesheet" />

    <!--Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300"
          rel="stylesheet" type="text/css">

    <!--Beyond styles-->
    <link id="beyond-link" href="assets/css/beyond.min.css" rel="stylesheet" />
    <link href="assets/css/demo.min.css" rel="stylesheet" />
    <link href="assets/css/typicons.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="" rel="stylesheet" type="text/css" />

    <!--Page Related styles-->
    <link href="assets/css/dataTables.bootstrap.css" rel="stylesheet" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="assets/js/skins.min.js"></script>
</head>
<!-- /Head -->
<!-- Body -->
<body>
    <!-- Loading Container -->
    <!-- <div class="loading-container">
        <div class="loader"></div>
    </div> -->
    <!--  /Loading Container -->
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="navbar-container">
                <!-- Navbar Barnd -->
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <small>
                            <img src="assets/img/logo.png" alt="" />
                        </small>
                    </a>
                </div>
                <!-- /Navbar Barnd -->
                <!-- Sidebar Collapse -->
                <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="collapse-icon fa fa-bars"></i>
                </div>
                <!-- /Sidebar Collapse -->
                <!-- Account Area and Settings --->
                <div class="navbar-header pull-right">
                    <div class="navbar-account">
                        <ul class="account-area">
                            <li>
                                <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                    <div class="avatar" title="View your public profile">
                                        <img src="assets/img/avatars/adam-jansen.jpg">
                                    </div>
                                    <section>
                                        <h2><span class="profile"><span>David Stevenson</span></span></h2>
                                    </section>
                                </a>
                                <!--Login Area Dropdown-->
                                <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                    <li class="username"><a>David Stevenson</a></li>
                                    <li class="email"><a>David.Stevenson@live.com</a></li>
                                    <!--Avatar Area-->
                                    <li>
                                        <div class="avatar-area">
                                            <img src="assets/img/avatars/adam-jansen.jpg" class="avatar">
                                            <span class="caption">Change Photo</span>
                                        </div>
                                    </li>
                                    <!--Avatar Area-->
                                    <li class="edit">
                                        <a href="profile.html" class="pull-left">Profile</a>
                                        <a href="#" class="pull-right">Setting</a>
                                    </li>
                                    <!--Theme Selector Area-->
                                    <li class="theme-area">
                                        <ul class="colorpicker" id="skin-changer">
                                            <li><a class="colorpick-btn" href="#" style="background-color:#5DB2FF;" rel="assets/css/skins/blue.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#2dc3e8;" rel="assets/css/skins/azure.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#03B3B2;" rel="assets/css/skins/teal.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#53a93f;" rel="assets/css/skins/green.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#FF8F32;" rel="assets/css/skins/orange.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#cc324b;" rel="assets/css/skins/pink.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#AC193D;" rel="assets/css/skins/darkred.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#8C0095;" rel="assets/css/skins/purple.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#0072C6;" rel="assets/css/skins/darkblue.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#585858;" rel="assets/css/skins/gray.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#474544;" rel="assets/css/skins/black.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#001940;" rel="assets/css/skins/deepblue.min.css"></a></li>
                                        </ul>
                                    </li>
                                    <!--/Theme Selector Area-->
                                    <li class="dropdown-footer">
                                        <a href="Logout.php">
                                            Sign out
                                        </a>
                                    </li>
                                </ul>
                                <!--/Login Area Dropdown-->
                            </li>
                            <!-- /Account Area -->
                            <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                            <!-- Settings -->
                        </ul><div class="setting">
                            <a id="btn-setting" title="Setting" href="#">
                                <i class="icon glyphicon glyphicon-cog"></i>
                            </a>
                        </div><div class="setting-container">
                            <label>
                                <input type="checkbox" id="checkbox_fixednavbar">
                                <span class="text">Fixed Navbar</span>
                            </label>
                            <label>
                                <input type="checkbox" id="checkbox_fixedsidebar">
                                <span class="text">Fixed SideBar</span>
                            </label>
                            <label>
                                <input type="checkbox" id="checkbox_fixedbreadcrumbs">
                                <span class="text">Fixed BreadCrumbs</span>
                            </label>
                            <label>
                                <input type="checkbox" id="checkbox_fixedheader">
                                <span class="text">Fixed Header</span>
                            </label>
                        </div>
                        <!-- Settings -->
                    </div>
                </div>
                <!-- /Account Area and Settings -->
            </div>
        </div>
    </div>
    <!-- /Navbar -->
    <!-- Main Container -->
    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar -->
            <div class="page-sidebar" id="sidebar">
                <!-- Sidebar Menu -->
                <ul class="nav sidebar-menu">
                    <!--Dashboard-->
                    <li>
                        <a href="clients.php">
                            <i class="menu-icon glyphicon glyphicon-user"></i>
                            <span class="menu-text"> Client </span>
                        </a>
                    </li>                    
                </ul>
                <!-- /Sidebar Menu -->
            </div>
            <!-- /Page Sidebar -->
                        <!-- Page Content -->
            <div class="page-content">
                <!-- Page Breadcrumb -->
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="#">Client</a>
                        </li>
                        <li class="active">View Clients</li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->
                <!-- Page Header -->
                <div class="page-header position-relative">
                    <div class="header-title">
                        <h1>
                            Clients
                        </h1>
                    </div>
                    <!--Header Buttons-->
                    <div class="header-buttons">
                        <a class="sidebar-toggler" href="#">
                            <i class="fa fa-arrows-h"></i>
                        </a>
                        <a class="refresh" id="refresh-toggler" href="">
                            <i class="glyphicon glyphicon-refresh"></i>
                        </a>
                        <a class="fullscreen" id="fullscreen-toggler" href="#">
                            <i class="glyphicon glyphicon-fullscreen"></i>
                        </a>
                    </div>
                    <!--Header Buttons End-->
                </div>
                <!-- /Page Header -->
                <!-- Page Body -->
                <div class="page-body">
                    <!-- Your Content Goes Here -->
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="widget">
                                <div class="widget-header ">
                                    <span class="widget-caption">Client List</span>
                                    <div class="widget-buttons">
                                        <a href="#" data-toggle="maximize">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                        <a href="#" data-toggle="collapse">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                        <a href="#" data-toggle="dispose">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="widget-body">
                                    <div class="alert alert-info fade in clientStatus">
                                        <button class="btn btn-default btn-xs" data-dismiss="alert" style="float: right; margin-left: 10px;">
                                            Cancel
                                        </button>
                                        <button onclick="window.location = 'clients.php'" class="btn btn-danger btn-xs refresh" style="float: right;">
                                            Refresh
                                        </button>
                                        <i class="fa-fw fa fa-info"></i>
                                        <strong>Info!</strong> <span></span>
                                    </div>
                                    <input type="hidden" name="currentClients" class="no_of_clients" value="<?= $clients->num_rows ?>">
                                    <div class="table-toolbar">
                                        <a id="new_client" href="javascript:void(0);" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">
                                            Add New Client
                                        </a>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover" id="simpledatatable">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="checker"><span class=""><input type="checkbox" class="group-checkable" data-set="#flip .checkboxes"></span></div>
                                                </th>
                                                <th>
                                                    FirstName
                                                </th>
                                                <th>
                                                    LastName
                                                </th>
                                                <th>
                                                    Phone
                                                </th>
                                                <th>
                                                    Joined
                                                </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $update = [];
                                                while($row = $clients->fetch_array()){
                                                    $update[] = $row['updated_at'];
                                                    ?>
                                                    <tr class="row_<?= $row['id'] ?>">
                                                        <td>
                                                            <input type="hidden" class="fname" value="<?= $row['firstname'] ?>">
                                                            <input type="hidden" class="lname" value="<?= $row['lastname'] ?>">
                                                            <input type="hidden" class="pvalue" value="<?= $row['numberphone'] ?>">
                                                            <div class="checker"><span class=""><input type="checkbox" class="checkboxes" value="1"></span></div>
                                                        </td>
                                                        <td>
                                                            <?= htmlspecialchars($row['firstname']) ?>
                                                        </td>
                                                        <td>
                                                            <?= htmlspecialchars($row['lastname']) ?>
                                                        </td>
                                                        <td>
                                                            <?= htmlspecialchars($row['numberphone']) ?>
                                                        </td>
                                                        <td class="center ">
                                                            <?= date('d, F, Y', strtotime($row['created_at'])) ?>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" id="<?= $row['id'] ?>" class="btn btn-info btn-xs edit" onclick= "EditClient(this)"><i class="fa fa-edit"></i> Edit</a>
                                                            <a href="javascript:void(0)" id="<?= $row['id'] ?>" class="btn btn-danger btn-xs delete" onclick= "DeleteClient(this)"><i class="fa fa-trash-o" ></i> Delete</a>
                                                        </td>
                                                    </tr>                                            
                                                    <?php
                                                }
                                                $last_update = null;
                                                if(!empty($update)){
                                                    sort($update);
                                                    $last_update = $update[0];
                                                }                                           
                                            ?>                                       
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="currentLastUpdate" class="last_updated" value="<?= ($last_update != null) ? $last_update : '' ?>">
                                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                      Launch demo modal
                                    </button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
        </div>
        <!-- /Page Container -->
        <!-- Main Container -->


    </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="newClient" >
      <div class="modal-body">
        <div class="row">            
            <div class="col-md-12">
                <div class="alert alert-danger fade in new_error">
                    <i class="fa-fw fa fa-times"></i>
                    <strong>Error!</strong> <span></span>
                </div>
                <div class="form-group">
                    <label>Firstname *</label>
                    <input type="text" name="firstname" class="form-control" placeholder="FirstName" id="new_firstname" required="">
                </div>
                <div class="form-group">
                    <label>Lastname *</label>
                    <input type="text" name="lastname" class="form-control" placeholder="LastName" id="new_lastname" required="">
                </div>
                <div class="form-group">
                    <label>Contact Number *</label>
                    <input type="text" name="phone" class="form-control" placeholder="Contact Number" id="new_phone" required="">
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editClient" >
        <input type="hidden" name="id" id="client_id" />
      <div class="modal-body">
        <div class="row">            
            <div class="col-md-12">
                <div class="alert alert-danger fade in new_error">
                    <i class="fa-fw fa fa-times"></i>
                    <strong>Error!</strong> <span></span>
                </div>
                <div class="form-group">
                    <label>Firstname *</label>
                    <input type="text" name="firstname" class="form-control" placeholder="FirstName" id="edit_firstname" required="">
                </div>
                <div class="form-group">
                    <label>Lastname *</label>
                    <input type="text" name="lastname" class="form-control" placeholder="LastName" id="edit_lastname" required="">
                </div>
                <div class="form-group">
                    <label>Contact Number *</label>
                    <input type="text" name="phone" class="form-control" placeholder="Contact Number" id="edit_phone" required="">
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>

    <!--Basic Scripts-->
    <script src="assets/js/jquery-2.0.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="assets/js/beyond.min.js"></script>

    <!--Page Related Scripts-->
    <script src="assets/js/datatable/jquery.dataTables.min.js"></script>
    <script src="assets/js/datatable/ZeroClipboard.js"></script>
    <script src="assets/js/datatable/dataTables.tableTools.min.js"></script>
    <script src="assets/js/datatable/dataTables.bootstrap.min.js"></script>
    <!-- <script src="assets/js/datatable/datatables-init.js"></script> -->

    <script src="assets/js/bootbox/bootbox.js"></script>
    <script>
        
        var InitiateSimpleDataTable = function () {
    return {
        init: function () {
            //Datatable Initiating
            var oTable = $('#simpledatatable').dataTable({
                "sDom": "Tflt<'row DTTTFooter'<'col-sm-6'i><'col-sm-6'p>>",
                "iDisplayLength": 5,
                "oTableTools": {
                    "aButtons": [
                        "copy", "csv", "xls", "pdf", "print"
                    ],
                    "sSwfPath": "assets/swf/copy_csv_xls_pdf.swf"
                },
                "language": {
                    "search": "",
                    "sLengthMenu": "_MENU_",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                "aoColumns": [
                  { "bSortable": false },
                  null,
                  { "bSortable": false },
                  null,
                  { "bSortable": false },
                  null
                ],
                "aaSorting": []
            });

            //Check All Functionality
            jQuery('#simpledatatable .group-checkable').change(function () {
                var set = $(".checkboxes");
                var checked = jQuery(this).is(":checked");
                jQuery(set).each(function () {
                    if (checked) {
                        $(this).prop("checked", true);
                        $(this).parents('tr').addClass("active");
                    } else {
                        $(this).prop("checked", false);
                        $(this).parents('tr').removeClass("active");
                    }
                });

            });
            jQuery('#simpledatatable tbody tr .checkboxes').change(function () {
                $(this).parents('tr').toggleClass("active");
            });

        }

    };

}();
InitiateSimpleDataTable.init();
$(".new_error").hide();
$("#newClient").submit(function(e){
    e.preventDefault();
    var $firstname = $.trim($("#newClient #new_firstname").val());
    var $lastname = $.trim($("#newClient #new_lastname").val());
    var $phone = $.trim($("#newClient #new_phone").val());
    // validate the give input
    if($firstname.length > 0 && $lastname.length > 0 && $phone.length > 0){
        var data = {'firstname': $firstname, 'lastname': $lastname, 'phone': $phone};
        $.ajax({
            url:"AddClient.php",
            method: "POST",
            data: data,
            dataType: "text"
        }).done(function(response){
            if(response == "0"){
                $(".new_error span").html("Invalid Input");
                $(".new_error").show();
            }else if(response == "0"){
                $(".new_error span").html("All the fields are required");
                $(".new_error").show();
            }else{
                window.location = "clients.php";
            }
        });
    }else{
        $(".new_error span").html("All the fields are required");
        $(".new_error").show();
    }
});
function EditClient(client){
    var id = $(client).attr('id');
    var $firstname = $.trim($(".row_"+id+" .fname").val());
    var $lastname = $.trim($(".row_"+id+" .lname").val());
    var $phone = $.trim($(".row_"+id+" .pvalue").val());

    $("#EditModal #edit_firstname").val($firstname);
    $("#EditModal #edit_lastname").val($lastname);
    $("#EditModal #edit_phone").val($phone);
    $("#EditModal #client_id").val(id);
    $("#EditModal").modal('show');

    
}

$("#editClient").submit(function(e){
    e.preventDefault();
    var $firstname = $.trim($("#editClient #edit_firstname").val());
    var $lastname = $.trim($("#editClient #edit_lastname").val());
    var $phone = $.trim($("#editClient #edit_phone").val());
    var $id = $.trim($("#editClient #client_id").val());
    // validate the give input
    if($firstname.length > 0 && $lastname.length > 0 && $phone.length > 0){
        var data = {'firstname': $firstname, 'lastname': $lastname, 'phone': $phone, 'id': $id};
        $.ajax({
            url:"EditClient.php",
            method: "POST",
            data: data,
            dataType: "text"
        }).done(function(response){
            if(response == "0"){
                $(".new_error span").html("Invalid Input");
                $(".new_error").show();
            }else if(response == "0"){
                $(".new_error span").html("All the fields are required");
                $(".new_error").show();
            }else{
                window.location = "clients.php";
            }
        });
    }else{
        $(".new_error span").html("All the fields are required");
        $(".new_error").show();
    }
});

function DeleteClient(client){
    var id = $(client).attr('id');
    if(confirm("Are sure you want to delete this client?")){
        var data = {'id': id};
        $.ajax({
            url:"DeleteClient.php",
            method: "POST",
            data: data,
            dataType: "text"
        }).done(function(response){
            if(response == "0"){
                $(".new_error span").html("Invalid Input");
                $(".new_error").show();
            }else if(response == "0"){
                $(".new_error span").html("All the fields are required");
                $(".new_error").show();
            }else{
                window.location = "clients.php";
            }
        });
    }
}
checkStatus();
$('.clientStatus').hide();
function checkStatus(){
    setInterval(function(){
        $.ajax({
            url:"checkStatus.php",
            method: "GET",
            dataType: "JSON"
        }).done(function(response){
            var clientList = $(".no_of_clients").val();
            var currentLastUpdate = $(".last_updated").val();
            if(response){
                var currentClients = response['number_rows'];
                var lastUpdated = response['last_updated'];
                if(parseInt(currentClients) > parseInt(clientList)){
                    // New client added
                    $('.clientStatus span').html("A client has beed added");
                    $('.clientStatus').show();
                }else if(parseInt(currentClients) < parseInt(clientList)){
                    // Client deleted
                    $('.clientStatus span').html("A client has beed deleted");
                    $('.clientStatus').show();
                }else{
                    // Check for the update
                    if(new Date(lastUpdated) > new Date(currentLastUpdate)){
                        $('.clientStatus span').html("A client has beed updated");
                        $('.clientStatus').show();
                    }
                }
            }
        });
    }, 5000);
}
    </script>
    
</body>
<!--  /Body -->
</html>
