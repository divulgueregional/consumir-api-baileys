# ENVIAR TEXTO OU MENSAGEM - BAILEYS

## Introdução
Envia um texto simples para um determinado número.

```php
    $number = "55+DDD+Number";//ddd acima de 30 sem o 9
    $filter = [
        "to" => "{$number}@s.whatsapp.net",
        "text": "oi"
    ];
```