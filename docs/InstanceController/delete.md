#  DELETE - BAILEYS

## Descrição
Excluir uma isntância.

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
        $response = $this->Baileys->delete();
        print_r($response);
        
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```