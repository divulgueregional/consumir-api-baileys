# MEDIA URL - BAILEYS

## Descrição
Permite que você envie um URL de mídia para um usuário.<br>
<p><b>type:</b> </p>
- image - uma imagem<br>
- video - um video<br>
- audio - um arquivo de audio<br>
- document - um documento<br>

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\ConsumirApiBaileys\Baileys;

    $config = [
        'http' => 'http',//http ou https
        'dominio' => '',//seu ip ou dominio
        'porta' => 8000, //porta de instalação do bailey
    ];

    $number = "55+DDD+Number";//ddd acima de 30 sem o 9
    $filters["messageData"] = [
        "to" => "{$number}@s.whatsapp.net",
        "url" => "https://site.com.br/teste.pdf",
        "type" => "document",
        "caption" => "arquivo pdf",
        "mimeType" => "application/pdf"
    ];
    $instance = ''; //nome da instância criada ao ler o qrcode
    try {
        $Baileys = new Baileys($config);

        echo "<pre>";
        $mediaURL = $Baileys->mediaURL($filters, $instance);
        //print_r($mediaURL);
        if($textToMany['status']==200){
            echo "mediaURL enviada";
        }
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```