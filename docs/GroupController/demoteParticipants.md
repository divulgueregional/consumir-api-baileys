#  PROMOTE PARTICIPANTS - BAILEYS

## Descrição
Retira o participante como administrador.<br>
Observe que os participantes não devem conter @s.whatsapp.net<br>
Use o método listGroup para pegar o id de cada grupo

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
    "group_id" => "",
        "participants" => array(
            "",//"55+DDD+Number";//ddd acima de 30 sem o 9
            "",//"55+DDD+Number";//ddd acima de 30 sem o 9
        ),
    ];
    
    try {
        $Baileys = new Baileys($config);

        echo "<pre>";
        $demoteParticipants = $Baileys->demoteParticipants($filters);
        //print_r($demoteParticipants);
        if($demoteParticipants['status']==200){
            echo "Participante retirado como administrador";
        }
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```