<table class="table">
    <tr>
      <th>學號</th>
      <th>姓名</th>
      <th>密碼</th>
      <th>信箱</th>
      <th>電話</th>
      <th>刪除</th>
    </tr>
   <?php foreach($data as $row){?>
    <tr>
      <td><?PHP echo $row['user_id']; ?></td>
      <td><?PHP echo $row['user_name']; ?></td>
      <td><?PHP echo $row['user_password']; ?></td>
      <td><?PHP echo $row['user_email']; ?></td>
      <td><?PHP echo $row['user_tel']; ?></td>
      <td>
       <a href="DeStudent?user_id=<?PHP echo $row['user_id']; ?>" class="btn btn-default navbar-btn" >刪除</a>
      </td>     
     
     
      <td><?PHP echo $row['r_date']; ?></td>
     
    </tr>
      <?php } ?>
    </table>