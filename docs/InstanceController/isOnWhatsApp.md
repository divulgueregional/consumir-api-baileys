#  isOnWhatsApp - BAILEYS

## Descrição
Verifica se o número está cadastrado no whatsapp.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\ConsumirApiBaileys\Baileys;

    $config = [
        'http' => 'http',//http ou https
        'dominio' => '',//seu ip ou dominio
        'porta' => 8000, //porta de instalação do bailey
        'instance' => '' //sua instância
    ];
    
    $phone = ''; //número do telefone
    try {
        $Baileys = new Baileys($config);

        echo "<pre>";
        $isOnWhatsApp = $Baileys->isOnWhatsApp($phone);
        print_r($isOnWhatsApp);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```