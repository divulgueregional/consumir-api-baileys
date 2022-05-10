#  OBTER_CONTACTS - BAILEYS

## Descrição
Lista os contatos.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\ConsumirApiBaileys\Baileys;

    $instance = ''; //nome da instância
    try {
        $Baileys = new Baileys($config);

        echo "<pre>";
        $obterContacts = $Baileys->obterContacts($instance);
        print_r($obterContacts);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```