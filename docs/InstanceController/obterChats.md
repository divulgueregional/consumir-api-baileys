#  OBTER_CHATS - BAILEYS

## Descrição
Lista os chats.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\ConsumirApiBaileys\Baileys;

    $instance = ''; //nome da instância
    try {
        $Baileys = new Baileys($config);

        echo "<pre>";
        $obterChats = $Baileys->obterChats($instance);
        print_r($obterChats);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```