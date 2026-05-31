# Documentação da API — Laravel Ecommerce

API REST | e-commerce construída com Laravel 13, PostgreSQL e Redis.

---

## Status dos endpoints

| Endpoint | Método | Status |
|---|---|---|
| /categories | GET | ✅ Concluído |
| /categories/{id} | GET | ✅ Concluído |
| /categories | POST | ✅ Concluído |
| /categories/{id} | PUT | ✅ Concluído |
| /categories/{id} | DELETE | ✅ Concluído |
| /products | GET | ✅ Concluído |
| /products/{id} | GET | ✅ Concluído |
| /products | POST | ✅ Concluído |
| /products/{id} | PUT | ✅ Concluído |
| /products/{id} | DELETE | ✅ Concluído |
| /customers | GET | Pendente |
| /customers/{id} | GET | Pendente |
| /customers | POST | Pendente |
| /customers/{id} | PUT | Pendente |
| /customers/{id} | DELETE | Pendente |
| /orders | GET | Pendente |
| /orders/{id} | GET | Pendente |
| /orders | POST | Pendente |
| /orders/{id}/status | PUT | Pendente |
| /orders/{id} | DELETE | Pendente |

---

## Formato padrão das respostas

**Sucesso:**
```json
{
  "success": true,
  "message": "Operação realizada com sucesso.",
  "data": {}
}
```

**Erro:**
```json
{
  "success": false,
  "message": "Mensagem do erro.",
  "error": {}
}
```

---

## Categories

### Arquitetura
- **Migration:** `database/migrations/xxxx_create_categories_table.php`
- **Model:** `app/Models/Category.php`
- **Requests:** `app/Http/Requests/Category/`
- **Resource:** `app/Http/Resources/Category/CategoryResource.php`
- **Controller:** `app/Http/Controllers/Api/CategoryController.php`
- **Seeder:** `database/seeders/CategorySeeder.php`

### Campos

| Campo | Tipo | Obrigatório | Descrição |
|---|---|---|---|
| name | string(100) | Sim | Nome único da categoria |
| slug | string(120) | Não | Gerado automaticamente a partir do name |
| description | text | Não | Descrição da categoria |

### Endpoints

#### GET /api/categories
Lista todas as categorias.

**Resposta:**
```json
{
  "success": true,
  "message": "Categorias listadas com sucesso.",
  "data": [
    {
      "id": 1,
      "name": "Electronics",
      "slug": "electronics",
      "description": "Electronic products and gadgets",
      "created_at": "29/05/2026 18:00",
      "updated_at": "29/05/2026 18:00"
    }
  ]
}
```

#### GET /api/categories/{id}
Retorna uma categoria específica.

#### POST /api/categories
Cria uma nova categoria.

**Body:**
```json
{
  "name": "Electronics",
  "description": "Electronic products and gadgets"
}
```

#### PUT /api/categories/{id}
Atualiza uma categoria. Todos os campos são opcionais.

#### DELETE /api/categories/{id}
Remove uma categoria.

---

## Products

### Arquitetura
- **Migration:** `database/migrations/xxxx_create_products_table.php`
- **Model:** `app/Models/Product.php`
- **Requests:** `app/Http/Requests/Product/`
- **Resource:** `app/Http/Resources/Product/ProductResource.php`
- **Controller:** `app/Http/Controllers/Api/ProductController.php`
- **Seeder:** `database/seeders/ProductSeeder.php`

### Campos

| Campo | Tipo | Obrigatório | Descrição |
|---|---|---|---|
| category_id | foreignId | Não | Referência à categoria |
| name | string(150) | Sim | Nome único do produto |
| slug | string(170) | Não | Gerado automaticamente a partir do name |
| description | text | Não | Descrição do produto |
| price | decimal(10,2) | Sim | Preço do produto |
| stock | integer | Não | Quantidade em estoque (padrão 0) |
| active | boolean | Não | Se o produto está ativo (padrão true) |

### Endpoints

#### GET /api/products
Lista todos os produtos com sua categoria.

**Resposta:**
```json
{
  "success": true,
  "message": "Produtos listados com sucesso.",
  "data": [
    {
      "id": 1,
      "category": {
        "id": 1,
        "name": "Electronics",
        "slug": "electronics"
      },
      "name": "Smart TV 55\"",
      "slug": "smart-tv-55",
      "description": "Smart TV 4K com HDR e Wi-Fi integrado",
      "price": "2499.99",
      "stock": 15,
      "active": true,
      "created_at": "30/05/2026 18:00",
      "updated_at": "30/05/2026 18:00"
    }
  ]
}
```

#### GET /api/products/{id}
Retorna um produto específico com sua categoria.

#### POST /api/products
Cria um novo produto.

**Body:**
```json
{
  "category_id": 1,
  "name": "Monitor Ultrawide 34\"",
  "description": "Monitor curvo 144Hz com entrada HDMI e DisplayPort",
  "price": 1899.99,
  "stock": 10,
  "active": true
}
```

#### PUT /api/products/{id}
Atualiza um produto. Todos os campos são opcionais.

#### DELETE /api/products/{id}
Remove um produto.

---

## Customers

Em desenvolvimento.

---

## Orders

Em desenvolvimento.

---