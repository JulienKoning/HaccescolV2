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
     * @var boolean|null
     */

    private $exactSearch;

    /**
     * @return bool
     */
    public function isExactSearch(): ?bool
    {
        return $this->exactSearch;
    }

    /**
     * @param bool $exactSearch
     */
    public function setExactSearch(bool $exactSearch): void
    {
        $this->exactSearch = $exactSearch;
    }

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