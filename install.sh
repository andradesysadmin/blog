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
if [ $? -eq 0 ]; then
    echo "O Git está instalado!"
else

    #Instalando Git caso não esteja instalado 
    # Armazena o gerenciador de pacotes da distro
    PACKAGE_MANAGER=""
    
    # Comando de instalação
    INSTALL_CMD=""
    
    # Configurações iniciais para prosseguir com a instalação
    CONFIGS=""
    
    function install() {
        eval $CONFIGS
        eval $INSTALL_CMD
    }
    
    # Verifica se o git já está instalado
    if command -v git --version > /dev/null; then
        echo "Git já está instalado"
        exit 0
    fi
    
    if command -v apt >/dev/null; then
        PACKAGE_MANAGER="apt"
        INSTALL_CMD="sudo apt-get install -y git"
        CONFIGS="sudo apt update"
    
    elif command -v dnf >/dev/null; then
        PACKAGE_MANAGER="dnf"
        INSTALL_CMD="sudo dnf install -y git"
        CONFIGS="sudo dnf install -y dnf-plugins-core"
    
    elif command -v yum >/dev/null; then
        PACKAGE_MANAGER="yum"
        INSTALL_CMD="sudo yum install -y git"
        CONFIGS="sudo yum install -y yum-utils"
    
    elif command -v pacman >/dev/null; then
        PACKAGE_MANAGER="pacman"
        INSTALL_CMD="sudo pacman -S --noconfirm git"
        CONFIGS="sudo pacman -Sy"
    
    elif command -v zypper >/dev/null; then
        PACKAGE_MANAGER="zypper"
        INSTALL_CMD="sudo zypper install -y git"
        CONFIGS="sudo zypper refresh"
    
    else
        PACKAGE_MANAGER="Gerenciador de pacotes desconhecido!"
        echo $PACKAGE_MANAGER
        exit 1
    fi
    
    echo "Instalando o Git com o gerenciador de pacotes $PACKAGE_MANAGER"
    install
    
fi
git clone https://github.com/andradesysadmin/$APP_NAME
cd $APP_NAME/



#Verificando e instalando Docker Compose
docker-compose --version
if [ $? -eq 0 ]; then
    echo "Docker Compose está instalado!"
else
    #Instalando Docker Compose
    sudo curl -SL https://github.com/docker/compose/releases/download/v2.30.3/docker-compose-linux-x86_64 -o /usr/local/bin/docker-compose
fi
docker-compose up -d --build



#Instalando Docker
docker --version
if [ $? -eq 0 ]; then
    echo "Docker está instalado!"
else
    sudo chmod +x docker_install.sh
    sudo ./docker_install.sh
fi
docker rm -f $APP_NAME || true
docker rmi -f || true
docker build -t $APP_NAME .
docker run -d -p 8000:8000 --name $APP_NAME $APP_NAME
