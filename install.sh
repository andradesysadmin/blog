#!/bin/bash

# verifica se o script foi executado como root
if [ "$(id -u)" -ne 0 ]; then

    echo "O script deve ser executado com privilegios de super usuario!"
    exit 1;
    
fi

#Nome da aplicação
APP_NAME=blog



# Verifica e instala o git
git --version
if [ $? -eq o ]; then
    echo "O Git Compose está instalado!"
else
    #Instalando Git
    sudo chmod +x git_install.sh
    sudo ./git_install.sh
fi
git clone https://github.com/andradesysadmin/$APP_NAME
cd $APP_NAME/



#Verificando e instalando Docker Compose
docker-compose --version
if [ $? -eq o ]; then
    echo "Docker Compose está instalado!"
else
    #Instalando Docker Compose
    sudo curl -SL https://github.com/docker/compose/releases/download/v2.30.3/docker-compose-linux-x86_64 -o /usr/local/bin/docker-compose
fi
docker-compose up -d --build



#Instalando Docker
docker --version
if [ $? -eq o ]; then
    echo "Docker está instalado!"
else
    sudo chmod +x docker_install.sh
    sudo ./docker_install.sh
fi
docker rm -f $APP_NAME || true
docker rmi -f || true
docker build -t $APP_NAME .
docker run -d -p 8000:8000 --name $APP_NAME $APP_NAME
