# laravel-ecommerce-api

[ EM DESENVOLVIMENTO ]

API REST de e-commerce construída com Laravel 13 e PostgreSQL, dockerizada e pronta para integração com qualquer frontend (React, Vue, mobile).

Stack: **PHP 8.4** · **Laravel 13** · **PostgreSQL 16** · **Redis 7** · **Nginx 1.27**

---

## Base

Este projeto foi inicializado a partir de um template Docker profissional para Laravel 13, desenvolvido com auxílio de IA — especificamente o Claude (Anthropic).

🔗 [ivelcorvo/TEMPLATE_LARARAVEL13_POSTGRESQL_DOCKER_2026](https://github.com/ivelcorvo/TEMPLATE_LARARAVEL13_POSTGRESQL_DOCKER_2026)

---

## Pré-requisitos

- Docker Engine 24+
- Docker Compose v2+
- Git

---

## Instalação

**1. Clonar o repositório**
```bash
git clone https://github.com/ivelcorvo/laravel-ecommerce-api.git
```

**2. Entrar na pasta**
```bash
cd laravel-ecommerce-api
```

**3. Copiar o .env**
```bash
cp .env.example .env
```

**4. Buildar a imagem**
```bash
docker compose build
```

**5. Subir os containers**
```bash
docker compose up -d
```

**6. Instalar dependências**
```bash
docker compose exec app composer install
```

**7. Gerar a key**
```bash
docker compose exec app php artisan key:generate
```

**8. Rodar migrations e seeders**
```bash
docker compose exec app php artisan migrate --seed
```

---

## Arquitetura de pastas
src/
├── app/
│   ├── Helpers/          # ApiResponse — padrão de resposta da API
│   ├── Http/
│   │   ├── Controllers/Api/
│   │   ├── Requests/     # Validações por recurso
│   │   └── Resources/    # Formatação do JSON de saída
│   ├── Models/           # Category, Product, Customer, Order, OrderItem
│   └── Services/         # Regras de negócio (OrderService)
├── database/
│   ├── migrations/
│   └── seeders/
└── routes/
└── api.php

---
