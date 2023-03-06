<?php
?>
<table>
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Order Date</th>
            <th>Customer Name</th>
            <th>Total Price</th>
            <th>Details Link</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include('../config.php');
        mysqli_set_charset($mysqli, 'utf8');
        $query = "SELECT
                    orders.order_id,
                    orders.order_date,
                    customers.customer_name,
                    SUM(order_items.quantity * order_items.unit_price) AS total_price,
                    CONCAT('<a href=\"details.php?order_id=', orders.order_id, '\">View Details</a>') AS details_link
                FROM
                    orders
                INNER JOIN
                    customers ON orders.customer_id = customers.customer_id
                INNER JOIN
                    order_items ON orders.order_id = order_items.order_id
                GROUP BY
                    orders.order_id";
        $result = mysqli_query($mysqli, $query);
        while($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>'.$row['order_id'].'</td>';
            echo '<td>'.$row['order_date'].'</td>';
            echo '<td>'.$row['customer_name'].'</td>';
            echo '<td>'.$row['total_price'].'</td>';
            echo '<td>'.$row['details_link'].'</td>';
            echo '</tr>';
        }
        mysqli_close($mysqli);
        ?>
    </tbody>
</table>