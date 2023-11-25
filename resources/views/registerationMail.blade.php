<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data['title'] }}</title>
    <style>
        /* Add your custom styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }
        h1 {
            color: #333;
            font-size: 24px;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .loginButton {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #886CC0;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
        }
        p {
            margin-top: 20px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $data['title'] }}</h1>
        <table>
            <tr>
                <th>Name:</th>
                <td>{{ $data['name'] }}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{ $data['email'] }}</td>
            </tr>
            <tr>
                <th>Password:</th>
                <td>{{ $data['password'] }}</td>
            </tr>
        </table>
        <a href="{{ $data['url'] }}" class="loginButton">Click here to log in to your account</a>
        <p>Thank you for using our services!</p>
    </div>
</body>
</html>
