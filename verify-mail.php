<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .otp-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        input {
            width: 80%;
            padding: 10px;
            font-size: 1.2rem;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        p {
            font-size: 14px;
            color: #777;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <form class="theme-form" action="amazon-ses/sendemail.php" method="post">
        <div class="otp-container">
            <h2>E-mail Verification</h2>
            <p>Enter Your e-mail address</p>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            <button type="submit">Send OTP</button>
        </div>

    </form>
</body>

</html>