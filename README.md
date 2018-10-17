# Laravel 5 - Validações em Português

# ATENÇÃO: ESTE É UM FORK ADAPTADO PARA USO PESSOAL. NÃO RECOMENDO UTILIZAR.

Esta é uma biblioteca com algumas validações brasileiras.

## Instalação

Execute:

```
composer require renan-britz/pt-br-validator --no-scripts
```

Após a instalação, adicione no arquivo `config/app.php` a seguinte linha:

```php

LaravelLegends\PtBrValidator\ValidatorProvider::class

```

Agora, para utilizar a validação, basta fazer o procedimento padrão do `Laravel`.

Será possível usar os seguintes métodos de validação:

* **`cnpj`** - Valida se o campo é um CNPJ válido. É possível gerar um CNPJ válido para seus testes utilizando o site [geradorcnpj.com](http://www.geradorcnpj.com/)

* **`cpf`** - Valida se o campo é um CPF válido. É possível gerar um CPF válido para seus testes utilizando o site [geradordecpf.org](http://geradordecpf.org) 

* **`formato_cnpj`** - Valida se o campo tem uma máscara de CNPJ correta (**`99.999.999/9999-99`**).

* **`formato_cpf`** - Valida se o campo tem uma máscara de CPF correta (**`999.999.999-99`**).

* **`formato_cep`** - Valida se o campo tem uma máscara de correta (**`99999-999`** ou **`99.999-999`**).

* **`telefone`** - Valida se o campo tem umas máscara de telefone (**`(55) 99999-9999`**).

* **`formato_placa_veiculo`** - Valida se o campo tem o formato válido de uma placa de veículo.

### Testando

Com isso, é possível fazer um teste simples


```php
$validator = Validator::make(
    ['telefone' => '(77)9999-3333'],
    ['telefone' => 'required|telefone_com_ddd']
);

dd($validator->fails());

```

### Customizando as mensagens

Todas as validações citadas acima já contam mensagens padrões de validação, porém, é possível alterar isto usando o terceiro parâmetro de `Validator::make`. Este parâmetro deve ser um array onde os índices sejam os nomes das validações e os valores devem ser as respectivas mensagens.

Por exemplo:


```php
Validator::make($valor, $regras, ['celular_com_ddd' => 'O campo :attribute não é um celular'])
```

