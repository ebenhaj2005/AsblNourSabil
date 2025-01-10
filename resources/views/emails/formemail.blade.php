<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nouveau Formulaire de contact</title>
   
</head>
<body>
    <div class="container">
        <h1>Nouveau Formulaire de contact</h1>
        <p><strong>Nom:</strong> {{ $name }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>

        <p><strong>Message:</strong> {{ $message}}</p>
       

        <div class="footer">
            <p>Asbl Nour Sabil <?php echo date('Y'); ?></p>
        </div>
    </div>
</body>
</html>
 <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            color: #8fc93c;
            margin-bottom: 15px;
        }

        p {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }

        strong {
            color: #333;
        }

        .message {
            background-color: #f9f9f9;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-style: italic;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #8fc93c;
        }
    </style>