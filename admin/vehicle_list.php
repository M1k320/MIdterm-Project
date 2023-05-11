<?php include 'view/header.php'; ?>
<main>
    <h2>Vehicle List</h2>
    <section>
        <table>
            <tr>
                <th colspan="2"></th>
                <th>Make</th>
                <th>Model</th>
                <th>Year</th>
                <th>Price</th>
                <th>Type</th>
                <th>Class</th>
            </tr>        
            <?php foreach ($vehicless as $vehicle) : ?>
            <tr>
                <td> <?php echo $vehicle['make']; ?></td>
                <td> <?php echo $vehicle['model']; ?></td>
                <td> <?php echo $vehicle['year']; ?></td>
                <td> <?php echo $vehicle['price']; ?></td>
                <td> <?php echo $vehicle['type_name']; ?></td>
                <td> <?php echo $vehicle['class_name']; ?></td>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_vehicle">
                        <input type="hidden" name="vehicle_id"
                            value="<?php echo $vehicle['vehicle_id']; ?>"/>
                        <input type="submit" value="Remove" class="button red" />
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>    
        </table>
    </section>
    <section>
        <h2>Sort by</h2>
        <form action="." method="get" id="get_by">
                <select name = "action">
                    <option value="get_by_price">Price</option>
                    <option value="get_by_year">Year</option>
                    <option value="get_by_type">Type</option>
                    <option value="get_by_class">Class</option>
            </select>
            <input type="submit" value="submit"/>
        </form>
    <section>
        <h2>Add Vehicle</h2>
        <form action="." method="post" id="add_vehicle_form">
            <input type="hidden" name="action" value="add_vehicle">

            <label>Make:</label>
            <input type="text" name="make" max="20" required><br>
            <label>Model:</label>
            <input type="text" name="model" max="20" required><br>
            <label>Price:</label>
            <input type="text" name="price" max="20" required><br>
            <label>&nbsp;</label>
            <input id="add_type_button" type="submit" class="button blue" value="Add Type"><br>
        </form>
    </section>
    <section>
        <p><a href="index.php">View Vehicles List</a></p>
    </section>
</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?>Zippy Used Autos</p>
</footer>
</body>
</html>