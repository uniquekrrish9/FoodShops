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
<div class="widget widget-plain"><div class="widget-content"><a href="<?=Adminpath?>addProduct" class="btn btn-large btn-success btn-support-ask"><i class="shortcut-icon icon-picture"></i><span class="shortcut-label"> Add New Product</span></a> 
</div> <!-- /widget-content -->

</div><div class="widget widget-table action-table">
<div class="widget-header"> <i class="icon-th-list"></i>
  <h3>All Products</h3>
</div>
<!-- /widget-header -->
<div class="widget-content">
  <table class="table table-striped table-bordered" id="example">
    <thead>
      <tr>
        <th style="width: 1%;"> # </th>
        <th style="width: 10%;">Product Name</th>
        <th style="width: 5%;"> Image</th><th style="width: 10.5%;">Details</th><th style="width: 4.5%;">Price</th><th style="width: 2%;"> Status</th><th class="td-actions" style="width: 20%;">Action</th>
      </tr>        
    </thead>
    <tbody>
      <?php 
      if($offers_list)
      {

        foreach ($offers_list as $row) {
          $link='';
          if($row['status']!='1')
          {
            $link ='<a href="javascript:;" onclick="SetStatus(\'1\','.$row['id'].',\'products\',\'id\')" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i> Active </a>';
          }
          else{
            $link ='<a href="javascript:;" onclick="SetStatus(\'0\','.$row['id'].',\'products\',\'id\')" class="btn btn-small btn-warning"><i class="btn-icon-only icon-ok"> </i> Deactive</a>';
          }
          echo '<tr>
          <td> '.$row['id'].'</td><td> '.$row['name'].'</td><td><img src="'.ASSETS2.'/products/'.$row['picture'].'" width="80" height="60"/></td><td> '.$row['details'].'</td><td> '.$row['price'].'</td><td> '.$row['status'].'</td><td class="td-actions">'.$link.' | <a href="'.Adminpath.'EditProduct/'.$row['id'].'" class="btn btn-small btn-info"><i class="btn-icon-only icon-edit"> </i> Edit</a> | <a href="javascript:;" onclick="Delete('.$row['id'].')" class="btn btn-small btn-danger"><i class="btn-icon-only icon-trash"> </i> Delete</a></td>
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
        url: "<?=Adminpath?>Delete/products/id/"+id+"",
        data: {"id": id,"table": 'products'},
        success: function(test)
        {
          alert('Product Has been Deleted..');
          location.reload();
        }
      });
    }
  }</script>
