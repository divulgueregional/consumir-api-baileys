# TEXT - BAILEYS

## Descrição

Envia um texto simples para um determinado número.

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
    $text = "oi";
    $filters["messageData"] = [
        "to" => "{$number}@s.whatsapp.net",
        "text" => "{$text}"
    ];
    try {
        $Baileys = new Baileys($config);

        echo "<pre>";
        $respText = $Baileys->text($filters);
        print_r($respText);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```

## Formatações

Formas para melhorar o envio da mensagen.

```php
    //novo parágrafo
    $quebraLinha = '
';// cria uma nova linha

$quebraLinha = chr(10);// chr(10) equivale a nova linha

//negrito coloca *
$negrito = "*Aqui negrito* e aqui não";

//Itálico coloca _texto_
$italico = "_Aqui itálico_ e aqui não";

//Taxado coloca ~texto~
$taxado = "~Aqui taxado~ e aqui não";

//Monoespaçado coloca '''texto'''
$monoespacado = "'''Aqui monoespacado''' e aqui não";

<a href="https://faq.whatsapp.com/539178204879377?cms_platform=android&helpref=platform_switcher" target="_blank">referência: https://faq.whatsapp.com/539178204879377?cms_platform=android&helpref=platform_switcher</a>

```
