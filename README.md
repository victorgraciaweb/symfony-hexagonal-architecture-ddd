# PHP 8.1 + Mysql 8.0 + Symfony 5.4 + Docker

How to run?
--

1. Create Docker image

   `make build`

2. Start Docker container

   `make start`

3. Access Docker container

   `make ssh-be`

4. Up server by port 8000 in background

   `symfony server:start --port=8000 -d`

5. Open in browser

   http://127.0.0.1:1000/