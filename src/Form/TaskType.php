<?php
namespace App\Form;
 
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
//use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Task;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array('label' => 'Ваше имя'))
            ->add('birthday', DateType::class, array('widget' => 'single_text', 'label' => 'Дата рождения'))
            ->add('email', EmailType::class, array('label' => 'Е-mail'))
            ->add('phone', TelType::class, array('label' => 'Телефон'))
            ->add('task', TextareaType::class, array('label' => 'Суть Вашей проблемы'))
            ->add('photo', FileType::class, array('label' => 'Загрузите Ваше фото'))
            ->add('morePhoto', FileType::class, array('multiple' => true, 'label' => 'И фотографии, относящиеся к делу'))
            //->add('save', SubmitType::class, array('label' => 'Отправить'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Task::class,
        ));
    }    
}