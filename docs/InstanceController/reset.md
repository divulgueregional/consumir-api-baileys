#  RESET - BAILEYS

## Descrição
Redefinir uma isntância.<br>
Use antes de gerar o qrcode ou se der algum problema e precise reiniciar uma instância

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\ConsumirApiBaileys\Baileys;

    $config = [
        'http' => 'http',//http ou https
        'dominio' => '',//seu ip ou dominio
        'porta' => 8000, //porta de instalação do bailey
        'instance' => '' //sua instância
    ];
    $Baileys = new Baileys($config);

    try {
        echo "<pre>";
        $response = $this->Baileys->reset();
        print_r($response);
        
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```