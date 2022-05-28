#  GROUP INVITE CODE - BAILEYS

## Descrição
Pegar o código de convite do grupo.<br>
Observe que os participantes não devem conter @s.whatsapp.net<br>
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

    $filters = [ 
        "group_id" => "120363041230238932@g.us" 
    ];

try {
    $Baileys = new Baileys($config);

    echo "<pre>";
    $groupInviteCode = $Baileys->groupInviteCode($filters);
    // print_r($groupInviteCode);
    if($groupInviteCode['status']==200){
        echo "Código convite: {$groupInviteCode['response']->inviteCode}";
    }
} catch (\Exception $e) {
    echo $e->getMessage();
}
```