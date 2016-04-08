<?php

namespace Quora\QuoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Quora\QuoraBundle\Repository\UserRepository")
 */
class User implements AdvancedUserInterface, \Serializable {

  /**
   * @var int
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\Column(type="string", length=25, unique=true)
   */
  private $username;

  /**
   * @ORM\Column(type="string", length=64)
   */
  private $password;

  /**
   * @ORM\Column(type="string", length=60, unique=true)
   */
  private $email;

  /**
   * @ORM\Column(name="is_active", type="boolean")
   */
  private $isActive;

  /**
   * Get id
   *
   * @return integer 
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Set username
   *
   * @param string $username
   * @return User
   */
  public function setUsername($username) {
    $this->username = $username;

    return $this;
  }

  /**
   * Get username
   *
   * @return string 
   */
  public function getUsername() {
    return $this->username;
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
   * Set email
   *
   * @param string $email
   * @return User
   */
  public function setEmail($email) {
    $this->email = $email;

    return $this;
  }

  /**
   * Get email
   *
   * @return string 
   */
  public function getEmail() {
    return $this->email;
  }

  /**
   * Set isActive
   *
   * @param boolean $isActive
   * @return User
   */
  public function setIsActive($isActive) {
    $this->isActive = $isActive;

    return $this;
  }

  /**
   * Get isActive
   *
   * @return boolean 
   */
  public function getIsActive() {
    return $this->isActive;
  }

  public function isAccountNonExpired() {
    return true;
  }

  public function isAccountNonLocked() {
    return true;
  }

  public function isCredentialsNonExpired() {
    return true;
  }

  public function isEnabled() {
    return $this->isActive;
  }

  /** @see \Serializable::serialize() */
  public function serialize() {
    return serialize(array(
      $this->id,
      $this->username,
      $this->password,
      $this->isActive
      // see section on salt below
      // $this->salt,
    ));
  }

  /** @see \Serializable::unserialize() */
  public function unserialize($serialized) {
    list (
      $this->id,
      $this->username,
      $this->password,
      $this->isActive
      // see section on salt below
      // $this->salt
      ) = unserialize($serialized);
  }

}
