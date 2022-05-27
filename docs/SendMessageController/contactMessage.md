# REPLY BUTTON - BAILEYS

## Descrição
Envia um vacard, possibilitando adicionar um contato nos contatos.<br>

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\ConsumirApiBaileys\Baileys;

    $config = [
        'http' => 'http',//http ou https
        'dominio' => '',//seu ip ou dominio
        'porta' => 8000, //porta de instalação do bailey
        'instance' => '' //sua instância
    ];

    $number = "55+DDD+Number";//ddd acima de 30 sem o 9
    $filters["messageData"]= [
        "to" => "{$number}@s.whatsapp.net",
        "vcard" => [
            "fullName" => "DRSystema",//nome do contato
            "displayName" => "",
            "organization" => "Divulgue Regional",//nome da empresa
            "phoneNumber" => "555484384705"//fone do contato a ser adicionado
        ]
    ];
    try {
        $Baileys = new Baileys($config);

        echo "<pre>";
        $contactMessage = $Baileys->contactMessage($filters);
        // print_r($contactMessage);
        if($contactMessage['status']==200){
            echo "contactMessage enviada";
        }
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```