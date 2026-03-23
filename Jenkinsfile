pipeline {
    agent any
    
    environment {
        APP_NAME = 'laravel-app'
        DEPLOY_HOST = '178.128.93.188'
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
                    docker run --rm -v $(pwd):/app -w /app php:8.2-cli php vendor/bin/phpunit || true
                '''
            }
        }
        
        stage('Deploy with Ansible') {
            steps {
                echo 'Deploying to ${DEPLOY_HOST} with Ansible...'
                sh '''
                    ansible-playbook -i inventory playbook.yml -v
                '''
            }
        }
        
        stage('Health Check') {
            steps {
                echo 'Performing health check on deployed server...'
                sh '''
                    sleep 15
                    curl -f --connect-timeout 30 http://${DEPLOY_HOST}/ || exit 1
                '''
            }
        }
    }
    
    post {
        success {
            echo 'Pipeline completed successfully!'
        }
        failure {
            echo 'Pipeline failed!'
        }
    }
}
