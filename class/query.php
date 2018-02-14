<?php

interface IQuery
{
    public function escape($value);
    public function select($query);
    public function insert($table, $values);
    public function update($table, $values, $id);
    public function delete($table, $id);
}

class Query implements IQuery
{
    /*
     * Ajoute la connection à la DB
     */
    protected $_connect;
    
    function __construct()
    {
        $this->_connect = Db::connect();
    }
    
    /**
    * Effectue la requete
    * @param string $query la requete  
    * @return mixed le resultat de mysqli::query()  
    */
    protected function _query($query)
    {
        $result = $this->_connect->query( $query );
        return $result;
    }
    
    /**    
    * Verifie la valeur destinée à une insertion ou mise a jour    * 
    * @param string $value la valeur a vérifier  
    * @return string la valeur vérifiée et échapée
    */
    public function escape($value)
    {
        return ' \'' . $this->_connect->real_escape_string( $value ) . '\'';
    }

    /**
    * Selectionne les donnees
    * @param string $query la requete  
    * @return array les donnees | false en cas d'échec 
    */
    public function select($query)
    {
        $results = $this->_query($query);
        if (!$results) {
            $rows = false;
        } else {
            $rows = array();
            while ($row = $results->fetch_array()) {
                $rows[] = $row;
            }
        }
        return $rows;
    }
    
    /**
    * Suppression de donnees
    * @param string $table la table d'insertion
    * @param string $id l'identifiant pour la suppression
    */
    public function delete($table, $id)
    {
        $query = 'DELETE FROM ' . $table . ' WHERE ' . $id;
        return $this->_query( $query );
    }
    
    /**   
    * Insertion de donnees
    * @param string $table la table d'insertion   
    * @param array $values les champs et valeurs respectivement key=>value
    */
    public function insert($table, $values)
    {
        $strField = '';
        $strValue = '';
        $n = 0;
        foreach ($values as $field => $value) {
            $strField .= ( $n > 0 ) ? ', ' . $field : $field;
            $strValue .= ( $n > 0 ) ? ', ' . $this->escape( $value ) : $this->escape($value);
            $n++;
        }
        $query = 'INSERT INTO ' . $table . ' (' . $strField . ') VALUES (' . $strValue . ')';
        return $this->_query( $query );
    }
    
    /**
    * Mise à jour de donnees
    * @param string $table la table d'insertion
    * @param array $values les champs et valeurs respectivement key=>value
    * @param string $id l'identifiant pour l'insertion
    */    
    public function update($table, $values, $id)
    {
        $str = '';
        $n = 0;
        foreach ($values as $field => $value) {
            $str .= ( $n > 0 ) ? ', ' : '';
            $str .= $field. ' = ' . $this->escape($value);
            $n++;
        }
        $query = 'UPDATE ' .$table. ' SET ' .$str. ' WHERE ' .$id;
        return $this->_query($query);
    }
    
}
