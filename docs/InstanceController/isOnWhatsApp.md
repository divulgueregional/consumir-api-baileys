#  isOnWhatsApp - BAILEYS

## Descrição
Verifica se o número está cadastrado no whatsapp.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\ConsumirApiBaileys\Baileys;

    $instance = ''; //nome da instância
    $phone = ''; //número do telefone
    try {
        $Baileys = new Baileys($config);

        echo "<pre>";
        $isOnWhatsApp = $Baileys->isOnWhatsApp($instance, $phone);
        print_r($isOnWhatsApp);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```