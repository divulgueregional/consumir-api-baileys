#  SET WHO CAN CHANGE SETTINDS - BAILEYS

## Descrição
Definir quem pode alterar a configuração do grupo<br>
<p>true: </p> somente adm pode alterar a configuração do grupo
<p>false: </p> todos podem alterar a configuração do grupo

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
        "allowOnlyAdmins" => true,//true: somente adm mandam msg; false: todos enviam msg
    ];
    
    try {
        $Baileys = new Baileys($config);

        echo "<pre>";
        $setWhoCanChangeSettings = $Baileys->setWhoCanChangeSettings($filters);
        //print_r($setWhoCanChangeSettings);
        if($setWhoCanChangeSettings['status']==200){
            echo "Alteração feita com sucesso";
        }
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```