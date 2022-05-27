#  INSTANCE_KEY - BAILEYS

## Descrição
Pegar dados de uma intância. Pode usar para descobrir se uma instância existe e se ja foi lido o QRCode.

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
        $instance_key = $Baileys->instance_key();
        print_r($instance_key);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```