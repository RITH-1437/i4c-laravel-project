<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel DevOps - Interactive Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        html, body {
            height: 100%;
            width: 100%;
            overflow: hidden;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }
        
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
        }
        
        .bg-animation span {
            position: absolute;
            display: block;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.1);
            animation: float 25s linear infinite;
            bottom: -150px;
            border-radius: 50%;
        }
        
        .bg-animation span:nth-child(1) { left: 25%; width: 80px; height: 80px; animation-delay: 0s; }
        .bg-animation span:nth-child(2) { left: 10%; width: 20px; height: 20px; animation-delay: 2s; animation-duration: 12s; }
        .bg-animation span:nth-child(3) { left: 70%; width: 20px; height: 20px; animation-delay: 4s; }
        .bg-animation span:nth-child(4) { left: 40%; width: 60px; height: 60px; animation-delay: 0s; animation-duration: 18s; }
        .bg-animation span:nth-child(5) { left: 65%; width: 20px; height: 20px; animation-delay: 0s; }
        .bg-animation span:nth-child(6) { left: 75%; width: 110px; height: 110px; animation-delay: 3s; }
        .bg-animation span:nth-child(7) { left: 35%; width: 150px; height: 150px; animation-delay: 7s; }
        .bg-animation span:nth-child(8) { left: 50%; width: 25px; height: 25px; animation-delay: 15s; animation-duration: 45s; }
        .bg-animation span:nth-child(9) { left: 20%; width: 15px; height: 15px; animation-delay: 2s; animation-duration: 35s; }
        .bg-animation span:nth-child(10) { left: 85%; width: 150px; height: 150px; animation-delay: 0s; animation-duration: 11s; }
        
        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
                border-radius: 0;
            }
            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
                border-radius: 50%;
            }
        }
        
        .container {
            position: relative;
            z-index: 1;
            text-align: center;
            padding: 2vh 3vw;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
            max-width: 900px;
            width: 90vw;
            max-height: 95vh;
            overflow-y: auto;
            overflow-x: hidden;
        }
        
        .container::-webkit-scrollbar {
            width: 0;
            display: none;
        }
        
        .container {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        
        h1 {
            font-size: 2em;
            margin-bottom: 0.5vh;
            font-weight: 700;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .subtitle {
            font-size: 0.95em;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 1.5vh;
        }
        
        .counter-box {
            background: rgba(102, 126, 234, 0.2);
            border-radius: 12px;
            padding: 1.5vh 2vw;
            margin: 1vh 0;
            border: 1px solid rgba(102, 126, 234, 0.3);
        }
        
        .counter-label {
            font-size: 0.75em;
            color: rgba(255, 255, 255, 0.6);
            margin-bottom: 0.5vh;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .counter-value {
            font-size: 2.5em;
            font-weight: 700;
            color: #667eea;
            text-shadow: 0 0 30px rgba(102, 126, 234, 0.5);
        }
        
        .button-group {
            display: flex;
            gap: 10px;
            justify-content: center;
            flex-wrap: wrap;
            margin: 1.5vh 0;
        }
        
        .btn {
            padding: 10px 20px;
            font-size: 0.9em;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.6);
        }
        
        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
        }
        
        .btn-success {
            background: linear-gradient(135deg, #11998e, #38ef7d);
            color: white;
            box-shadow: 0 10px 30px rgba(56, 239, 125, 0.4);
        }
        
        .btn-success:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(56, 239, 125, 0.6);
        }
        
        .tech-stack {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin: 1.5vh 0;
            flex-wrap: wrap;
        }
        
        .tech-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 6px 12px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50px;
            font-size: 0.75em;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        .tech-badge:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.05);
        }
        
        .message-box {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            padding: 1.5vh 1vw;
            margin: 1vh 0;
            min-height: 6vh;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px dashed rgba(255, 255, 255, 0.2);
        }
        
        .message-text {
            font-size: 0.95em;
            color: rgba(255, 255, 255, 0.9);
        }
        
        .input-group {
            display: flex;
            gap: 8px;
            justify-content: center;
            margin: 1vh 0;
            flex-wrap: wrap;
        }
        
        .input-group input {
            padding: 10px 16px;
            font-size: 0.9em;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            outline: none;
            width: 180px;
            transition: all 0.3s ease;
        }
        
        .input-group input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }
        
        .input-group input:focus {
            border-color: #667eea;
            background: rgba(255, 255, 255, 0.15);
        }
        
        .footer {
            margin-top: 1.5vh;
            padding-top: 1.5vh;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.75em;
            color: rgba(255, 255, 255, 0.5);
        }
        
        .status-indicator {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            background: rgba(56, 239, 125, 0.2);
            border-radius: 50px;
            font-size: 0.75em;
            margin-bottom: 1vh;
        }
        
        .status-dot {
            width: 8px;
            height: 8px;
            background: #38ef7d;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        .greeting-input {
            margin: 1vh 0;
        }
        
        .greeting-result {
            font-size: 1.1em;
            margin-top: 1vh;
            min-height: 3vh;
        }
        
        @media (max-width: 768px) {
            h1 {
                font-size: 1.5em;
            }
            
            .subtitle {
                font-size: 0.85em;
            }
            
            .counter-value {
                font-size: 2em;
            }
            
            .btn {
                padding: 8px 16px;
                font-size: 0.85em;
            }
            
            .tech-badge {
                font-size: 0.7em;
                padding: 5px 10px;
            }
            
            .container {
                width: 95vw;
                padding: 2vh 4vw;
            }
            
            .input-group {
                flex-direction: column;
                align-items: center;
            }
            
            .input-group input {
                width: 100%;
                max-width: 250px;
            }
        }
        
        @media (min-width: 1920px) {
            .container {
                max-width: 1100px;
            }
        }
    </style>
