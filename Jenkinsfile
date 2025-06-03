pipeline {
    agent any
    
    environment {
        REPOSITORY_NAME = 'https://github.com/AkbarIlham20st/bicopiWebsite.git'
        BRANCH = 'main'
        COMPOSE_PROJECT_NAME = 'bicopi-website'
    }
    
    stages {
        stage('Preparation') {
            steps {
                echo '🔧 Preparing environment...'
                
                // Test docker access
                sh 'docker --version'
                sh 'docker compose --version'
                
                // Clone/update repository
                git branch: "${BRANCH}", url: "${REPOSITORY_NAME}"
                
                echo '✅ Environment ready'
            }
        }
        
        stage('Build') {
            steps {
                echo '🔨 Building application...'
                
                sh '''
                    # Stop existing containers
                    docker compose down --remove-orphans || true
                    
                    # Prepare environment
                    cp .env.example .env || true
                    
                    # Build and start containers
                    docker compose up -d --build --force-recreate
                    
                    # Wait for containers
                    sleep 15
                    
                    # Check container status
                    docker compose ps
                '''
            }
        }
        
        stage('Setup Application') {
            steps {
                echo '⚙️ Setting up Laravel application...'
                
                sh '''
                    # Install dependencies
                    docker compose exec -T php composer install --no-dev --optimize-autoloader
                    docker compose exec -T php npm install --production
                    
                    # Laravel setup
                    docker compose exec -T php php artisan key:generate --force
                    docker compose exec -T php php artisan config:clear
                    docker compose exec -T php php artisan cache:clear
                    
                    # Database setup
                    docker compose exec -T php php artisan migrate:fresh --seed --force
                    
                    # Build assets
                    docker compose exec -T php npm run build
                    
                    # Set permissions
                    docker compose exec -T php chown -R www-data:www-data storage bootstrap/cache
                '''
            }
        }
        
        stage('Test') {
            steps {
                echo '🧪 Running tests...'
                
                sh '''
                    # Run tests
                    docker compose exec -T php php artisan test
                    
                    # Basic health check
                    sleep 5
                    if docker compose exec -T php php artisan --version >/dev/null 2>&1; then
                        echo "✅ Application is responding"
                    else
                        echo "❌ Application health check failed"
                        exit 1
                    fi
                '''
            }
        }
        
        stage('Deploy') {
            steps {
                echo '🚀 Final deployment steps...'
                
                sh '''
                    # Optimize application
                    docker compose exec -T php php artisan optimize
                    docker compose exec -T php php artisan config:cache
                    docker compose exec -T php php artisan route:cache
                    docker compose exec -T php php artisan view:cache
                    
                    # Restart services
                    docker compose restart
                    sleep 10
                    
                    echo "✅ Deployment completed"
                '''
            }
        }
    }
    
    post {
        always {
            sh '''
                echo "📊 Final Container Status:"
                docker compose ps || true
                docker compose logs --tail=20 || true
            '''
        }
        
        success {
            sh '''
                SERVER_IP=$(hostname -I | awk '{print $1}' 2>/dev/null || echo "localhost")
                echo "🎉 ===== DEPLOYMENT SUCCESSFUL ====="
                echo "🌐 Application URL: http://${SERVER_IP}"
                echo "📊 All services are running normally"
                echo "======================================"
            '''
        }
        
        failure {
            sh '''
                echo "💥 ===== DEPLOYMENT FAILED ====="
                echo "📋 Diagnostic Information:"
                docker compose ps -a || true
                echo "--- Recent Logs ---"
                docker compose logs --tail=30 || true
                echo "--- Container Stats ---"
                docker stats --no-stream || true
                echo "================================"
            '''
        }
    }
}
