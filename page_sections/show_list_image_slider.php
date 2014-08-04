<?php
    $handle = opendir(dirname(realpath(__FILE__)).'/image_slider/');
?>
<table border="0" width="100%">
    <tr>
        <td>Ser.No</td>
        <td>Image File</td>
    </tr>
    <?php
        $ctr=1;
        while($file = readdir($handle)){
            
            if($file !== '.' && $file !== '..' && $file !== '.DS_Store'){
                echo '<tr>';
                echo '<td>'.$ctr++.'</td>';
                echo '<td>';
                echo "<img src='image_slider/$file' border='0' width='100%'/>";
                echo '</td>';
                echo '</tr>';
            }
            
        }//end while loop
    ?>
</table>