</head>
<body>
    <div class="bg-animation">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    
    <div class="container">
        <h1>🚀 Laravel DevOps Dashboard</h1>
        <p class="subtitle">Welcome to the modern Laravel CI/CD pipeline</p>
        
        <div class="status-indicator">
            <span class="status-dot"></span>
            <span id="status-text">System Online</span>
        </div>
        
        <div class="counter-box">
            <div class="counter-label">Visitor Count</div>
            <div class="counter-value" id="counter">0</div>
        </div>
        
        <div class="greeting-input">
            <div class="input-group">
                <input type="text" id="name-input" placeholder="Enter your name..." maxlength="20">
                <button class="btn btn-primary" onclick="greetUser()">
                    <span>👋</span> Greet
                </button>
            </div>
            <div class="greeting-result" id="greeting-result"></div>
        </div>
        
        <div class="button-group">
            <button class="btn btn-primary" onclick="incrementCounter()">
                <span>➕</span> Increment
            </button>
            <button class="btn btn-secondary" onclick="decrementCounter()">
                <span>➖</span> Decrement
            </button>
            <button class="btn btn-success" onclick="resetCounter()">
                <span>🔄</span> Reset
            </button>
        </div>
        
        <div class="message-box">
            <span class="message-text" id="message">Click a button or enter your name above!</span>
        </div>
        
        <button class="btn btn-secondary" onclick="changeMessage()" style="margin-top: 15px;">
            <span>💬</span> New Message
        </button>
        
        <div class="tech-stack">
            <span class="tech-badge">🐘 PHP {{ phpversion() }}</span>
            <span class="tech-badge">⚡ Laravel 10</span>
            <span class="tech-badge">🐳 Docker</span>
            <span class="tech-badge">⚙️ Jenkins</span>
            <span class="tech-badge">🔧 Ansible</span>
        </div>
        
        <div class="button-group">
            <button class="btn btn-primary" onclick="checkHealth()">
                <span>💚</span> Health Check
            </button>
            <button class="btn btn-secondary" onclick="showInfo()">
                <span>ℹ️</span> About
            </button>
        </div>
        
        <div class="footer">
            <p>Built with ❤️ using Laravel, Docker, Jenkins & Ansible</p>
            <p style="margin-top: 5px;">Server Time: <span id="server-time"></span></p>
        </div>
    </div>
    
    <script>
        let count = 0;
        
        const messages = [
            "🚀 Ready for deployment!",
            "✨ Great job, developer!",
            "🎉 Keep building amazing things!",
            "💪 DevOps is awesome!",
            "🔧 Code, Build, Deploy, Repeat!",
            "☁️ Cloud-native applications!",
            "🎯 Continuous Integration & Delivery!",
            "⚡ Lightning fast deployments!"
        ];
        
        const greetings = [
            "Hello", "Hi", "Hey", "Greetings", "Welcome", "Salutations"
        ];
        
        function updateTime() {
            const now = new Date();
            document.getElementById('server-time').textContent = now.toLocaleString();
        }
        
        function incrementCounter() {
            count++;
            document.getElementById('counter').textContent = count;
            document.getElementById('message').textContent = messages[Math.floor(Math.random() * messages.length)];
            document.getElementById('status-text').textContent = 'Counter Updated!';
            setTimeout(() => {
                document.getElementById('status-text').textContent = 'System Online';
            }, 1500);
        }
        
        function decrementCounter() {
            count--;
            if (count < 0) count = 0;
            document.getElementById('counter').textContent = count;
            document.getElementById('message').textContent = count === 0 ? "Counter reset to zero!" : "Decremented!";
        }
        
        function resetCounter() {
            count = 0;
            document.getElementById('counter').textContent = count;
            document.getElementById('message').textContent = "Counter has been reset!";
        }
        
        function changeMessage() {
            document.getElementById('message').textContent = messages[Math.floor(Math.random() * messages.length)];
        }
        
        function greetUser() {
            const name = document.getElementById('name-input').value.trim();
            if (name) {
                const greeting = greetings[Math.floor(Math.random() * greetings.length)];
                document.getElementById('greeting-result').innerHTML = 
                    `<span style="color: #667eea;">${greeting}, <strong>${name}</strong>! 👋</span>`;
                document.getElementById('message').textContent = `Welcome to our DevOps dashboard, ${name}!`;
            } else {
                document.getElementById('greeting-result').innerHTML = 
                    '<span style="color: #f093fb;">Please enter your name first! ✍️</span>';
            }
        }
        
        function checkHealth() {
            document.getElementById('message').textContent = "Checking system health...";
            fetch('/api/health')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('message').textContent = 
                        `✅ Health Check: ${data.status} - ${data.message}`;
                })
                .catch(error => {
                    document.getElementById('message').textContent = "❌ Health check failed!";
                });
        }
        
        function showInfo() {
            document.getElementById('message').textContent = 
                "📚 Laravel + Docker + Jenkins + Ansible = Modern DevOps Pipeline!";
        }
        
        document.getElementById('name-input').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                greetUser();
            }
        });
        
        updateTime();
        setInterval(updateTime, 1000);
    </script>
</body>
</html>
