<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;

class DocumentSearch{

    /**
     * @var int|null
     * @Assert\ Type("int")
     */

     private $documentType;


     /**
      * @var string|null
      */

     private $searchedText;

     /**
      * @return int|null
      */

      public function getDocumentType()
      {
          return $this->documentType;
      }

      /**
       * @param int|null $documentType
       * @return DocumentSearch
       */

       public function setDocumentType(int $documentType): DocumentSearch
       {
           $this->documentType = $documentType;
           return $this;
       }

       /**
        * @return string|null
        */

      public function getSearchedText()
      {
          return $this->searchedText;
      }

      /**
       * @param string|null $searchedText
       * @return DocumentSearch
       */

       public function setSearchedText(string $searchedText): DocumentSearch
       {
           $this->searchedText = $searchedText;
           return $this;
       }
}