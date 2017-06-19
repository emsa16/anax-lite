<?php
namespace Emsa\Webshop;

class Webshop
{
    public function getProducts($app)
    {
        $sql = "SELECT * FROM VProducts;";
        return $app->db->executeFetchAll($sql);
    }

    public function getProduct($app, $id)
    {
        $sql = "SELECT * FROM VProducts WHERE ProductNumber = ?;";
        return $app->db->executeFetch($sql, [$id]);
    }

    public function getCategories($app)
    {
        $sql = "SELECT * FROM ProdCategory;";
        return $app->db->executeFetchAll($sql);
    }

    public function create($app, $params)
    {
        $sql = "CALL addProduct(?, ?, ?, ?, ?);";
        $app->db->execute($sql, array_values($params));
    }

    public function update($app, $params)
    {
        $sql = "CALL updateProduct(?, ?, ?, ?, ?, ?);";
        $app->db->execute($sql, array_values($params));
    }

    public function delete($app, $id)
    {
        $sql = "DELETE FROM Product WHERE id=?;";
        $app->db->execute($sql, [$id]);
    }
}
