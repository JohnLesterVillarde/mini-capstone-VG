<?php
require_once '../logic/connection.php';
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
}

if ($_SESSION['role'] == 1) {
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="../public/css/style.css">

        <!-- Bootsrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootsrap@5.3.0-alpha/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Chart.js -->
        <script src="https://cdn.jsdelivr.npm.chart.js"></script>
        <!-- Pusher -->
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
        <!-- Sweet Alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('7319cd748838c92b0aee', {
                cluster: 'ap1'
            });

            var channel = pusher.subscribe('signUp');
            channel.bind('newUser', function(data) {
                // alert(JSON.stringify(data));
                swal.fire({
                    title: 'New User Signed-Up',
                    text: data.email,
                    icon: 'success',
                    confirmButtonText: 'OK'
                })
            });
        </script>


    </head>

    <body>

        <header>
            <a href="../logic/logout.php" class="logout">
                <h4>LOGOUT</h4>
            </a>
        </header>

        <h1>Welcome <?php echo $_SESSION['email'] ?></h1>

        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Fullname</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $query = 'SELECT * FROM users';
                $results = mysqli_query($connection, $query);
                $counter = 1;
                $total_records = mysqli_num_rows($results);
                $total_pages = ceil($total_records / 10);
                $page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? (int)$_GET['page'] : 1;
                $start = ($page - 1) * 10;
                $results = mysqli_query($connection, "SELECT * FROM users LIMIT $start, 10");


                while ($row = mysqli_fetch_assoc($results)) {
                ?>
                    <tr>
                        <td><?php echo $counter++ ?></td>
                        <td><?php echo $row['fullname'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><b><?php echo str_repeat('*', strlen($row['password'])) ?></b></td>
                        <td id="update"><a href="edit_user.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                        <td id="delete"><a href="../logic/deleteUser.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>

        </table>
        <div class="pagination_container">
            <div class="pagination">
                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                    <a <?php if ($i == $page) echo 'class="active"'; ?> href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                <?php endfor; ?>
            </div>
        </div>

    </body>

    </html>


<?php

} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Dashboard</title>
    </head>

    <body>

        <h3>You have no permission on this page</h3>

    </body>

    </html>
<?php
}
?>