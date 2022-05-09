# CONFIG API BAILEYS

## Introdução
Config é necessário para estabelecer a conexão e parâmetros iniciais

```php
    require '../../../vendor/autoload.php';

    use Divulgueregional\consumirapibaileys\Baileys;

    // $config = [
    //     'certificate' => '../cert/Inter_API_Certificado.crt',//local do certificado crt
    //     'certificateKey' => '../cert/Inter_API_Chave.key',//local do certificado key
    // ];

    // $filters = [
    //     'dataSaldo' => '',//YYYY-MM-DD caso não informar traz o saldo do dia
    // ];

    // $token = '';//seu token
    // try {
    //     $bankingInter = new InterBanking($config);
    //     $bankingInter->setToken($token);

    //     echo "<pre>";
    //     $saldo = $bankingInter->checkSaldo($filters);
    //     print_r($saldo);
    // } catch (\Exception $e) {
    //     echo $e->getMessage();
    // }