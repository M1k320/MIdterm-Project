<?php 
    function list_vehicles() {
        global $db;
        $query = 'SELECT * FROM vehicles ORDER BY vehicle_id';
        $statement = $db->prepare($query);
        $statement->execute();
        $categories = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }
    function get_by_price() {
        $price = filter_input(INPUT_GET, 'price',FILTER_VALIDATE_INT);
        global $db;
        $query = 'SELECT v.vehicle_id, v.year, v.make, v.model, v.price, t.type_id, c.class_id 
                  FROM vehicles v JOIN types t ON v.type_id = t.type_id JOIN classes ON v.class_id = c.class_id 
                  ORDER BY v.price DESC';
        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }
    function get_by_year() {
        $year = filter_input(INPUT_GET, 'year', FILTER_VALIDATE_INT);
        global $db;
        $query = 'SELECT v.vehicle_id, v.year, v.make, v.model, v.price, t.type_id, c.class_id 
                  FROM vehicles v JOIN types t ON v.type_id = t.type_id JOIN classes c ON v.class_id = c.class_id
                  ORDER BY v.year';
        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }
    function get_by_class() {
        global $db;
        $query = 'SELECT v.vehicle_id, v.year, v.make, v.model, v.price, t.type_id, c.class_id, c class_name 
                  FROM vehicles v JOIN classes c ON v.class_name = c.class_name
                  ORDER BY v.class_name';
        global $db;
        $query = 'SELECT * FROM vehicles WHERE class_name = :class_name';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_name', $class_name);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }
     function get_by_type() {
           global $db;
        $query = 'SELECT v.vehicle_id, v.year, v.make, v.model, v.price, t.type_id, c.class_id, c class_name 
                  FROM vehicles v JOIN types t ON v.type_name = t.type_name
                  ORDER BY v.class_name';
        $query = 'SELECT * FROM vehicles WHERE type_name = :type_name';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_name', $type_name);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }
    function delete_vehicle($vehicle_id) {
        global $db;
        $query = 'DELETE FROM vehicles WHERE vehicle_id = :vehicle_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':vehicle_id', $vehicle_id);
        $statement->execute();
        $statement->closeCursor();
    }
    function add_vehicle($year, $make, $model, $price, $type_id, $class_id) {
        global $db;
        $query = 'INSERT INTO vehicles (year, make, model, price, type_id, class_id)
              VALUES
                 (:year, :make, :model, :price, :type_id, :class_id)';
        $statement = $db->prepare($query);
        $statement->bindValue(':model', $model);
        $statement->bindValue(':year', $year);
        $statement->bindValue(':make', $make);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':type_id', $type_id);
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $statement->closeCursor();
    }
?>
