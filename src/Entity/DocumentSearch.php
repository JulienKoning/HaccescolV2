<?php

namespace App\Entity;

class DocumentSearch{

    /**
     * @var int|null
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