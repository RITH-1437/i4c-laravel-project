pipeline {
    agent any
    
    environment {
        APP_NAME = 'laravel-app'
        DOCKER_IMAGE = 'laravel-devops-app'
    }
    
    stages {
        stage('Checkout') {
            steps {
                echo 'Checking out code from repository...'
                checkout scm
            }
        }
        
        stage('Environment Setup') {
            steps {
                echo 'Setting up environment...'
                sh '''
                    if [ ! -f .env ]; then
                        cp .env.example .env
                    fi
                '''
            }
        }
        
        stage('Install Dependencies') {
            steps {
                echo 'Installing Composer dependencies...'
                sh '''
                    docker run --rm -v $(pwd):/app composer:latest install --ignore-platform-reqs --no-dev
                '''
            }
        }
        
        stage('Run Tests') {
            steps {
                echo 'Running PHPUnit tests...'
                sh '''
                    docker run --rm -v $(pwd):/app -w /app php:8.1-cli php vendor/bin/phpunit || true
                '''
            }
        }
        
        stage('Build Docker Image') {
            steps {
                echo 'Building Docker image...'
                sh '''
                    docker build -t ${DOCKER_IMAGE}:${BUILD_NUMBER} .
                    docker tag ${DOCKER_IMAGE}:${BUILD_NUMBER} ${DOCKER_IMAGE}:latest
                '''
            }
        }
        
        stage('Deploy') {
            steps {
                echo 'Deploying application...'
                sh '''
                    docker-compose down || true
                    docker-compose up -d
                '''
            }
        }
        
        stage('Health Check') {
            steps {
                echo 'Performing health check...'
                sh '''
                    sleep 10
                    curl -f http://localhost:8000/health || exit 1
                '''
            }
        }
    }
    
    post {
        success {
            echo '✅ Pipeline completed successfully!'
        }
        failure {
            echo '❌ Pipeline failed!'
        }
        always {
            echo 'Cleaning up...'
            sh 'docker system prune -f || true'
        }
    }
}
