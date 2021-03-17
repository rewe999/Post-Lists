<!DOCTYPE html>
<html>
    <head>
        <title>Pusher Test</title>
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        <script>

            Pusher.logToConsole = true;

            var pusher = new Pusher('980247946d18470d3616', {
                cluster: 'eu'
            });

            let tab = [];

            var channel = pusher.subscribe('my-channel');
            channel.bind('form-submitted', (data) => {
                // alert(JSON.stringify(data.text));
                tab.push(data.text);
                var er = document.querySelector(".pusher");
                er.innerHTML = tab;
            });

        </script>
    </head>
    <body>
    <h1>Pusher Test</h1>
    <p class="pusher">
        Try publishing an event to channel <code>my-channel</code>
        with event name <code>my-event</code>.
    </p>
    </body>
</html>
