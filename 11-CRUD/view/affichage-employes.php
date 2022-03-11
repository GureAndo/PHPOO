<?php

// echo "<pre>"; print_r($data);echo"</pre>";
//  echo "<pre>"; print_r($fields);echo"</pre>";

?>


<!-- 
<table class="table table-warning text-center my-5">
    <?php //foreach($data as $dataEmployes){
        //echo'<tr>';
        //echo '<td>'; implode('</td><td>', $dataEmployes);echo '</td>';
        //echo '</tr>';  
    //}
    ?>
</table> -->

<table class="table table-warning text-center my-5">
    <thead>
        <tr>
            <?php foreach($fields as $value): ?>
            <th>
                <?= $value['Field']?>
            </th>
            <?php endforeach?>
            <th>voir</th>
            <th>modif</th>
            <th>supp</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $dataEmployes):?> 
        <tr>
            <td><?= implode('</td><td>', $dataEmployes)?></td>
            <td><a href=""><i class="bi bi-eye"></i></a></td>
            <td><a href=""><i class="bi bi-pencil"></i></a></td>
            <td><a href=""><i class="bi bi-trash"></i></a></td>
        </tr>
     <?php endforeach;?>
    </tbody>

       
</table>

