<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use function Symfony\Component\VarDumper\Tests\Caster\reflectionParameterFixture;

/**
 * @ORM\Entity
 * @ORM\Table(name="mix_track")
 */
class MixTrack
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rawName;

    /**
     * @ORM\Column(type="string")
     */
    private $artist;

    /**
     * @ORM\Column(type="string")
     */
    private $trackName;

    /**
     * @ORM\Column(type="text")
     */
    private $mixDate;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return MixTrack
     */
    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRawName()
    {
        return $this->rawName;
    }

    /**
     * @param mixed $rawName
     * @return MixTrack
     */
    public function setRawName($rawName)
    {
        $this->rawName = $rawName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * @param mixed $artist
     * @return MixTrack
     */
    public function setArtist($artist)
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTrackName()
    {
        return $this->trackName;
    }

    /**
     * @param mixed $trackName
     * @return MixTrack
     */
    public function setTrackName($trackName)
    {
        $this->trackName = $trackName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMixDate()
    {
        return $this->mixDate;
    }

    /**
     * @param mixed $mixDate
     * @return MixTrack
     */
    public function setMixDate($mixDate)
    {
        $this->mixDate = $mixDate;

        return $this;
    }
}