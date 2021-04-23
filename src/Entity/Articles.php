<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\ORM\Mapping as ORM;
//use Symfony\Component\Validator\Constraints\Date;
//use Symfony\Component\Validator\Constraints\DateTime;
//use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * @ORM\Entity(repositoryClass=ArticlesRepository::class)
 */
class Articles
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

//    /**
//     * @ORM\Column(type="string, length=100)
//     */
//    private $thumbnail;
//
//    /**
//     * @Vich\UploadableField(mapping="thumnails", fileNameProperty="thumbnail")
//     */
//    private $thumbnailFile;
//
//    /**
//     * @ORM\Column (type='datetime')
//     */
//    private $updatedAt;
//
//    public function __construct()
//    {
//        $this->updatedAt = new DateTime();
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getThumbnailFile()
//    {
//        return $this->thumbnailFile;
//    }
//
//    /**
//     * @param mixed $thumbnailFile
//     */
//    public function setThumbnailFile($thumbnailFile): void
//    {
//        $this->thumbnailFile = $thumbnailFile;
//
//        if($thumbnailFile) {
//            $this->updatedAt = new DateTime();
//        }
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getThumbnail()
//    {
//        return $this->thumbnail;
//    }
//
//    /**
//     * @param mixed $thumbnail
//     */
//    public function setThumbnail($thumbnail): void
//    {
//        $this->thumbnail = $thumbnail;
//    }

    /**
     * @ORM\Column(type="text")
     */
    private $author;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): self
    {
        $this->category = $category;

        return $this;
    }
}
