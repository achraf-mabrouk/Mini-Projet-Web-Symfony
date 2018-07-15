<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TP
 *
 * @ORM\Table(name="tp")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TPRepository")
 */
class TP
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="pdf_file", type="string")
     */
    private $pdfFile;

    /**
     * @var int
     *
     * @ORM\Column(name="cours_id", type="integer")
     */
    private $coursId;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set pdfFile
     *
     * @param string $pdfFile
     *
     * @return TP
     */
    public function setPdfFile($pdfFile)
    {
        $this->pdfFile = $pdfFile;

        return $this;
    }

    /**
     * Get pdfFile
     *
     * @return string
     */
    public function getPdfFile()
    {
        return $this->pdfFile;
    }
}

