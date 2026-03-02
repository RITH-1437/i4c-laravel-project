# Laravel DevOps Project - Quick Start

## For Windows Users

### 1. Start Everything
```powershell
# Start all Docker containers
docker-compose up -d

# Wait 30 seconds
Start-Sleep -Seconds 30

# Install dependencies
docker-compose exec app composer install

# Generate app key
docker-compose exec app php artisan key:generate

# Create SQLite database
docker-compose exec app touch storage/database/database.sqlite
```

### 2. Open in Browser
- Laravel App: http://localhost:8000
- Jenkins: http://localhost:8080

### 3. Get Jenkins Password
```powershell
docker exec jenkins cat /var/jenkins_home/secrets/initialAdminPassword
```

### 4. Push to GitHub
```powershell
git init
git add .
git commit -m "Initial commit"
git remote add origin https://github.com/YOUR_USERNAME/REPO_NAME.git
git branch -M main
git push -u origin main
```

## Stop Everything
```powershell
docker-compose down
```

## Restart Everything
```powershell
docker-compose restart
```

---
See README.md for full documentation.
