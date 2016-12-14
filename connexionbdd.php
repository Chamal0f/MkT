<?php
include_once('config/db.php');
//db handling class, use static method query :
//db::query('select * from table where data=?;', $value);
class db{
    public static function query($query){
        try{
            $pdo = new PDO('mysql:host='.Config::$host.';dbname='.Config::$dbname.';charset=utf8', Config::$user, Config::$mdp);
        } catch (PDOException $e) {
            error_log("Erreur !: " . $e->getMessage() . "<br/>");
            die();
        }
        $args = func_get_args();
        array_shift($args);
        $reponse = $pdo->prepare($query);
        $reponse->execute($args);
        $pdo = null;
        return $reponse;
    }
}
?>