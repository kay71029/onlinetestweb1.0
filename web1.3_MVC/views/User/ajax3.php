<table class="table">
            <tr>
              <th>日期</th>
              <th>題號</th>
              <th>A</th>
              <th>B</th>
              <th>C</th>
              <th>D</th>
              <th>答題</th>
              <th>正解</th>
              <th>分數</th>
              <!--<th>點數</th>-->
            </tr>
            
            <?php foreach($data as $row){?>
             
            <tr>
              <td><?PHP echo $row['r_date']; ?></td>
              <td><button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal<?PHP echo $row['q_id']; ?>"><?PHP echo $row['q_id']; ?></button></td>
              <td><?PHP echo $row['A']; ?></td>
              <td><?PHP echo $row['B']; ?></td>
              <td><?PHP echo $row['C']; ?></td>
              <td><?PHP echo $row['D']; ?></td>
              <td><?PHP echo $row['r_ans']; ?></td>
              <td><?PHP echo $row['ans']; ?></td>
              <td><?PHP echo $row['r_score']; ?></td>
              <!--<td></td>-->
            </tr>
  
            <?php } ?>
            
    </table>
    
    
<!-- Modal -->
<?php foreach($data as $row){?>
<div class="modal fade" id="myModal<?PHP echo $row['q_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">題目</h4>
      </div>
      <div class="modal-body">
        <?PHP echo $row['question']; ?>
      </div>
   
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>   