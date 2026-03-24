<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIN-Nairith - Laravel DevOps</title>
    <link rel="icon" type="image/svg+xml" href="https://laravel.com/img/logomark.min.svg">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Arial, sans-serif;
            background: #000;
            color: #fff;
            padding: 20px;
            line-height: 1.6;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        
        header {
            border-bottom: 1px solid #333;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        
        h1 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 8px;
        }
        
        .subtitle {
            color: #888;
            font-size: 14px;
        }
        
        .status {
            display: inline-block;
            background: #1a1a1a;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 13px;
            margin-top: 12px;
        }
        
        .status-dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            background: #0f0;
            border-radius: 50%;
            margin-right: 6px;
        }
        
        section {
            background: #0a0a0a;
            border: 1px solid #1a1a1a;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        
        h2 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 15px;
            border-bottom: 1px solid #1a1a1a;
            padding-bottom: 8px;
        }
        
        .counter-display {
            font-size: 48px;
            font-weight: 700;
            color: #fff;
            text-align: center;
            margin: 20px 0;
        }
        
        .button-group {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        
        button {
            background: #fff;
            color: #000;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: background 0.2s;
        }
        
        button:hover {
            background: #e0e0e0;
        }
        
        button:active {
            background: #d0d0d0;
        }
        
        input[type="text"] {
            background: #1a1a1a;
            border: 1px solid #333;
            color: #fff;
            padding: 10px 15px;
            border-radius: 4px;
            font-size: 14px;
            width: 100%;
            max-width: 300px;
        }
        
        input[type="text"]:focus {
            outline: none;
            border-color: #555;
        }
        
        .input-group {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
            flex-wrap: wrap;
            align-items: center;
        }
        
        .message-box {
            background: #1a1a1a;
            padding: 15px;
            border-radius: 4px;
            margin: 15px 0;
            min-height: 50px;
            display: flex;
            align-items: center;
            border-left: 3px solid #333;
        }
        
        .greeting-result {
            margin-top: 10px;
            font-size: 16px;
        }
        
        .tech-stack {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        
        .tech-badge {
            background: #1a1a1a;
            border: 1px solid #333;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 13px;
        }
        
        footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #1a1a1a;
            color: #666;
            font-size: 13px;
            text-align: center;
        }
        
        .success {
            color: #0f0;
        }
        
        .error {
            color: #f00;
        }
        
        @media (max-width: 768px) {
            body {
                padding: 15px;
            }
            
            h1 {
                font-size: 20px;
            }
            
            .counter-display {
                font-size: 36px;
            }
            
            button {
                flex: 1;
                min-width: calc(50% - 5px);
            }
            
            input[type="text"] {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>RIN-Nairith Laravel DevOps</h1>
            <p class="subtitle">CI/CD Pipeline with Jenkins, Docker & Ansible</p>
            <div class="status">
                <span class="status-dot"></span>
                <span id="status-text">System Online</span>
            </div>
        </header>
        
        <section>
            <h2>Counter</h2>
            <div class="counter-display" id="counter">0</div>
            <div class="button-group">
                <button onclick="increment()">+ Increment</button>
                <button onclick="decrement()">- Decrement</button>
                <button onclick="reset()">Reset</button>
            </div>
        </section>
        
        <section>
            <h2>Greeting</h2>
            <div class="input-group">
                <input type="text" id="name-input" placeholder="Enter your name">
                <button onclick="greet()">Greet</button>
            </div>
            <div class="greeting-result" id="greeting-result"></div>
        </section>
        
        <section>
            <h2>Messages</h2>
            <div class="message-box" id="message">Welcome to the dashboard</div>
            <button onclick="changeMessage()">Random Message</button>
        </section>
        
        <section>
            <h2>System Info</h2>
            <div class="tech-stack">
                <span class="tech-badge">PHP {{ phpversion() }}</span>
                <span class="tech-badge">Laravel 11</span>
                <span class="tech-badge">Docker</span>
                <span class="tech-badge">Jenkins</span>
                <span class="tech-badge">Ansible</span>
            </div>
            <div style="margin-top: 20px;">
                <button onclick="checkHealth()">Check Health</button>
                <button onclick="showInfo()">About</button>
            </div>
        </section>
        
        <footer>
            <p>Server Time: <span id="server-time"></span></p>
            <p style="margin-top: 8px;">Built with Laravel, Docker, Jenkins & Ansible</p>
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
                document.getElementById('greeting-result').innerHTML = greeting + ', ' + name;
                document.getElementById('message').textContent = 'Welcome ' + name;
            } else {
                document.getElementById('greeting-result').innerHTML = '<span class="error">Please enter your name</span>';
            }
        }
        
        function checkHealth() {
            document.getElementById('message').textContent = "Checking system health...";
            fetch('api/health')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('message').innerHTML = '<span class="success">Health Check: ' + data.status + ' - ' + data.message + '</span>';
                })
                .catch(error => {
                    document.getElementById('message').innerHTML = '<span class="error">Health check failed</span>';
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
