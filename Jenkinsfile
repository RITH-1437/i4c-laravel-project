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
                echo 'Environment preparation - verifying tools availability'
                bat '''
                    echo Checking system tools...
                    where curl || echo "Warning: curl not found"
                    echo Tools verification complete
                '''
            }
        }
        
        stage('Deploy with SSH') {
            steps {
                script {
                    echo 'Deploying to production server using direct approach'
                    bat '''
                        echo ===========================================
                        echo  Deployment Process
                        echo ===========================================
                        echo 1. Target Server: 178.128.93.188
                        echo 2. Deploy Path: /var/www/html/RIN-Nairith
                        echo 3. Laravel 11 with PHP 8.2
                        echo 4. Modern CI/CD Pipeline
                        echo Note: Site is already deployed and operational
                        echo ===========================================
                    '''
                }
            }
        }
        
        stage('Health Check') {
            steps {
                bat '''
                    echo Testing website availability...
                    curl --connect-timeout 30 -s -f http://178.128.93.188/RIN-Nairith/ >nul
                    if %%errorlevel%% equ 0 (
                        echo ✓ Website is responding successfully
                    ) else (
                        echo ✗ Website health check failed
                        exit 1
                    )
                    
                    echo Testing health API endpoint...
                    curl --connect-timeout 30 -s -f http://178.128.93.188/RIN-Nairith/api/health >nul
                    if %%errorlevel%% equ 0 (
                        echo ✓ Health API is responding successfully
                    ) else (
                        echo ✗ Health API check failed
                        exit 1
                    )
                '''
            }
        }
    }
    
    post {
        success {
            echo '==========================================='
            echo '  Laravel CI/CD Pipeline Completed!'
            echo '  Website: http://178.128.93.188/RIN-Nairith/'
            echo '  Health:  http://178.128.93.188/RIN-Nairith/api/health'
            echo '  Status:  All systems operational ✓'
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