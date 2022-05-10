#  OBTER_MESSAGES - BAILEYS

## Descrição
Recebe mensagem de um chat específico.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\ConsumirApiBaileys\Baileys;

    $instance = ''; //nome da instância
    $chat_id = "";//id do chat - pegar no obterChats
    try {
        $Baileys = new Baileys($config);

        echo "<pre>";
        $obterMessages = $Baileys->obterMessages($instance, $chat_id);
        print_r($obterMessages);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```