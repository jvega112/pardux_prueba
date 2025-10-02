<?php

namespace App\Form\Data;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class TaskData
{
    protected $id;
    protected $title;
    protected $description;
    protected $isCompleted;
//    protected $createAt;
    protected $createdBy;

	public function getId(){
		return $this->id;
	}

	public function setId( $id ){
		$this->id = $id;
	}

	public function getTitle(){
		return $this->title;
	}

	public function setTitle( $title ){
		$this->title = $title;
	}
    
    public function getDescription(){
		return $this->description;
	}

	public function setDescription( $description ){
		$this->description = $description;
	}
    
    public function getIsCompleted(){
		return $this->isCompleted;
	}

	public function setIsCompleted( $isCompleted ){
		$this->isCompleted = $isCompleted;
	}
    
    public function getCreateAt(){
		return $this->createAt;
	}

	public function setCreateAt( $createAt ){
		$this->createAt = $createAt;
	}
    
    public function getCreatedBy(){
		return $this->createdBy;
	}

	public function setCreatedBy( $createdBy ){
		$this->createdBy = $createdBy;
	}
    
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addConstraints([
//            new Assert\Callback('quantityValidate'),
        ]);
    }
    
//    public function quantityValidate( ExecutionContextInterface $context, $payload )
//    {
//        $quantity_max = ( $this->option_download === 'pdf-one' ) ? 2000 : 200;
//        if( $this->quantity > $quantity_max )
//        {
//            $context
//                ->buildViolation("Cantidad máxima de {$quantity_max}")
//                ->atPath('quantity')
//                ->addViolation();
//            
//            $context
//                ->buildViolation("La opción seleccionada permite generar {$quantity_max} en {$quantity_max}")
//                ->atPath('option_download')
//                ->addViolation();
//        }
//    }
}
