# IMAGE - BAILEYS

## Descrição
Envia uma imagem para um determinado número.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\ConsumirApiBaileys\Baileys;

    $config = [
        'http' => 'http',//http ou https
        'dominio' => '',//seu ip ou dominio
        'porta' => 8000, //porta de instalação do bailey
        'instance' => '' //sua instância
    ];

    $pathFile = './doc/minha_imagem.png';//local do arquivo
    $filename = "nome_do_arquivo";// nome do arquivo
    $number = "55+DDD+Number";//ddd acima de 30 sem o 9
    $info = [
        'id' => $number,
        "caption" => $filename,
        "link" => $pathFile,
    ];
    try {
        $Baileys = new Baileys($config);

        echo "<pre>";
        $image = $Baileys->image($info);
        //print_r($image);
        if ($image['http_code'] == 200){
            echo "Imagem carregado com sucesso";
        }
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```