<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel DevOps Project</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }
        .container {
            text-align: center;
            padding: 40px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }
        h1 {
            font-size: 3em;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        p {
            font-size: 1.2em;
            margin-bottom: 30px;
        }
        .badge {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 25px;
            font-weight: bold;
        }
        .links {
            margin-top: 30px;
        }
        .links a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            padding: 10px 25px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
            transition: all 0.3s;
        }
        .links a:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚀 Laravel DevOps Project</h1>
        <p>Welcome to your Laravel application running in Docker!</p>
        
        <div>
            <span class="badge">✅ Laravel</span>
            <span class="badge">🐳 Docker</span>
            <span class="badge">⚙️ Jenkins</span>
        </div>
        
        <div class="links">
            <a href="/health">Health Check</a>
        </div>
        
        <p style="margin-top: 40px; font-size: 0.9em; opacity: 0.8;">
            Built with ❤️ for DevOps Assignment
        </p>
    </div>
</body>
</html>
