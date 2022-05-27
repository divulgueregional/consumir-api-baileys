#  ADMIN GROUPS - BAILEYS

## Descrição
Lista todos os grupos em que você está e admin

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
        $adminGroups = $Baileys->adminGroups();
        print_r($adminGroups);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```