#!/bin/bash
# Quick start script for Laravel DevOps Project

echo "🚀 Starting Laravel DevOps Project..."
echo ""

# Check if Docker is running
if ! docker info > /dev/null 2>&1; then
    echo "❌ Docker is not running. Please start Docker Desktop first."
    exit 1
fi

echo "✅ Docker is running"
echo ""

# Start containers
echo "📦 Starting containers..."
docker-compose up -d

echo "⏳ Waiting for containers to be ready (30 seconds)..."
sleep 30

# Check if .env exists
if [ ! -f .env ]; then
    echo "📝 Creating .env file..."
    cp .env.example .env
fi

# Install dependencies
echo "📚 Installing Composer dependencies..."
docker-compose exec -T app composer install --ignore-platform-reqs

# Generate key
echo "🔑 Generating application key..."
docker-compose exec -T app php artisan key:generate

# Create SQLite database
echo "💾 Creating SQLite database..."
docker-compose exec -T app touch storage/database/database.sqlite

echo ""
echo "✅ Setup complete!"
echo ""
echo "🌐 Access the application:"
echo "   - Laravel App: http://localhost:8000"
echo "   - Health Check: http://localhost:8000/health"
echo "   - Jenkins: http://localhost:8080"
echo ""
echo "🔐 Get Jenkins password:"
echo "   docker exec jenkins cat /var/jenkins_home/secrets/initialAdminPassword"
echo ""
