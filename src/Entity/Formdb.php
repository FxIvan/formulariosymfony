<?php

namespace App/Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formdb
 *
 * @ORM\Table(name="formdb")
 * @ORM\Entity
 */
class Formdb
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="text", length=65535, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="text", length=65535, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="text", length=65535, nullable=false)
     */
    private $telefono;


}
