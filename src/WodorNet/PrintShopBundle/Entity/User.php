<?php

namespace WodorNet\PrintShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use FOS\UserBundle\Model\User as BaseUser;
/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="Invitation", inversedBy="user")
     * @ORM\JoinColumn(referencedColumnName="code")
     * @Assert\NotNull(message="Your invitation code is wrong")
     */
    protected $invitation;

    public function setInvitation(Invitation $invitation)
    {
        $this->invitation = $invitation;
    }

    public function getInvitation()
    {
        return $this->invitation;
    }

}
