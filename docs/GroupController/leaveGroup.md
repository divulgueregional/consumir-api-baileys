#  LEAVE GROUP - BAILEYS

## Descrição
Deixar o grupo

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\ConsumirApiBaileys\Baileys;
    
    $config = [
        'http' => 'http',//http ou https
        'dominio' => '',//seu ip ou dominio
        'porta' => 8000, //porta de instalação do bailey
        'instance' => '' //sua instância
    ];

    $filters = [
        "group_id" => "",
        "allowOnlyAdmins" => true,
    ];
    
    try {
        $Baileys = new Baileys($config);

        echo "<pre>";
        $leaveGroup = $Baileys->leaveGroup($filters);
        print_r($leaveGroup);
        if($leaveGroup['status']==200){
            echo "Deixou o grupo";
        }
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```