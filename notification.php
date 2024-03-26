<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusher Test</title>
    <!-- Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootsrap@5.3.0-alpha/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Chart.js -->
    <!-- <script src="https://cdn.jsdelivr.npm.chart.js"></script> -->
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

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            // alert(JSON.stringify(data));
            swal.fire({
                title: 'Notification Sent',
                text: data.message,
                icon: 'success',
                confirmButtonText: 'OK'
            })
        });
    </script>
</head>

<body>
    <h1>Pusher Test</h1>
    <p>
        Try publishing an event to channel <code>my-channel</code>
        with event name <code>my-event</code>.
    </p>
</body>