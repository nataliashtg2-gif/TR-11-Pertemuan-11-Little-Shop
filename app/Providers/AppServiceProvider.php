<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider; use Illuminate\Support\Facades\Gate; use App\Models\Product; use App\Policies\PostPolicy;
class AppServiceProvider extends ServiceProvider { public function register():void{} public function boot():void{Gate::policy(Product::class,PostPolicy::class);} }
