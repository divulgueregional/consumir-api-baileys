#  OBTER_CHATS - BAILEYS

## Descrição
Lista os chats.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\ConsumirApiBaileys\Baileys;

    $config = [
        'http' => 'http',//http ou https
        'dominio' => '',//seu ip ou dominio
        'porta' => 8000, //porta de instalação do bailey
        'instance' => '' //sua instância
    ];

    try {
        $Baileys = new Baileys($config);

        echo "<pre>";
        $obterChats = $Baileys->obterChats();
        print_r($obterChats);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```