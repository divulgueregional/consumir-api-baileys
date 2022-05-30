#  GET WEBHOOK - BAILEYS

## Descrição
Busca o whebhook cadastrado.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\ConsumirApiBaileys\Baileys;
    
    $config = [
        'http' => 'http',//http ou https
        'dominio' => '',//seu ip ou dominio
        'porta' => 8000, //porta de instalação do bailey
        'instance' => '' //sua instância
    ];
    
    try {
        $Baileys = new Baileys($config);

        echo "<pre>";
        $webhook = $Baileys->getWebhook();
        //print_r($webhook);
        if($webhook['status']==200){
            echo "Status do webhook obtido.<br>
            webhookData: {$webhook['response']->webhookData->webhookUrl}<br>
            webhookEnabled: {$webhook['response']->webhookData->webhookEnabled}";
        }
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```