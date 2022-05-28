#  GROUP_ID - BAILEYS

## Descrição
Lista todos os participantes de um grupo.<br>
Observe que o group_id deve conter @g.us no final, por exemplo: 556195526247-1634509787@g.us<br>
Use o método listGroup para pegar o id de cada grupo

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

        $group_id = '';
        echo "<pre>";
        $group_id_resp = $Baileys->group_id($group_id);
        print_r($group_id_resp);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```