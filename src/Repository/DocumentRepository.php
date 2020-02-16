<?php

namespace App\Repository;

use App\Entity\Document;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use App\Entity\DocumentSearch;
use Doctrine\ORM\Query;

/**
 * @method Document|null find($id, $lockMode = null, $lockVersion = null)
 * @method Document|null findOneBy(array $criteria, array $orderBy = null)
 * @method Document[]    findAll()
 * @method Document[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Document::class);
    }


    /**
     * @return Query
     */

    public function findAllQuery(DocumentSearch $search)
    {
        $query = $this->createQueryBuilder('d');
        if ($search->getDocumentType())
        {
            $query = $query->andWhere('d.category = :typeDoc');
            $query->setParameter('typeDoc', $search->getDocumentType());
        }

        if ($search->getSearchedText())
        {
            $andOr = ' OR ';
            if ($search->isExactSearch())
            {
                $andOr = ' AND ';
            }
            $text = $search->getSearchedText();
            $text_frags = explode(' ', $text);
            #$fin = count($text_frags);
            $expr = '';
            foreach ($text_frags as $mot)
            {
                $expr = $expr.'(d.title LIKE \'%'.$mot.'%\' OR d.content LIKE \'%'.$mot.'%\')';
                if ($mot != end($text_frags))
                {
                    $expr = $expr.$andOr;
                }

            }
            $query->andWhere($expr);
        }
        
        return $query->getQuery();
    }

    // /**
    //  * @return Document[] Returns an array of Document objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Document
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
