<!DOCTYPE html>
<html>
<head>
    <title>Chat Client</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div id="chat">
        <div id="chat-messages"></div>
        <form id="chat-form">
            <input type="text" id="message" placeholder="Tapez votre message ici..." />
            <button type="submit">Send</button>
        </form>
    </div>

    <script src="js/main.js"></script>
    <script>
        const form = document.getElementById('chat-form');
        const messageInput = document.getElementById('message');
        const chatMessages = document.getElementById('chat-messages');

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            fetch('chat_server.php', {
                method: 'POST',
                body: new URLSearchParams('message=' + messageInput.value)
            })
            .then(response => response.text())
            .then(data => {
                chatMessages.innerHTML += `<div>${data}</div>`;
                messageInput.value = '';
            });
        });
    </script>
</body>
</html>
