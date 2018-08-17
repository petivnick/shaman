<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Task
{
    /**
     * @Assert\NotBlank(message="task.name.not_blank")
     */
    protected $name;

    protected $birthday;

    /**
     * @Assert\NotBlank()
     */   
    protected $email;

    protected $phone;

    /**
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    protected $photo;

    /**
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */    
    protected $morePhoto;

    protected $task;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTime $birthday = null)
    {
        $this->birthday = $birthday;
    }    
    
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    } 

    public function getPhone()
    {
        return $this->phone;
    }    

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getTask()
    {
        return $this->task;
    }

    public function setTask($task)
    {
        $this->task = $task;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function getMorePhoto()
    {
        return $this->morePhoto;
    }

    public function setMorePhoto($morePhoto)
    {
        $this->morePhoto = $morePhoto;
    }    
}    