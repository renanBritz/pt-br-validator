<?php

namespace LaravelLegends\PtBrValidator;

use Illuminate\Support\ServiceProvider;

class ValidatorProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */

    public function boot()
    {
        $langPath = resource_path('lang/br_validations');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'br_validations');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/Resources/lang', 'br_validations');
        }

        $this->publishes([
            __DIR__ . '/Resources/lang' => resource_path('lang/br_validations')
        ]);

        $me = $this;

        $this->app['validator']->resolver(function ($translator, $data, $rules, $messages, $customAttributes) use ($me)
        {
            $messages += $me->getMessages();

            return new Validator($translator, $data, $rules, $messages, $customAttributes);
        });
    }


    protected function getMessages()
    {
        return [
            'cnh'                   => trans('br_validations::br_validations.cnh'),
            'cnpj'                  => trans('br_validations::br_validations.cnpj'),
            'cpf'                   => trans('br_validations::br_validations.cpf'),
            'formato_cnpj'          => trans('br_validations::br_validations.formato_cnpj'),
            'formato_cpf'           => trans('br_validations::br_validations.formato_cpf'),
            'telefone'              => trans('br_validations::br_validations.telefone'),
            'formato_cep'           => trans('br_validations::br_validations.formato_cep'),
            'formato_placa_veiculo' => trans('br_validations::br_validations.formato_placa_veiculo'),
        ];
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

}
