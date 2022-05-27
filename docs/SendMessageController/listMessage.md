# LIST MESSAGEM - BAILEYS

## Descrição
Você pode enviar uma lista de opções e o contato pode escolher uma opção e lhe retornar com a resposta.<br>

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
        "title" => "PESQUISA",
        "text" => "Qual horário quer almoçar",
        "description" => "Clique em responder, selecione uma alternativa e enviar",
        "buttonText" => "RESPONDER",
        "sections" => [
            array(
                "title" => "titulo dentro destacado",
                "rows" => [
                    array(
                        "title" => "Opção 1",
                        "description" => "Almoçar as 11 horas",
                        "rowId" => "555484384705"
                    ),
                    array(
                        "title" => "Opção 2",
                        "description" => "Almoçar as 12 horas",
                        "rowId" => "555484384705"
                    )
                ],
            ),
        ],
        "listType" => 0
    ];
    try {
        $Baileys = new Baileys($config);

        echo "<pre>";
        $listMessage = $Baileys->listMessage($filters);
        // print_r($listMessage);
        if($listMessage['status']==200){
            echo "listMessage enviada";
        }
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```