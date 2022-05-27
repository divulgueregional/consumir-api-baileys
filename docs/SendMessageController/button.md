# REPLY BUTTON - BAILEYS

## Descrição
Permite que você crie 3 tipos botão.<br>
- replyButton: replicar a msg recebida<br>
- urlButton: título, uma msg e um botão que direciona para um link a ser aberto no navegador<br>
- callButton: manda uma msg e um botão que ao clicar abre para discar o número<br>

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
        "text" => "DRSystema",
        "footerText" => "Acesse nosso sistema",
        "buttons" => [
            array(
                "type" => "replyButton",
                "title" => "This is a replyButton",
            ),
        ],
    ];

    // ENVIAR MENSAGEM COM BUTON urlButton
    $filters["messageData"]= [
        "to" => "{$number}@s.whatsapp.net",
        "text" => "Drsystema",
        "footerText" => "Acesse nosso sistema",
        "buttons" => [
            array(
                "type" => "urlButton",
                "title" => "This is a urlButton",
                "payload" => "https://www.drsystema.com.br/",
            ),
        ],
    ];

    // ENVIAR MENSAGEM COM BUTON callButton
    $filters["messageData"]= [
        "to" => "{$number}@s.whatsapp.net",
        "text" => "Drsystema",
        "footerText" => "Acesse nosso sistema",
        "buttons" => [
            array(
                "type" => "callButton",
                "title" => "This is a callButton",
                "payload" => "918788889688",
            ),
        ],
    ];
    try {
        $Baileys = new Baileys($config);

        echo "<pre>";
        $replyButton = $Baileys->replyButton($filters);
        // print_r($replyButton);
        if($replyButton['status']==200){
            echo "replyButton enviada";
        }
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```