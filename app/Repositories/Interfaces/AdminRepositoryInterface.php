<?php


namespace App\Repositories\Interfaces;


interface AdminRepositoryInterface
{

    public function categories();

    public function products();

    public function users();

    public function units();

    public function show($id);

   
}
