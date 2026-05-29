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
| /products | GET | Pendente |
| /products/{id} | GET | Pendente |
| /products | POST | Pendente |
| /products/{id} | PUT | Pendente |
| /products/{id} | DELETE | Pendente |
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

Em desenvolvimento.

---

## Customers

Em desenvolvimento.

---

## Orders

Em desenvolvimento.

---