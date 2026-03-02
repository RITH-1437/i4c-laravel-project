@echo off
REM Quick start script for Laravel DevOps Project (Windows)

echo 🚀 Starting Laravel DevOps Project...
echo.

REM Check if Docker is running
docker info >nul 2>&1
if errorlevel 1 (
    echo ❌ Docker is not running. Please start Docker Desktop first.
    pause
    exit /b 1
)

echo ✅ Docker is running
echo.

REM Start containers
echo 📦 Starting containers...
docker-compose up -d

echo ⏳ Waiting for containers to be ready (30 seconds)...
timeout /t 30 /nobreak >nul

REM Check if .env exists
if not exist .env (
    echo 📝 Creating .env file...
    copy .env.example .env
)

REM Install dependencies
echo 📚 Installing Composer dependencies...
docker-compose exec -T app composer install --ignore-platform-reqs

REM Generate key
echo 🔑 Generating application key...
docker-compose exec -T app php artisan key:generate

echo.
echo ✅ Setup complete!
echo.
echo 🌐 Access the application:
echo    - Laravel App: http://localhost:8000
echo    - Health Check: http://localhost:8000/health
echo    - Jenkins: http://localhost:8080
echo.
echo 🔐 Get Jenkins password:
echo    docker exec jenkins cat /var/jenkins_home/secrets/initialAdminPassword
echo.
pause
