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
  <div class="widget widget-plain"><div class="widget-content"><a href="<?=Adminpath?>AddRest" class="btn btn-large btn-success btn-support-ask"><i class="shortcut-icon icon-picture"></i><span class="shortcut-label"> Add New Restaurant</span></a> 
  </div> <!-- /widget-content -->

</div><div class="widget widget-table action-table">
<div class="widget-header"> <i class="icon-th-list"></i>
  <h3>All Offers</h3>
</div>
<!-- /widget-header -->
<div class="widget-content">
  <table class="table table-striped table-bordered" id="example">
    <thead>
      <tr>
        <th style="width: 1%;"> # </th>
        <th style="width: 10%;"> Restaurant Name</th>
        <th style="width: 20%;"> Image</th><th style="width: 4.5%;">Address</th><th style="width: 4.5%;">City</th><th style="width: 4.5%;">Phone</th><th style="width: 2%;"> Status</th><th class="td-actions" style="width: 20%;">Action</th>
      </tr>        
    </thead>
    <tbody>
      <?php 
      if($offers_list)
      {

        foreach ($offers_list as $row) {
          $link='';
          if($row['status']!='True')
          {
            $link ='<a href="javascript:;" onclick="SetStatus(\'True\','.$row['rid'].',\'rest_master\',\'rid\')" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i> Active </a>';
          }
          else{
            $link ='<a href="javascript:;" onclick="SetStatus(\'False\','.$row['rid'].',\'rest_master\',\'rid\')" class="btn btn-small btn-warning"><i class="btn-icon-only icon-ok"> </i> Deactive</a>';
          }
          echo '<tr>
          <td> '.$row['rid'].'</td><td> '.$row['rest_name'].'</td><td><img src="'.ASSETS2.'/rest_logo/'.$row['rest_logo'].'" width="80" height="60"/></td><td> '.$row['rest_address'].'</td><td> '.$row['rest_city'].'</td><td> '.$row['rest_phone'].'</td><td> '.$row['status'].'</td><td class="td-actions">'.$link.' | <a href="'.Adminpath.'EditRest/'.$row['rid'].'" class="btn btn-small btn-info"><i class="btn-icon-only icon-edit"> </i> Edit</a> | <a href="javascript:;" onclick="Delete('.$row['rid'].')" class="btn btn-small btn-danger"><i class="btn-icon-only icon-trash"> </i> Delete</a></td>
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
        url: "<?=Adminpath?>Delete/rest_master/rid/"+id+"",
        data: {"rid": id,"table": 'rest_master'},
        success: function(test)
        {
          alert('Offer Has been Deleted..');
          location.reload();
        }
      });
    }
  }</script>
