<?php

interface ICrud {

    public function create($obj);

    public function update($obj);

    public function delete($obj);

    public function findById($id);
}
