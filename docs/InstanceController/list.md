#  LISTAR AS INSTÂNCIAS CRIADAS- BAILEYS

## Introdução
Lista todas as instâncias criadas.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\ConsumirApiBaileys\Baileys;

    $config = [
        'http' => 'http',//http ou https
        'dominio' => '',//seu ip ou dominio
        'porta' => 8000, //porta de instalação do bailey
    ];

    $instance = 'drsystema';
    try {
        $Baileys = new Baileys($config);

        echo "<pre>";
        $list = $Baileys->list();
        print_r($list);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```