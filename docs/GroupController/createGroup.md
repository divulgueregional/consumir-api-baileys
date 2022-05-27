#  CREATE GROUP - BAILEYS

## Descrição
Cria um grupo com pelo menos 1 participantes

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\ConsumirApiBaileys\Baileys;
    
    $config = [
        'http' => 'http',//http ou https
        'dominio' => '',//seu ip ou dominio
        'porta' => 8000, //porta de instalação do bailey
        'instance' => '' //sua instância
    ];
    
    $filters["group_data"]= [
        "group_name" => "Grupo 1",
        "participants" => array(
            "55+DDD+Number",//ddd acima de 30 sem o 9
            "55+DDD+Number",//ddd acima de 30 sem o 9
        ),
    ];

    try {
        $Baileys = new Baileys($config);

        echo "<pre>";
        $createGroup = $Baileys->createGroup();
        print_r($createGroup);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```