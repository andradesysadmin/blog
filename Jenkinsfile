pipeline {
    agent any

    // Variáveis de ambiente utilizadas na aplicação
    environment {
        NAME = 'blog'
        URL = 'https://github.com/andradesysadmin/blog'
    }

    stages {
        stage('Checkout') {
            steps {
                echo 'Baixando o código...'
                git branch: 'main', url: "${env.URL}"
            }
        }

        stage('Build') {  
            steps {
                echo 'Buildando a aplicação...'
                sh "docker build -t ${env.NAME} ."
            }
        }

        stage('Deploy') {  
            steps {
                echo 'Subindo a aplicação...'
                sh "docker-compose up -d --build"
                sh "docker run -d -p 8000:8000 --name ${env.NAME} ${env.NAME}"
            }
        }
    }

    post {
        always {
            echo 'Pipeline finalizada.'
        }
        success {
            echo 'Deploy realizado com sucesso!'
        }
        failure {
            echo 'O deploy falhou. Verifique os logs.'
        }
    }
}
