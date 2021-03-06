<?php
namespace VirtualPersistAPI\VirtualPersistBundle\Entity;

//use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;
//use Symfony\Component\Security\Core\User\EquatableInterface;

/**
 * @file
 * The User entity.
 */

/**
 * @ORM\Entity(repositoryClass="UserRepsitory")
 * @ORM\Table(
    name="User",
    uniqueConstraints={
      @ORM\UniqueConstraint(
        name="user_uuid",columns={"uuid"}
      )
    })
 * @UniqueEntity(fields="email", message="Email already taken.")
 */
class User implements AdvancedUserInterface, \Serializable {

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\Column(type="string", length=255)
   * @Assert\NotBlank()
   * @Assert\Length(max = 4096)
   */
  protected $password;

  /**
   * @ORM\Column(type="string", length=255)
   */
  protected $username;

  /**
   * @ORM\Column(type="string", length=255)
   * @Assert\NotBlank()
   * @Assert\Email()
   */
  protected $email;

  /**
   * @ORM\Column(type="string", length=36)
   */
  protected $uuid;

  /**
   * @ORM\Column(type="string", length=255)
   */
  protected $salt;

  /**
   * @ORM\Column(name="is_active", type="boolean")
   */
  private $isActive;

  /**
   * @ORM\ManyToMany(targetEntity="Role", inversedBy="users")
   *
   */
  private $roles;


  public function __construct() {
      $this->isActive = true;
      $this->salt = md5(uniqid(null, true));
      $this->roles = new ArrayCollection();
  }

  public function getIsActive() {
    return $this->isActive;
  }
  
  public function setIsActive($active) {
    $this->isActive = $active;
    return $this;
  }

  /**
   * Get id
   *
   * @return integer 
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Set uuid
   *
   * @param string $uuid
   * @return User
   */
  public function setUuid($uuid) {
    $this->uuid = $uuid;

    return $this;
  }

  /**
   * Get uuid
   *
   * @return string 
   */
  public function getUuid() {
    return $this->uuid;
  }

  public function setEmail($email) {
    $this->email = $email;

    return $this;
  }

  public function getEmail() {
    return $this->email;
  }

  /**
   * Set password
   *
   * @param string $password
   * @return User
   */
  public function setPassword($password) {
    $this->password = $password;

    return $this;
  }

  /**
   * Get password
   *
   * @return string 
   */
  public function getPassword() {
    return $this->password;
  }

  /**
   * Set permission
   *
   * @param string $permission
   * @return User
   */
  public function setPermission($permission) {
    $this->permission = $permission;

    return $this;
  }

  /**
   * Get permission
   *
   * @return string 
   */
  public function getPermission() {
    return $this->permission;
  }


    /**
     * @inheritDoc
     */
    public function getUsername()
    {
        return $this->username;
    }

  /**
   * Set permission
   *
   * @param string $permission
   * @return User
   */
  public function setUsername($name) {
    $this->username = $name;

    return $this;
  }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return $this->roles->toArray();
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
        ) = unserialize($serialized);
    }

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->isActive;
    }

}

