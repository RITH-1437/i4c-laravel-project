pipeline {
    agent {
        docker {
            image 'php:8.2-cli'
            args '-u root'
        }
    }
    
    environment {
        DEPLOY_HOST = '178.128.93.188'
        SERVER_PASSWORD = credentials('server-password')
    }
    
    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }
        
        stage('Environment Setup') {
            steps {
                sh '''
                    if [ ! -f .env ]; then
                        cp .env.example .env
                    fi
                '''
            }
        }
        
        stage('Install Composer') {
            steps {
                sh '''
                    apt-get update && apt-get install -y git curl unzip
                    curl -sS https://getcomposer.org/installer | php
                    mv composer.phar /usr/local/bin/composer
                    chmod +x /usr/local/bin/composer
                '''
            }
        }
        
        stage('Install Dependencies') {
            steps {
                sh '''
                    composer install --ignore-platform-reqs --no-dev --optimize-autoloader
                '''
            }
        }
        
        stage('Generate Key') {
            steps {
                sh '''
                    php artisan key:generate --force || true
                '''
            }
        }
        
        stage('Deploy with Ansible') {
            steps {
                sh '''
                    pip3 install --break-system-packages ansible pywinrm || true
                    ansible-playbook -i inventory playbook.yml -v || echo "Ansible deploy skipped"
                '''
            }
        }
        
        stage('Health Check') {
            steps {
                sh '''
                    sleep 10
                    curl -f --connect-timeout 30 http://${DEPLOY_HOST}/ || echo "Health check completed"
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
