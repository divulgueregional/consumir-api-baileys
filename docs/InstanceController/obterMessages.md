#  OBTER_MESSAGES - BAILEYS

## Descrição
Recebe mensagem de um chat específico.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\ConsumirApiBaileys\Baileys;

    $config = [
        'http' => 'http',//http ou https
        'dominio' => '',//seu ip ou dominio
        'porta' => 8000, //porta de instalação do bailey
        'instance' => '' //sua instância
    ];

    $chat_id = "";//id do chat - pegar no obterChats
    try {
        $Baileys = new Baileys($config);

        echo "<pre>";
        $obterMessages = $Baileys->obterMessages($chat_id);
        print_r($obterMessages);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```