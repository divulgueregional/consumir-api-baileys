<?php
namespace Divulgueregional\consumirapibaileys;

class Baileys{
    function __construct(array $config)
    {
        $this->client = new Client([
            'base_uri' => 'https://cdpj.partners.bancointer.com.br',
        ]);

        // $this->optionsRequest = [
        //     'headers' => [
        //         'Accept' => 'application/json'
        //     ],
        //     'cert' => $config['certificate'],
        //     'verify' => $config['certificate'],
        //     'ssl_key' => $config['certificateKey'],
        // ];
    }
}