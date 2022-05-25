# DOCUMENT - BAILEYS

## Descrição
Envia um arquivo para um determinado número.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\ConsumirApiBaileys\Baileys;

    $config = [
        'http' => 'http',//http ou https
        'dominio' => '',//seu ip ou dominio
        'porta' => 8000, //porta de instalação do bailey
    ];

    $number = "55+DDD+Number";//ddd acima de 30 sem o 9
    $pathFile = './doc/meu_arquivo.pdf';//local do arquivo
    $filename = "";// renomear o arquivo; vazio o arquivo vai com o nome original
    $cUrlFile = new CURLFile($pathFile, 'application/pdf', $filename);

    $instance = ''; //nome da instância criada ao ler o qrcode
    try {
        $Baileys = new Baileys($config);

        echo "<pre>";
        $document = $Baileys->document($filters, $instance);
        //print_r($document);
        if ($document['http_code'] == 200){
            echo "Arquivo carregado com sucesso";
        }
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```