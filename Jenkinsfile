pipeline {
    agent any

    environment {
        REPOSITORY_NAME = 'https://github.com/AkbarIlham20st/bicopiWebsite.git'
        BRANCH = 'main'
    }

    stages {
        stage('Build') {
            steps {
                script {
                    // Build the project
                    echo 'Building...'
                    git branch: "$BRANCH", url: "$REPOSITORY_NAME"
                    sh 'cp .env.example .env'
                    sh 'sudo docker compose down'
                    sh 'sudo docker compose up -d --build'
                    sh 'sudo docker compose exec -T php composer install'
                    sh 'sudo docker compose exec -T php npm install'
                    sh 'sudo docker compose exec -T php php artisan key:generate'
                    sh 'sudo docker compose exec -T php php artisan migrate:fresh --seed'
                    sh 'sudo docker compose exec -T php npm run build'
                }
            }
        }
        stage('Test') {
            steps {
                script {
                    // Run tests
                    echo 'Testing...'
                    sh 'sudo docker compose exec -T php php artisan test'
                }
            }
        }
        stage('Deploy') {
            steps {
                script {
                    // Deploy the project
                    echo 'Deploying...'
                }
            }
        }
    }

    post {
        success {
            echo "✅ Deployment successful. Visit: http://<ip-server>"
        }
        failure {
            echo "❌ Deployment failed! Check logs for details."
            sh 'sudo docker compose logs'
        }
    }
}
