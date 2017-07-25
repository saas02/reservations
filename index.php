<?php
require_once "consulta.php";

$modelo = new datosModelo();
$a_users = $modelo->get_users();
?> 

<!DOCTYPE html> 
<html> 
    <head> 
        <title>Usuarios registrados</title> 
    </head> 
    <body> 
        <form id="formInser" name="formInsert" method="POST" action="insertOrders.php">
            <table border="1"> 
                <tr> 
                    <td>Id</td> 
                    <td>Provider Id</td> 
                    <td>Provider Name</td> 
                    <td>Order</td> 
                    <td>Description</td> 
                    <td>Booking</td>
                    <td>Status</td> 
                    <!-- <td>Emission</td>  -->
                    <td>Nombre</td>
                </tr><!-- /THEAD --> 
                <?php $i = 0; foreach ($a_users as $row): ?>
                    <tr> 
                        <td><?php echo $row["id"] ?></td>; 
                        <td><?php echo $row["provider_id"] ?></td>; 
                        <td><?php echo $row["order_id"] ?></td>; 
                        <td><?php echo $row["providerName"] ?></td>;                         
                        <td><?php echo $row["description"] ?></td>; 
                        <td><?php echo $row["booking"] ?></td>; 
                        <td><?php echo $row["status"] ?></td>; 
                        <!-- <td><?php echo base64_encode($row["emissionData"]) ?></td>;  -->
                        <td><?php echo $row["firstname"] ?></td>;                         
                    </tr><!-- /TROW -->                    
                <?php ++$i;endforeach ?>     
                <?php echo '<input type="hidden" name="cantidad" value="'.$i.'" >';?>    
            </table>
            <input type="submit" value="Enviar">
        </form>
    </body> 
</html> 