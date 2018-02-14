<?php

class dataValidation
{
    private $requestedValues = array();
    private $formName = '';
    private $charToReplaceSrc = array('a', '<', '>');
    private $charToReplaceDst = array('a', '' , '' );
    public $result = array();
    
    function __construct($_formName, $_requestedValues)
    {
        $this->formName = $_formName;
        $this->requestedValues = $_requestedValues;
        $this->result = $_requestedValues;
    }
    
    /**
    * Valide les données
    * @param array $values les données
    * @return array le resultat
    */
    public function validate($values)
    {
        $this->result = array();
        $this->result['displayMessage'] = '';
        
        foreach ($values as $field => $options){
            
            /**
             * Remplace les caractères selon le pattern, trim
             */
            if (isset($this->requestedValues[$field]) && $this->requestedValues[$field] != ''){
                $valueFilter = $this->requestedValues[$field];
                $valueFilter = str_replace($this->charToReplaceSrc, $this->charToReplaceDst, $valueFilter);
                $this->result[$field] = trim($valueFilter);
            } else {
                $this->result[$field] = '';
            }
            
            /**
             * Vérifie si le champ est vide ET si il est requis
             */
            if (empty($this->result[$field]) && strpos($options, '*') !== false){
                $this->result['error'][$field] = 'empty';
                $this->result['displayMessage'].= '- Veuillez remplir le champ: '.$field.'.<br>';
            }
            
            /**
             * Verifie la validité des données
             * s = string
             * i = integer
             * e = email
             */
            if (!empty($this->result[$field])){
                
                if (strpos($options, 's') !== false && !is_string($this->result[$field])){
                    $this->result['error'][$field] = 'invalid';
                    
                }else if (strpos($options, 'i') !== false && !is_numeric($this->result[$field])){
                    $this->result['error'][$field] = 'invalid';
                    
                }else if (strpos($options, 'e') !== false && !filter_var($this->result[$field], FILTER_VALIDATE_EMAIL)){
                    $this->result['error'][$field] = 'invalid';
                    $this->result['displayMessage'].= '- L\'E-mail est incorrect.<br>';
                    
                }
            }
        }
    }
}
