<table class="table">
  <br>
  <br>
   
  <tr>
    <th>日期</th>
    <th>學號</th>
    <th>題號</th>
    <th>答題</th>
    <th>答案</th>
    <th>分數</th>
   
  </tr>
     <?php foreach($data as $row){?>
  <tr>
    <td><?PHP echo $row['r_date']; ?> </td>
    <td><?PHP echo $row['user_id']; ?> </td>
    <td><?PHP echo $row['q_id']; ?> </td>
    <td><?PHP echo $row['r_ans']; ?> </td>
    <td><?PHP echo $row['ans']; ?> </td>
    <td><?PHP echo $row['r_score']; ?> </td>
     
     <?php } ?>
     
  </tr>
  </table>
   