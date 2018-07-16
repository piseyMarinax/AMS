<?php

namespace App\Providers;

use Validator;
use Illuminate\Support\ServiceProvider;
use App\Model\SupplierItem;
use App\Model\UnitPrice;
use App\Model\PriceBook;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('unique_supplier_items', function($attribute, $value, $parameters, $validator) {
			return !SupplierItem::where('item_id', $value)->where('sup_id', $parameters[0])->exists();
		});
		
		Validator::extend('unique_unit_sale_price', function($attribute, $value, $parameters, $validator) {
			return !UnitPrice::where('unit_sale', $value)->where('item_id', $parameters[0])->exists();
		});
		
		Validator::extend('unique_price_books', function($attribute, $value, $parameters, $validator) {
			return !PriceBook::where('cus_id', $value)->where('unit_sale', $parameters[0])->exists();
		});
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
