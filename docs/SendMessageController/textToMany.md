# TEXT TO MANY - BAILEYS

## Descrição

Envia um texto simples para mais de um número.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\ConsumirApiBaileys\Baileys;

    $config = [
        'http' => 'http',//http ou https
        'dominio' => '',//seu ip ou dominio
        'porta' => 8000, //porta de instalação do bailey
        'instance' => '' //sua instância
    ];

    $text = "oi";
    $filters["messageData"] = [
        "to" => [
          "555488888888@s.whatsapp.net",//ddd acima de 30 sem o 9
          "555499999999@s.whatsapp.net"
        ],
        "text"=> $text
    ];
    try {
        $Baileys = new Baileys($config);

        echo "<pre>";
        $textToMany = $Baileys->textToMany($filters);
        //print_r($textToMany);
        if($textToMany['status']==200){
            echo "mensagens enviadas";
        }
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```
