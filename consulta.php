<?php

require_once "conexion.php";

class datosModelo extends Modelo {

    public function __construct() {
        parent::__construct();
    }

    public function get_users() {
        date_default_timezone_set('America/Bogota');
        $desde = date("Y-m-d 00:00:00");
        $hasta = date("Y-m-d 22:00:00");
        var_dump($desde);
        var_dump($hasta);
        $result = $this->_db->query("SELECT OP.id as id, 
        OP.provider_id as provider_id, 
        OP.order_id as order_id,
        provider.name as providerName,         
        OP.description as description,         
        OP.status as status, 
        OP.emissionData as emissionData, 
        custom.firstname as firstname,
        CASE OP.description 
        WHEN OP.description = 'Tiquete Aereo' 
            THEN OP.emissionData
            ELSE OP.booking
        END as booking
        FROM order_product AS OP 
        INNER JOIN orders AS OD ON OP.order_id = OD.id 
        INNER JOIN customer as custom ON OD.customer_id = custom.id
        INNER JOIN provider on OP.provider_id = provider.id
        WHERE OD.customer_id IN (100,676,677)        
        
        AND OD.creationDate BETWEEN '" . $desde . "' AND '" . $hasta . "'
        ORDER BY OD.creationDate DESC");
        $users = $result->fetch_all(MYSQLI_ASSOC);
        
        return $users;
        //AND OP.status = 'approved'
    }

    public function insertOrders() {
        $now = date("Y-m-d H:i:s");
        $NULL = null;
        $verification = 1;
        
        $users = $this->get_users();
        
        for ($i = 0; $i < $_POST['cantidad']; ++$i) {                                    
            $resultQuery = $this->_db1->query('SELECT id FROM reservations WHERE id_reservation = '.$users[$i]['id'].' ');
            if($resultQuery->num_rows == 0){                
                $result = $this->_db1->query('INSERT INTO reservations (id_reservation, provider, provider_name, order_id, description, booking, status, emission_data, first_name, verification, creation) VALUES (' . $_POST['id_' . $i] . ', ' . $_POST['provider_id_' . $i] . ', "' . $_POST['providerName_' . $i] . '", ' . $_POST['order_id_' . $i] . ', "' . $_POST['description_' . $i] . '", "' . $_POST['booking_' . $i] . '", "' . $_POST['status_' . $i] . '", "' . $_POST['emissionData_' . $i] . '","' . $_POST['firstname_' . $i] . '", ' . $verification . ', "' . $now . '")');
                return $users;
            }else{
                echo "Ya se ingreso el Id = ".$users[$i]['id'].'<br>';
                return $users;
            }
        }                        
        
        if (@$result === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . @$result . "<br>" . $this->_db1->error;
        }
        
    }
    
    
    

}

?> 