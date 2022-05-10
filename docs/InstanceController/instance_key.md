#  INSTANCE_KEY - BAILEYS

## Descrição
Pegar dados de uma intância. Pode usar para descobrir se uma instância existe e se ja foi lido o QRCode.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\ConsumirApiBaileys\Baileys;

    $instance = ''; //nome da instância
    try {
        $Baileys = new Baileys($config);

        echo "<pre>";
        $instance_key = $Baileys->instance_key($instance);
        print_r($instance_key);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```