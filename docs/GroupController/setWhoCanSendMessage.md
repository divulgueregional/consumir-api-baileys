#  SET WHO CAN SEND MESSAGE - BAILEYS

## Descrição
definir quem envia mensagem no grupo<br>
<p>true: </p> somente adm pode enviar msg
<p>false: </p> todos podem enviar msg

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
        $setWhoCanSendMessage = $Baileys->setWhoCanSendMessage($filters);
        //print_r($setWhoCanSendMessage);
        if($setWhoCanSendMessage['status']==200){
            echo "Alteração feita com sucesso";
        }
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```