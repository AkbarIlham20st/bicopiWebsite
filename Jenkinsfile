pipeline {
    agent any
    
    environment {
        REPOSITORY_NAME = 'https://github.com/AkbarIlham20st/bicopiWebsite.git'
        BRANCH = 'main'
        COMPOSE_PROJECT_NAME = 'bicopi-website'
        APP_ENV = 'production'
    }
    
    stages {
        stage('Cleanup & Preparation') {
            steps {
                script {
                    echo '🧹 Cleaning workspace and preparing environment...'
                    
                    // Clean workspace manually
                    sh '''
                        echo "Cleaning workspace..."
                        rm -rf .git .env* node_modules vendor storage/logs/* storage/framework/cache/* storage/framework/sessions/* storage/framework/views/* 2>/dev/null || true
                        find . -name "*.log" -delete 2>/dev/null || true
                        ls -la
                    '''
                    
                    // Clone repository
                    git branch: "${BRANCH}", url: "${REPOSITORY_NAME}"
                    
                    // Ensure docker group permissions (run once)
                    sh '''
                        if ! groups $USER | grep -q docker; then
                            echo "⚠️  Current user not in docker group. Checking if we can run docker..."
                            if ! docker --version >/dev/null 2>&1; then
                                echo "❌ Docker not accessible. Please add user to docker group:"
                                echo "   sudo usermod -aG docker \$USER"
                                echo "   Then restart Jenkins service"
                                exit 1
                            fi
                        else
                            echo "✅ User is in docker group"
                        fi
                    '''
                }
            }
        }
        
        stage('Build') {
            steps {
                script {
                    echo '🔨 Building application...'
                    
                    // Stop existing containers
                    sh '''
                        if docker compose ps -q 2>/dev/null | grep -q .; then
                            echo "Stopping existing containers..."
                            docker compose down --remove-orphans
                        fi
                    '''
                    
                    // Prepare environment
                    sh '''
                        # Copy environment file
                        cp .env.example .env
                        
                        # Set production environment
                        sed -i 's/APP_ENV=local/APP_ENV=production/' .env
                        sed -i 's/APP_DEBUG=true/APP_DEBUG=false/' .env
                    '''
                    
                    // Build and start containers
                    sh '''
                        echo "Building and starting containers..."
                        docker compose up -d --build --force-recreate
                        
                        # Wait for containers to be ready
                        echo "Waiting for containers to be ready..."
                        sleep 10
                        
                        # Check if containers are running
                        docker compose ps
                    '''
                }
            }
        }
        
        stage('Install Dependencies') {
            steps {
                script {
                    echo '📦 Installing dependencies...'
                    
                    // Install PHP dependencies
                    sh '''
                        echo "Installing PHP dependencies..."
                        docker compose exec -T php composer install --optimize-autoloader --no-dev
                    '''
                    
                    // Install Node dependencies
                    sh '''
                        echo "Installing Node.js dependencies..."
                        docker compose exec -T php npm ci --only=production
                    '''
                }
            }
        }
        
        stage('Application Setup') {
            steps {
                script {
                    echo '⚙️ Setting up application...'
                    
                    sh '''
                        # Generate application key
                        echo "Generating application key..."
                        docker compose exec -T php php artisan key:generate --force
                        
                        # Clear and cache configurations
                        echo "Optimizing application..."
                        docker compose exec -T php php artisan config:clear
                        docker compose exec -T php php artisan cache:clear
                        docker compose exec -T php php artisan route:cache
                        docker compose exec -T php php artisan config:cache
                        docker compose exec -T php php artisan view:cache
                        
                        # Run database migrations
                        echo "Running database migrations..."
                        docker compose exec -T php php artisan migrate --force
                        
                        # Seed database (only if needed)
                        docker compose exec -T php php artisan db:seed --force
                        
                        # Build frontend assets
                        echo "Building frontend assets..."
                        docker compose exec -T php npm run build
                        
                        # Set proper permissions
                        docker compose exec -T php chown -R www-data:www-data /var/www/html/storage
                        docker compose exec -T php chown -R www-data:www-data /var/www/html/bootstrap/cache
                    '''
                }
            }
        }
        
        stage('Test') {
            steps {
                script {
                    echo '🧪 Running tests...'
                    
                    sh '''
                        # Run PHPUnit tests
                        echo "Running application tests..."
                        docker compose exec -T php php artisan test --parallel
                        
                        # Health check
                        echo "Performing health check..."
                        sleep 5
                        
                        # Check if application is responding
                        if docker compose exec -T php php artisan tinker --execute="echo 'Application is ready';" >/dev/null 2>&1; then
                            echo "✅ Application health check passed"
                        else
                            echo "❌ Application health check failed"
                            exit 1
                        fi
                    '''
                }
            }
        }
        
        stage('Deploy') {
            steps {
                script {
                    echo '🚀 Deploying application...'
                    
                    sh '''
                        # Final optimizations
                        docker compose exec -T php php artisan optimize
                        
                        # Restart services for good measure
                        docker compose restart
                        
                        # Wait for services to be ready
                        sleep 10
                        
                        echo "✅ Application deployed successfully!"
                    '''
                }
            }
        }
    }
    
    post {
        always {
            script {
                // Always show container status
                sh '''
                    echo "📊 Container Status:"
                    docker compose ps
                '''
            }
        }
        
        success {
            script {
                // Get server IP for access URL
                sh '''
                    SERVER_IP=$(hostname -I | awk '{print $1}')
                    echo "✅ Deployment successful!"
                    echo "🌐 Application URL: http://${SERVER_IP}"
                    echo "📊 Container Status: All services running"
                '''
            }
        }
        
        failure {
            script {
                echo "❌ Deployment failed! Collecting diagnostic information..."
                
                sh '''
                    echo "=== Container Logs ==="
                    docker compose logs --tail=50
                    
                    echo "=== Container Status ==="
                    docker compose ps -a
                    
                    echo "=== System Resources ==="
                    df -h
                    free -h
                    
                    echo "=== Docker System Info ==="
                    docker system df
                '''
                
                // Optional: Clean up failed deployment
                sh '''
                    echo "Cleaning up failed deployment..."
                    docker compose down --remove-orphans
                '''
            }
        }
        
        cleanup {
            script {
                echo "🧹 Cleaning up workspace..."
                
                // Manual cleanup instead of deleteDir()
                sh '''
                    echo "Cleaning temporary files..."
                    rm -rf node_modules/.cache 2>/dev/null || true
                    rm -rf vendor/bin/.phpunit.result.cache 2>/dev/null || true
                    find storage/logs -name "*.log" -mtime +7 -delete 2>/dev/null || true
                    echo "✅ Cleanup completed"
                '''
            }
        }
    }
}
