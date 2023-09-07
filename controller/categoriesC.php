<?php

class CategoriesC
{

    function list() 
    {
        $sql = "SELECT * FROM categories";
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
        $sql = "SELECT * FROM categories where Name like :researcher";
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


    function countCategories(){

        $sql="SELECT count(CategoryID) FROM categories" ;
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




    function getCategoryById($id)
    {
        $requete = "select * from categories where id=:id";
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

    

    function addcategory($categories)
    {
        $config = config::getConnexion();
        try {
            $querry = $config->prepare('
            INSERT INTO categories
            (Name,Description)
            VALUES
            (:Name,:Description)
            ');
            $querry->execute([
                'Name'=>$categories->getName(),
                'Description'=>$categories->getdescription(),


            ]);
            $categories->setid($config->lastInsertId());
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }



 

        function modifiercategory($categories)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE categories SET
                Name=:Name,Description=:Description

                where id=:id
                ');
                $querry->execute([
                    'id'=>$categories->getid(),
                    'Name'=>$categories->getName(),
                    'Description'=>$categories->getdescription()

                  
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }



        function deleteCategory($id)
        {
            $sql="DELETE FROM categories WHERE id= :id";
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
