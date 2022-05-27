#  OBTER_CONTACTS - BAILEYS

## Descrição
Lista os contatos.

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
        $obterContacts = $Baileys->obterContacts();
        print_r($obterContacts);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```