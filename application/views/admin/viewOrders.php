  <!-- <link href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css" rel="stylesheet"> -->
  <style type="text/css">
    #example_length,#example_info{
      margin-left: 5%;
      margin-top: 0.5%;
    }
    #example_filter,#example_paginate{
      float: right;
    }
    #example_filter{
      margin-top: -2%;
    }
    .col-sm-12,#margin-left{
      margin-left: 2%;
      width: 99%;
    }
  </style>
  <div class="widget widget-plain"><div class="widget-content"><!-- <a href="<?=Adminpath?>addProduct" class="btn btn-large btn-success btn-support-ask"><i class="shortcut-icon icon-picture"></i><span class="shortcut-label"> Add New Product</span></a> 
   --></div> <!-- /widget-content -->
  <!-- <?php $attributes = array("name" => "form1");
  //echo form_open("admin/ViewOrders", $attributes);?>
  <div class="form-group">
    <select id="city" name="city" onchange="get_category('http://localhost/FoodShop/index.php/admin/')">
      <?php
      foreach ($city as $key=>$value) {
       //echo '<option value='.$value.'>'.$value.'</option>';
     } ?>

   </select>
 </div> -->
 <!-- <div class="form-group">
  <?php $attributes = 'id="rest" class="form-control"';
  //echo form_dropdown('rest', $restaurant, set_value('rest'), $attributes); ?>
</div>
<div class="form-group">
  <button name="submit" type="submit" class="btn btn-info btn-block">Submit</button>
</div>
<?php echo form_close(); ?> -->

</div><div class="widget widget-table action-table">
<div class="widget-header"> <i class="icon-th-list"></i>
  <h3>All Orders</h3>
</div>
<!-- /widget-header -->
<div class="widget-content">
  <table class="table table-striped table-bordered" id="example">
    <thead>
      <tr>
        <th style="width: 1%;"> # </th>
        <th style="width: 10%;">Customer Name</th>
        <th style="width: 10.5%;">Oder Type</th>
        <th style="width: 10.5%;">Cuisine Name</th><th style="width: 10.5%;">Restaurant</th>
        <th style="width: 4.5%;">Delivery Date</th><th style="width: 4%;"> Status</th><th class="td-actions" style="width: 10%;">Action</th>
      </tr>        
    </thead>
    <tbody>
      <?php 
      if($products)
      {

        foreach ($products as $row) {
          $link='';
          if($row['status']!='1')
          {
            $link ='<a href="javascript:;" onclick="SetStatus(\'1\','.$row['oid'].',\'order_master\',\'oid\')" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i> Active </a>';
          }
          else{
            $link ='<a href="javascript:;" onclick="SetStatus(\'0\','.$row['oid'].',\'order_master\',\'oid\')" class="btn btn-small btn-warning"><i class="btn-icon-only icon-ok"> </i> Deactive</a>';
          }
          echo '<tr>
          <td> '.$row['oid'].'</td><td> '.$row['username'].'</td><td> '.$row['order_type'].'</td><td> '.$row['cusine'].'</td><td> '.$row['rest_loca'].'</td><td> '.$row['deliver_date'].'</td><td class="td-actions">'.$link.' </td><td><a href="javascript:;" onclick="Delete('.$row['oid'].')" class="btn btn-small btn-danger"><i class="btn-icon-only icon-trash"> </i> Delete Order</a></td>
        </tr>';
              # code...
      }
    }

    ?>
  </tbody>
</table>
</div>
<!-- /widget-content --> 
</div>
<script type="text/javascript">
  function SetStatus(status,id,table,where)
  {
    if(confirm('Are you sure you want to Update Status?'))
    {
      $.ajax({
        type: "POST",
        url: "<?=Adminpath?>SetStatus",
        data: {"id": id,"status": status,"table":table,"where":where},
        success: function(test)
        {
          alert('Status Has been Updated..');
          location.reload();
        }
      });
    }
  }


  function Delete(id)
  {
    if(confirm('Are you sure you want to Delete?'))
    {
      $.ajax({
        type: "POST",
        url: "<?=Adminpath?>Delete/order_master/oid/"+id+"",
        data: {"id": id,"table": 'order_master'},
        success: function(test)
        {
          alert('Oder Has been Deleted..');
          location.reload();
        }
      });
    }
  }
</script>
