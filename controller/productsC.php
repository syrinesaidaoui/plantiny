<?php

class ProductsC
{

    function list() 
    {
        $sql = "SELECT * FROM products";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $service = $query->fetch();
            $res = [];
            for ($x = 0; $service; $x++) {
                $res[$x] = $service;
                $service = $query->fetch();
            }
            return $res;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
   



    function listResearcher($researcher)
    {
        $sql = "SELECT * FROM products where Name like :researcher OR  Price like :researcher OR  Description like :researcher";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':researcher', '%'.$researcher.'%');
            $query->execute();
            $service = $query->fetch();
            $res = [];
            for ($x = 0; $service; $x++) {
                $res[$x] = $service;
                $service = $query->fetch();
            }
            return $res;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function countProducts(){

        $sql="SELECT count(id) FROM products" ;
        $db = config::getConnexion();
        try{
            $query = $db->query($sql);
            $query->execute();
               $prog_number =$query->fetchColumn();
            return $prog_number;
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }   

    }




    function getProductById($id)
    {
        $requete = "select * from products where id=:id";
        $config = config::getConnexion();
        try {
            $querry = $config->prepare($requete);
            $querry->execute(
                [
                    'id'=>$id
                ]
            );
            $result = $querry->fetch();
            return $result ;
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }

    

    function addproduct($products)
    {
        $config = config::getConnexion();
        try {
            $querry = $config->prepare('
            INSERT INTO products
            (Name,Description,Price,StockQuantity,CategoryID,Manufacturer,AddedDate,ImageURL)
            VALUES
            (:Name,:Description,:Price,:StockQuantity,:CategoryID,:Manufacturer,:AddedDate,:ImageURL)
            ');
            $querry->execute([
                'Name'=>$products->getName(),
                'Description'=>$products->getdescription(),
                'Price'=>$products->getPrice(),
                'StockQuantity'=>$products->getStockQuantity(),
                'CategoryID'=>$products->getCategoryID(),
                'Manufacturer'=>$products->getManufacturer(),
                'AddedDate'=>$products->getAddedDate(),
                'ImageURL'=>$products->getImageURL()

            ]);
            $products->setid($config->lastInsertId());
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }



 

        function modifierProduct($products)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE products SET
                Name=:Name,Description=:Description,Price=:Price,StockQuantity=:StockQuantity,CategoryID=:CategoryID,Manufacturer=:Manufacturer,AddedDate=:AddedDate,ImageURL=:ImageURL

                where id=:id
                ');
                $querry->execute([
                    'id'=>$products->getid(),
                    'Name'=>$products->getName(),
                    'Description'=>$products->getdescription(),
                    'Price'=>$products->getPrice(),
                    'StockQuantity'=>$products->getStockQuantity(),
                    'CategoryID'=>$products->getCategoryID(),
                    'Manufacturer'=>$products->getManufacturer(),
                    'AddedDate'=>$products->getAddedDate(),
                    'ImageURL'=>$products->getImageURL()

                  
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }



      


        function deleteProduct($id)
        {
            $sql="DELETE FROM products WHERE id= :id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
        }

  

}


?>
