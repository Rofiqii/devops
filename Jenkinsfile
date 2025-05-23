pipeline {
    agent any

    environment {
        PROD_HOST = '103.109.209.254'
    }

    stages {
        stage('Check Branch') {
            when {
                expression { env.BRANCH_NAME == 'master' }
            }
            steps {
                echo 'Branch saat ini adalah master, lanjutkan pipeline...'
            }
        }

        stage('Build') {
            when {
                expression { env.BRANCH_NAME == 'master' }
            }
            steps {
                echo 'Building project...'
                sh './gradlew build'
                sh 'mvn package'
                sh 'npm install'
            }
        }

        stage('Test') {
            when {
                expression { env.BRANCH_NAME == 'master' }
            }
            steps {
                echo 'Running tests...'
                sh 'npm test'
                sh './gradlew test'
            }
        }

                stage('Deploy') {
            when {
                expression { env.BRANCH_NAME == 'master' }
            }
            steps {
                echo 'Deploying to production...'
                sh 'scp target/app.jar ubuntu@$PROD_HOST:/home/ubuntu/app.jar'
                sh 'ssh ubuntu@$PROD_HOST "docker-compose up -d"'
            }
        }

        stage('Deploy to Production') {
            when {
                expression { env.BRANCH_NAME == 'master' }
            }
            steps {
                script {
                    docker.image('agung3wi/alpine-rsync:1.1').inside('-u root') {
                        sshagent(credentials: ['ssh-prod']) {
                            sh 'mkdir -p ~/.ssh'
                            sh 'ssh-keyscan -H "$PROD_HOST" > ~/.ssh/known_hosts'
                            sh '''
                                rsync -rav --delete ./laravel/ \
                                ubuntu@$PROD_HOST:/home/wafygray/devops-laravel/prod.kelasdevops.xyz/ \
                                --exclude=.env --exclude=storage --exclude=.git
                            '''
                        }
                    }
                }
            }
        }
    }
}
