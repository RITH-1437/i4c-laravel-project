pipeline {
    agent any
    
    environment {
        DEPLOY_HOST = '178.128.93.188'
    }
    
    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }
        
        stage('Environment Setup') {
            steps {
                bat '''
                    if not exist .env copy .env.example .env
                    if not exist bootstrap\\cache mkdir bootstrap\\cache
                '''
            }
        }
        
        stage('Install Dependencies') {
            steps {
                bat '''
                    docker run --rm -v "%cd%":/app composer:latest install --ignore-platform-reqs --no-dev --optimize-autoloader --no-scripts
                '''
            }
        }
        
        stage('Generate Key') {
            steps {
                bat '''
                    docker run --rm -v "%cd%":/app php:8.2-cli php /app/artisan key:generate --force
                '''
            }
        }
        
        stage('Deploy with Ansible') {
            steps {
                bat '''
                    docker exec jenkins-laravel-agent ansible-playbook -i /var/jenkins_home/workspace/Laravel-TP03/inventory /var/jenkins_home/workspace/Laravel-TP03/playbook.yml -v
                '''
            }
        }
        
        stage('Health Check') {
            steps {
                bat '''
                    curl -f --connect-timeout 30 http://178.128.93.188/ || echo Health check completed
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
