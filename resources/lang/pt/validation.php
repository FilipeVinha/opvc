<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'O :attribute tem de ser aceite.',
    'active_url'           => 'O :attribute não é um URL válido.',
    'after'                => 'O :attribute tem de ser uma data antes de :date.',
    'alpha'                => 'O :attribute só pode conter letras.',
    'alpha_dash'           => 'O :attribute só pode conter letras, números e dashes.',
    'alpha_num'            => 'O :attribute só pode conter letras e números.',
    'array'                => 'O :attribute tem de ser um array.',
    'before'               => 'O :attribute tem de ser uma data antes de :date.',
    'between'              => [
        'numeric' => 'O :attribute tem de estar entre :min e :max.',
        'file'    => 'O :attribute tem de estar entre :min e :max kilobytes.',
        'string'  => 'O :attribute tem de estar entre :min e :max caracteres.',
        'array'   => 'O :attribute tem de estar entre :min e :max items.',
    ],
    'boolean'              => 'O campo :attribute tem de ser verdadeiro ou falso.',
    'confirmed'            => 'A confirmação do :attribute não corresponde.',
    'date'                 => 'O :attribute não é uma data válida.',
    'date_format'          => 'O :attribute não corresponde ao formato :format.',
    'different'            => 'O :attribute e :other tem de ser diferente.',
    'digits'               => 'O :attribute tem de ser :digits digitos.',
    'digits_between'       => 'O :attribute tem de estar entre :min e :max digitos.',
    'dimensions'           => 'O :attribute tem dimensões de imagem inválidas.',
    'distinct'             => 'O campo :attribute tem valor duplicado.',
    'email'                => 'O :attribute tem de ser um endereço de email válido.',
    'exists'               => 'O :attribute selecionado é inválido.',
    'filled'               => 'O campo :attribute é requirido.',
    'image'                => 'O :attribute tem de ser uma imagem.',
    'in'                   => 'O :attribute selecionado é inválido.',
    'in_array'             => 'O campo :attribute não existe em :other.',
    'integer'              => 'O :attribute tem de ser um inteiro.',
    'ip'                   => 'O :attribute tem de ser um endereço IP válido.',
    'json'                 => 'O :attribute tem de ser uma string JSON válida.',
    'max'                  => [
        'numeric' => 'O :attribute não pode ser maior do que :max.',
        'file'    => 'O :attribute não pode ser maior do que :max kilobytes.',
        'string'  => 'O :attribute não pode ser maior do que :max characters.',
        'array'   => 'O :attribute não pode conter mais do que :max items.',
    ],
    'mimes'                => 'O :attribute tem de ser um ficheiro do type: :values.',
    'min'                  => [
        'numeric' => 'O :attribute tem de ser no mínimo :min.',
        'file'    => 'O :attribute tem de ser no mínimo :min kilobytes.',
        'string'  => 'O :attribute tem de ser no mínimo :min caracteres.',
        'array'   => 'O :attribute tem de conter no mínimo :min items.',
    ],
    'not_in'               => 'O :attribute selecionado é inválido.',
    'numeric'              => 'O :attribute tem de ser um número.',
    'present'              => 'O :attribute tem de ser presente.',
    'regex'                => 'O formato do :attribute é inválido.',
    'required'             => 'O campo :attribute é requirido.',
    'required_if'          => 'O campo :attribute é requirido quando :other é :value.',
    'required_unless'      => 'O campo :attribute é requirido a não ser que :other está em :values.',
    'required_with'        => 'O campo :attribute é requirido quando :values está presente.',
    'required_with_all'    => 'O campo :attribute é requirido quando :values está presente.',
    'required_without'     => 'O campo :attribute é requirido quando :values não está presente.',
    'required_without_all' => 'O campo :attribute é requirido quando nenhum dos :values estão presentes.',
    'same'                 => 'O :attribute e :other têm de corresponder.',
    'size'                 => [
        'numeric' => 'O :attribute tem de ser :size.',
        'file'    => 'O :attribute tem de ser :size kilobytes.',
        'string'  => 'O :attribute tem de ser :size caracteres.',
        'array'   => 'O :attribute tem de conter :size items.',
    ],
    'string'               => 'O :attribute tem de ser uma string.',
    'timezone'             => 'O :attribute tem de ser uma zona válida.',
    'unique'               => 'O :attribute já está a ser usado.',
    'url'                  => 'O formato de :attribute é inválido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
