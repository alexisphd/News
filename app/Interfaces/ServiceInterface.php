<?php

namespace App\Interfaces;

interface ServiceInterface
{

    public function store($data);

    public function update($data, $item);

    public function delete($data);

}