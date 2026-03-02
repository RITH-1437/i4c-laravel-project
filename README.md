# 🚀 Laravel DevOps Project

Simple Laravel application with Docker, SQLite, and Jenkins CI/CD pipeline for DevOps practice.

---

## 📋 Prerequisites

Before starting, make sure you have installed:
- **Docker Desktop** (version 20.10 or higher)
- **Git**
- **GitHub Account**

---

## 🛠️ Quick Setup Guide

### Step 1: Clone or Push to GitHub

**Option A: If you already have this project locally**
```bash
cd i4c-laravel-project
git init
git add .
git commit -m "Initial commit"
git remote add origin https://github.com/YOUR_USERNAME/laravel-devops-project.git
git push -u origin main
```

**Option B: If cloning from GitHub**
```bash
git clone https://github.com/YOUR_USERNAME/laravel-devops-project.git
cd laravel-devops-project
```

---

### Step 2: Setup Environment

1. Create `.env` file from example:
```bash
copy .env.example .env
```

2. The default settings are ready to use!

---

### Step 3: Start Docker Containers

Run all services (Laravel App, Jenkins):
```bash
docker-compose up -d
```

Wait 1-2 minutes for all containers to start.

---

### Step 4: Install Laravel Dependencies

```bash
docker-compose exec app composer install
```

Generate application key:
```bash
docker-compose exec app php artisan key:generate
```

Create SQLite database:
```bash
docker-compose exec app touch storage/database/database.sqlite
```

---

### Step 5: Access the Application

Open your browser and visit:

- **Laravel App**: http://localhost:8000
- **Health Check**: http://localhost:8000/health
- **Jenkins**: http://localhost:8080

---

## ⚙️ Jenkins Setup

### Step 1: Get Jenkins Password

```bash
docker exec jenkins cat /var/jenkins_home/secrets/initialAdminPassword
```

Copy the password displayed.

### Step 2: Configure Jenkins

1. Open http://localhost:8080
2. Paste the initial admin password
3. Click "Install suggested plugins"
4. Create admin user (or skip)
5. Click "Save and Finish"

### Step 3: Install Required Plugins

1. Go to **Manage Jenkins** → **Manage Plugins**
2. Click **Available** tab
3. Search and install:
   - Docker Pipeline
   - Git plugin
4. Restart Jenkins

### Step 4: Create Pipeline Job

1. Click **New Item**
2. Enter name: `laravel-devops-pipeline`
3. Select **Pipeline** → Click OK
4. Scroll to **Pipeline** section
5. Select **Pipeline script from SCM**
6. Choose **Git**
7. Enter Repository URL: `https://github.com/YOUR_USERNAME/laravel-devops-project.git`
8. Branch: `*/main` or `*/master`
9. Script Path: `Jenkinsfile`
10. Click **Save**

### Step 5: Run the Pipeline

1. Click **Build Now**
2. Watch the pipeline stages execute
3. Check console output for details

---

## 📱 Testing the Application

### Manual Tests

**Test Homepage:**
```bash
curl http://localhost:8000
```

**Test Health Endpoint:**
```bash
curl http://localhost:8000/health
```

### Run PHPUnit Tests

```bash
docker-compose exec app php vendor/bin/phpunit
```

---

## 🐳 Useful Docker Commands

**View running containers:**
```bash
docker-compose ps
```

**View application logs:**
```bash
docker-compose logs -f app
```

**View Jenkins logs:**
```bash
docker-compose logs -f jenkins
```

**Stop all containers:**
```bash
docker-compose down
```

**Restart containers:**
```bash
docker-compose restart
```

**Remove everything (including volumes):**
```bash
docker-compose down -v
```

---

## 📂 Project Structure

```
i4c-laravel-project/
├── app/                    # Application code
│   ├── Console/
│   ├── Exceptions/
│   └── Http/
├── bootstrap/              # Bootstrap files
├── config/                 # Configuration files
├── docker/                 # Docker configuration
│   └── nginx.conf
├── public/                 # Public files
│   └── index.php
├── resources/              # Views and assets
│   └── views/
│       └── welcome.blade.php
├── routes/                 # Route definitions
│   └── web.php
├── tests/                  # Test files
├── .env.example           # Environment template
├── .gitignore             # Git ignore rules
├── composer.json          # PHP dependencies
├── docker-compose.yml     # Docker services
├── Dockerfile             # Docker image
├── Jenkinsfile           # Jenkins pipeline
├── phpunit.xml           # PHPUnit configuration
└── README.md             # This file
```

---

## 🔄 CI/CD Pipeline Stages

The Jenkinsfile defines these stages:

1. **Checkout** - Get code from GitHub
2. **Environment Setup** - Create .env file
3. **Install Dependencies** - Run composer install
4. **Run Tests** - Execute PHPUnit tests
5. **Build Docker Image** - Create Docker image
6. **Deploy** - Start containers with docker-compose
7. **Health Check** - Verify application is running

---

## 🐛 Troubleshooting

**Port already in use:**
```bash
# Stop the conflicting service or change ports in docker-compose.yml
```

**Permission denied:**
```bash
docker-compose exec app chmod -R 777 storage
```

**Laravel shows blank page:**
```bash
docker-compose exec app php artisan key:generate
docker-compose restart app
```

**Jenkins can't access Docker:**
```bash
# Make sure Docker socket is mounted in docker-compose.yml
# Restart Jenkins container
docker-compose restart jenkins
```

**Composer install fails:**
```bash
# Try with platform requirements ignored
docker-compose exec app composer install --ignore-platform-reqs
```

---

## 📝 Making Changes

1. **Edit code** in your local directory
2. **Commit changes:**
   ```bash
   git add .
   git commit -m "Your changes"
   git push origin main
   ```
3. **Rebuild containers:**
   ```bash
   docker-compose up -d --build
   ```
4. **Run Jenkins pipeline** to test CI/CD

---

## ✅ Success Checklist

- [ ] Docker Desktop is running
- [ ] All containers are up: `docker-compose ps`
- [ ] Laravel app loads at http://localhost:8000
- [ ] Health check returns JSON at http://localhost:8000/health
- [ ] Jenkins accessible at http://localhost:8080
- [ ] Jenkins pipeline created and runs successfully
- [ ] Code pushed to GitHub

---

## 🎯 Next Steps

- Add more routes and controllers
- Write additional tests
- Configure database migrations
- Add email notifications in Jenkins
- Deploy to cloud (AWS, Azure, GCP)
- Add Docker registry for image storage

---

## 📚 Resources

- Laravel Docs: https://laravel.com/docs
- Docker Docs: https://docs.docker.com
- Jenkins Docs: https://www.jenkins.io/doc

---

## 👤 Author

DevOps Assignment - Year 4 S2

---

## 📄 License

MIT License - Free to use for educational purposes.
