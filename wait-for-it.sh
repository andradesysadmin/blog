#!/bin/bash
# wait-for-it.sh

# O script aguarda até que a porta do banco de dados esteja aberta
HOST=$1
PORT=$2
shift 2
while ! nc -z $HOST $PORT; do
  echo "Aguardando banco de dados em $HOST:$PORT..."
  sleep 1
done
echo "$HOST:$PORT está disponível."
exec "$@"
