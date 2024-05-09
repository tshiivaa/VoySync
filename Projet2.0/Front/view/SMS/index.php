<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <fieldset>
            <legend>Send SMS</legend>

            <form action="sendSMS.php" method="POST">
                <div>
                    <input type="text" name="phoneNumber" required>
                    <span>Phone Number</span>
                </div>
                <div>
                    <input type="text" name="message" required>
                    <span>Message</span>
                </div>
                
                <button class="btnSend">Send</button>
                </form>
        </fieldset>
    </body>
</html>
