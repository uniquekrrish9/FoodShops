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
</div><div class="widget widget-table action-table">
<div class="widget-header"> <i class="icon-th-list"></i>
  <h3>All Enquiries</h3>
</div>
<!-- /widget-header -->
<div class="widget-content">
  <table class="table table-striped table-bordered" id="example">
    <thead>
      <tr>
        <th style="width: 1%;"> # </th>
        <th style="width: 7%;"> User Name</th>
        <th style="width: 20%;"> Message</th><th style="width: 5%;"> Mobile No</th><th style="width: 5%;"> Date</th><th style="width: 3%;"> EMail</th><th style="width: 0.5%;"> Status</th><th class="td-actions" style="width: 12%;">Action</th>
      </tr>        
    </thead>
    <tbody>
      <?php 
      if($ViewEnquiry)
      {

        foreach ($ViewEnquiry as $row) {
          $link='';
          if($row['status']!='1')
          {
            $link ='<a href="javascript:;" onclick="SetStatus(1,'.$row['eid'].',\'enquiry_master\',\'eid\')" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i> Active </a>';
          }
          else{
            $link ='<a href="javascript:;" onclick="SetStatus(0,'.$row['eid'].',\'enquiry_master\',\'eid\')" class="btn btn-small btn-warning"><i class="btn-icon-only icon-ok"> </i> Deactive</a>';
          }
          echo '<tr>
          <td> '.$row['eid'].'</td><td> '.$row['uname'].'</td><td> '.$row['msg'].'</td><td> '.$row['phone'].'</td><td> '.$row['date'].'</td><td> '.$row['email'].'</td><td> '.$row['status'].'</td><td class="td-actions">'.$link.' | <a href="javascript:;" onclick="Delete('.$row['eid'].')" class="btn btn-small btn-danger"><i class="btn-icon-only icon-trash"> </i> Delete</a></td>
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
        url: "<?=Adminpath?>Delete/enquiry_master/eid/"+id+"",
        data: {"uid": id,"table": 'enquiry_master'},
        success: function(test)
        {
          alert('Offer Has been Deleted..');
          location.reload();
        }
      });
    }
  }</script>
