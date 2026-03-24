<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIN-Nairith - Laravel DevOps</title>
    <link rel="icon" type="image/svg+xml" href="https://laravel.com/img/logomark.min.svg">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #0a0e27 0%, #1a1f3a 100%);
            color: #e4e4e7;
            min-height: 100vh;
            padding: 40px 20px;
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
        }
        
        header {
            text-align: center;
            margin-bottom: 50px;
        }
        
        h1 {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #00d4ff 0%, #0099ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .subtitle {
            color: #94a3b8;
            font-size: 16px;
            margin-bottom: 20px;
        }
        
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.3);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            color: #22c55e;
        }
        
        .status-dot {
            width: 8px;
            height: 8px;
            background: #22c55e;
            border-radius: 50%;
            animation: pulse 2s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }
        
        .card {
            background: rgba(30, 41, 59, 0.5);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(51, 65, 85, 0.8);
            border-radius: 12px;
            padding: 25px;
            transition: all 0.3s ease;
        }
        
        .card:hover {
            border-color: rgba(0, 153, 255, 0.5);
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 153, 255, 0.1);
        }
        
        .card-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #f1f5f9;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .icon {
            font-size: 20px;
        }
        
        .counter-display {
            font-size: 64px;
            font-weight: 700;
            text-align: center;
            margin: 30px 0;
            background: linear-gradient(135deg, #00d4ff 0%, #0099ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .button-group {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }
        
        button {
            flex: 1;
            min-width: 120px;
            background: linear-gradient(135deg, #0099ff 0%, #0066cc 100%);
            color: #fff;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 153, 255, 0.3);
        }
        
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 153, 255, 0.4);
        }
        
        button:active {
            transform: translateY(0);
        }
        
        button.secondary {
            background: linear-gradient(135deg, #334155 0%, #1e293b 100%);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }
        
        button.secondary:hover {
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
        }
        
        button.success {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
        }
        
        button.success:hover {
            box-shadow: 0 6px 20px rgba(34, 197, 94, 0.4);
        }
        
        input[type="text"] {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(51, 65, 85, 0.8);
            color: #e4e4e7;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 14px;
            flex: 1;
            min-width: 200px;
            transition: all 0.3s ease;
        }
        
        input[type="text"]:focus {
            outline: none;
            border-color: #0099ff;
            box-shadow: 0 0 0 3px rgba(0, 153, 255, 0.1);
        }
        
        input[type="text"]::placeholder {
            color: #64748b;
        }
        
        .input-group {
            display: flex;
            gap: 12px;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }
        
        .message-box {
            background: rgba(15, 23, 42, 0.6);
            border-left: 3px solid #0099ff;
            padding: 16px 20px;
            border-radius: 8px;
            margin: 20px 0;
            min-height: 60px;
            display: flex;
            align-items: center;
        }
        
        .greeting-result {
            margin-top: 15px;
            font-size: 18px;
            color: #00d4ff;
        }
        
        .tech-stack {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        
        .tech-badge {
            background: rgba(0, 153, 255, 0.1);
            border: 1px solid rgba(0, 153, 255, 0.3);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 500;
            color: #00d4ff;
            transition: all 0.3s ease;
        }
        
        .tech-badge:hover {
            background: rgba(0, 153, 255, 0.2);
            transform: translateY(-2px);
        }
        
        footer {
            margin-top: 60px;
            padding-top: 30px;
            border-top: 1px solid rgba(51, 65, 85, 0.5);
            text-align: center;
            color: #64748b;
            font-size: 14px;
        }
        
        .success-text {
            color: #22c55e;
        }
        
        .error-text {
            color: #ef4444;
        }
        
        @media (max-width: 768px) {
            body {
                padding: 20px 15px;
            }
            
            h1 {
                font-size: 32px;
            }
            
            .counter-display {
                font-size: 48px;
            }
            
            .grid {
                grid-template-columns: 1fr;
            }
            
            button {
                min-width: 100px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>RIN-Nairith Laravel DevOps</h1>
            <p class="subtitle">Modern CI/CD Pipeline with Jenkins, Docker & Ansible</p>
            <div class="status-badge">
                <span class="status-dot"></span>
                <span id="status-text">System Online</span>
            </div>
        </header>
        
        <div class="grid">
            <div class="card">
                <div class="card-title">
                    <span class="icon">📊</span>
                    Counter
                </div>
                <div class="counter-display" id="counter">0</div>
                <div class="button-group">
                    <button onclick="increment()">+ Increment</button>
                    <button class="secondary" onclick="decrement()">- Decrement</button>
                    <button class="success" onclick="reset()">Reset</button>
                </div>
            </div>
            
            <div class="card">
                <div class="card-title">
                    <span class="icon">👋</span>
                    Greeting
                </div>
                <div class="input-group">
                    <input type="text" id="name-input" placeholder="Enter your name">
                    <button onclick="greet()">Greet</button>
                </div>
                <div class="greeting-result" id="greeting-result"></div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-title">
                <span class="icon">💬</span>
                Messages
            </div>
            <div class="message-box" id="message">Welcome to the dashboard</div>
            <button onclick="changeMessage()">Random Message</button>
        </div>
        
        <div class="card">
            <div class="card-title">
                <span class="icon">⚙️</span>
                System Info
            </div>
            <div class="tech-stack">
                <span class="tech-badge">🐘 PHP {{ phpversion() }}</span>
                <span class="tech-badge">⚡ Laravel 11</span>
                <span class="tech-badge">🐳 Docker</span>
                <span class="tech-badge">⚙️ Jenkins</span>
                <span class="tech-badge">🔧 Ansible</span>
            </div>
            <div class="button-group">
                <button onclick="checkHealth()">Check Health</button>
                <button class="secondary" onclick="showInfo()">About</button>
            </div>
        </div>
        
        <footer>
            <p>Server Time: <span id="server-time"></span></p>
            <p style="margin-top: 10px;">Built with Laravel, Docker, Jenkins & Ansible</p>
        </footer>
    </div>
    
    <script>
        let count = 0;
        
        const messages = [
            "System ready for deployment",
            "Build successful",
            "All tests passed",
            "Code deployed successfully",
            "Pipeline running smoothly",
            "Infrastructure healthy",
            "Monitoring active",
            "Ready for production"
        ];
        
        const greetings = ["Hello", "Hi", "Hey", "Welcome", "Greetings"];
        
        function updateTime() {
            const now = new Date();
            document.getElementById('server-time').textContent = now.toLocaleString();
        }
        
        function increment() {
            count++;
            document.getElementById('counter').textContent = count;
            document.getElementById('message').textContent = 'Counter incremented to ' + count;
        }
        
        function decrement() {
            if (count > 0) count--;
            document.getElementById('counter').textContent = count;
            document.getElementById('message').textContent = count === 0 ? "Counter at zero" : "Counter decremented to " + count;
        }
        
        function reset() {
            count = 0;
            document.getElementById('counter').textContent = count;
            document.getElementById('message').textContent = "Counter has been reset";
        }
        
        function changeMessage() {
            document.getElementById('message').textContent = messages[Math.floor(Math.random() * messages.length)];
        }
        
        function greet() {
            const name = document.getElementById('name-input').value.trim();
            if (name) {
                const greeting = greetings[Math.floor(Math.random() * greetings.length)];
                document.getElementById('greeting-result').innerHTML = '<span class="success-text">' + greeting + ', ' + name + '</span>';
                document.getElementById('message').textContent = 'Welcome ' + name;
            } else {
                document.getElementById('greeting-result').innerHTML = '<span class="error-text">Please enter your name</span>';
            }
        }
        
        function checkHealth() {
            document.getElementById('message').textContent = "Checking system health...";
            fetch('api/health')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('message').innerHTML = '<span class="success-text">Health Check: ' + data.status + ' - ' + data.message + '</span>';
                })
                .catch(error => {
                    document.getElementById('message').innerHTML = '<span class="error-text">Health check failed</span>';
                });
        }
        
        function showInfo() {
            document.getElementById('message').textContent = "Laravel 11 + PHP 8.2 + Docker + Jenkins + Ansible";
        }
        
        document.getElementById('name-input').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') greet();
        });
        
        updateTime();
        setInterval(updateTime, 1000);
    </script>
</body>
</html>
