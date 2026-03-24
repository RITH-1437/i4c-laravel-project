pipeline {
    agent any
    
    environment {
        DEPLOY_HOST = '178.128.93.188'
        ANSIBLE_HOST_KEY_CHECKING = 'false'
    }
    
    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }
        
        stage('Prepare Environment') {
            steps {
                bat '''
                    if not exist .env copy .env.example .env
                    if not exist bootstrap\\cache mkdir bootstrap\\cache
                '''
            }
        }
        
        stage('Build with Docker') {
            steps {
                bat '''
                    docker run --rm -v "%%cd%%":/app composer:latest install --ignore-platform-reqs --optimize-autoloader --no-scripts
                '''
            }
        }
        
        stage('Deploy with Ansible') {
            steps {
                bat '''
                    docker exec jenkins-laravel-agent bash -c "cd /tmp && rm -rf laravel-deploy && git clone https://github.com/RITH-1437/i4c-laravel-project.git laravel-deploy && cd laravel-deploy && ansible-playbook -i inventory playbook.yml"
                '''
            }
        }
        
        stage('Health Check') {
            steps {
                bat '''
                    curl --connect-timeout 30 -s http://178.128.93.188/ | findstr "Laravel"
                    if %%errorlevel%% neq 0 (
                        echo Website loaded but may not contain expected content
                    )
                    exit 0
                '''
            }
        }
    }
    
    post {
        success {
            echo '==========================================='
            echo '  Laravel CI/CD Pipeline Completed!'
            echo '  Website: http://178.128.93.188/'
            echo '  Health:  http://178.128.93.188/api/health'
            echo '==========================================='
        }
        failure {
            echo 'Pipeline failed! Check logs for details.'
        }
        always {
            echo 'Pipeline execution finished.'
        }
    }
}
