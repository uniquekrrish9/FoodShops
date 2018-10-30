  <!-- <link href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css" rel="stylesheet"> -->

  <div class="widget widget-plain"><div class="widget-content"><a href="<?=Adminpath?>addOffer" class="btn btn-large btn-success btn-support-ask"><i class="shortcut-icon icon-file"></i><span class="shortcut-label"> Add New Offers</span></a> 
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
        <th style="width: 10%;"> Offer Name</th>
        <th style="width: 20%;"> Description</th><th style="width: 2%;"> Price</th><th style="width: 4.5%;"> Create Date</th><th style="width: 2%;"> Status</th><th class="td-actions" style="width: 20%;">Action</th>
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
            $link ='<a href="javascript:;" onclick="SetStatus(\'True\','.$row['offid'].',\'offer_master\',\'offid\')" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i> Active </a>';
          }
          else{
            $link ='<a href="javascript:;" onclick="SetStatus(\'False\','.$row['offid'].',\'offer_master\',\'offid\')" class="btn btn-small btn-warning"><i class="btn-icon-only icon-ok"> </i> Deactive</a>';
          }
          echo '<tr>
          <td> '.$row['offid'].'</td><td> '.$row['offername'].'</td><td> '.$row['offer_detail'].'</td><td> '.$row['price'].'</td><td> '.$row['createdate'].'</td><td> '.$row['status'].'</td><td class="td-actions">'.$link.' | <a href="'.Adminpath.'EditOffer/'.$row['offid'].'" class="btn btn-small btn-info"><i class="btn-icon-only icon-edit"> </i> Edit This Offer</a> | <a href="javascript:;" onclick="Delete('.$row['offid'].')" class="btn btn-small btn-danger"><i class="btn-icon-only icon-trash"> </i> Delete This Offer</a></td>
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
        data: {"sid": id,"status": status,"table":table,"where":where},
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
        url: "<?=Adminpath?>Delete/offer_master/offid/"+id+"",
        data: {"uid": id,"table": 'offer_master'},
        success: function(test)
        {
          alert('Offer Has been Deleted..');
          location.reload();
        }
      });
    }
  }</script>
