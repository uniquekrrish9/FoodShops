<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>:: Online Food Shop- ADMIN PANEL ::</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <link rel="stylesheet" type="text/css" href="<?=link?>"/>
  <link href="<?=ASSETS2?>css/bootstrap.min.css" rel="stylesheet">
  <script src="<?=ASSETS?>js/jquery.min.js"></script>

  <link href="<?=ASSETS2?>css/bootstrap-responsive.min.css" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
  <link href="<?=ASSETS2?>css/font-awesome.css" rel="stylesheet">
  <link href="<?=ASSETS2?>css/style.css" rel="stylesheet">
  <link href="<?=ASSETS2?>css/pages/dashboard.css" rel="stylesheet">
  
  <script type="text/javascript" src="<?=ASSETS2?>js/datatables.min.js"></script>
  <style type="text/css">
    #example_length,#example_info{
      margin-left: 5%;
      margin-top: 0.5%;
    }
    .col-sm-12{
      margin-left: 0.5%;
      width: 99%;
    }
  </style>
  <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
      $('#example').DataTable();
    } );
  </script>  
  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
      <!-- <script src="<?=ASSETS?>js/jquery-1.10.2.min.js"></script>  -->
      <script type="text/javascript">
        function get_category(a)
        {
          var category_name = $('#city').val();
          // alert(category_name);
          jQuery.ajax({
            type: "POST",
            url: a + "populate_rest",
            dataType: 'json',
            data: {id: category_name},
            success: function(res) {
              if (res)
              {
                $.each(res,function(k, v){
                  var opt = $('<option />');
                  opt.val(k);
                  opt.text(v);
                  $('#rest').append(opt);
                });
                // /$('#city').append(opt);
              }
            }
          });
        }
      </script>
    </head>
    <body>
      <?php
      $session = get_session_details();
      if(isset($session->admindetails) && !empty($session->admindetails))
      {
        $loggedadmin = (object)$session->admindetails;
        // echo 'Howdy, '.$loggedadmin->username;
      }
      ?>
      <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
            class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="<?=Adminpath?>dashboard">:: ONLINE FOOD SHOP - ADMIN PANEL :: </a>
            <div class="nav-collapse">
              <ul class="nav pull-right">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                  class="icon-cog"></i> Account <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="javascript:;">Settings</a></li>
                    <li><a href="javascript:;">Help</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                  class="icon-user"></i> <?=ucfirst($loggedadmin->username)?> <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="javascript:;">Profile</a></li>
                    <li><a href="<?=Adminpath?>logout">Logout</a></li>
                  </ul>
                </li>
              </ul>
              <form class="navbar-search pull-right">
                <input type="text" class="search-query" placeholder="Search">
              </form>
            </div>
            <!--/.nav-collapse --> 
          </div>
          <!-- /container --> 
        </div>
        <!-- /navbar-inner --> 
      </div>
      <!-- /navbar -->
      <div class="subnavbar">
        <div class="subnavbar-inner">
          <div class="container">
            <ul class="mainnav">
              <li class="active"><a href="<?=Adminpath?>dashboard"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
              <li><a href="<?=Adminpath?>ViewUsers"><i class="icon-list-alt"></i><span>View Users</span> </a> </li>
              <li><a href="<?=Adminpath?>ViewOrders"><i class="icon-file"></i><span>Manage Orders</span> </a></li>
              <li><a href="<?=Adminpath?>viewRests"><i class="icon-picture"></i><span>Manage Restaurants</span> </a></li>
              <li><a href="<?=Adminpath?>ViewEnquiry"><i class="icon-bookmark"></i><span>View Enquiry</span> </a> </li>
              <!-- <li><a href="shortcodes.html"><i class="icon-code"></i><span>Shortcodes</span> </a> </li>
              <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Drops</span> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="icons.html">Icons</a></li>
                  <li><a href="faq.html">FAQ</a></li>
                  <li><a href="pricing.html">Pricing Plans</a></li>
                  <li><a href="login.html">Login</a></li>
                  <li><a href="signup.html">Signup</a></li>
                  <li><a href="error.html">404</a></li>
                </ul>
              </li> -->
            </ul>
          </div>
          <!-- /container --> 
        </div>
        <!-- /subnavbar-inner --> 
      </div>
      <div class="main">  
        <div class="main-inner">

          <div class="container">

            <div class="row">