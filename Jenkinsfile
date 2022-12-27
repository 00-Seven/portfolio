pipeline {
    agent any
    stages {
        stage("Build") {
            environment {
                DB_HOST = 'db-mysql-arkarbo-portfolio-do-user-11803527-0.b.db.ondigitalocean.com'
                DB_PORT = 25060
                DB_DATABASE = 'portfolio'
                DB_USERNAME = arkarbo
                DB_PASSWORD = 'AVNS_F9Xa4j2lm8OslGvq_jJ'
            }
            steps {
                sh 'cp .env.example .env'
                sh 'echo DB_HOST=${DB_HOST} >> .env'
                sh 'echo DB_PORT=${DB_PORT} >> .env'
                sh 'echo DB_USERNAME=${DB_USERNAME} >> .env'
                sh 'echo DB_DATABASE=${DB_DATABASE} >> .env'
                sh 'echo DB_PASSWORD=${DB_PASSWORD} >> .env'
                sh 'make restart'
            }
        }
        // stage("Code coverage") {
        //     steps {
        //         sh "vendor/bin/phpunit --coverage-html 'reports/coverage'"
        //     }
        // }
        // stage("Static code analysis larastan") {
        //     steps {
        //         sh "vendor/bin/phpstan analyse --memory-limit=2G"
        //     }
        // }
        // stage("Static code analysis phpcs") {
        //     steps {
        //         sh "vendor/bin/phpcs"
        //     }
        // }
        stage("Docker build") {
            steps {
                sh "make restart"
            }
        }
        // stage("Docker push") {
        //     environment {
        //         DOCKER_USERNAME = credentials("docker-user")
        //         DOCKER_PASSWORD = credentials("docker-password")
        //     }
        //     steps {
        //         sh "docker login --username ${DOCKER_USERNAME} --password ${DOCKER_PASSWORD}"
        //         sh "docker push danielgara/laravel8cd"
        //     }
        // }
        // stage("Deploy to staging") {
        //     steps {
        //         sh "docker run -d --rm -p 80:80 --name laravel8cd danielgara/laravel8cd"
        //     }
        // }
        // stage("Acceptance test curl") {
        //     steps {
        //         sleep 20
        //         sh "chmod +x acceptance_test.sh && ./acceptance_test.sh"
        //     }
        // }
        // stage("Acceptance test codeception") {
        //     steps {
        //         sh "vendor/bin/codecept run"
        //     }
        //     post {
        //         always {
        //             sh "docker stop laravel8cd"
        //         }
        //     }
        // }
    }
}
