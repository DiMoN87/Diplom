<?php

namespace App\Http\Sections;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SlepingOwn\Admin\Contractcts\Initilizable;


/**
 * Class Categories
 *
 * @property \App\Category $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Categories extends Section
{

    protected  $model = "\App\Categories";

    public function  initialize(){

        $this->addTonavigation($priority = 500, function(){
            return \App\Categories :: count();

         });
         $this->creating(function($config, \Illuminate\Database\Eloquent\Model $model){

         });
    }
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */

    protected $title = "Настройки категорий товаров";
    /**
     * @var string
     */
    protected $alias = 'categories';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::table()
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns(
                AdminColumn::text('id', '#')->setWidth('30px'),
                AdminColumn::text('title', 'Title'),
                AdminColumn::link('slug', 'Slug')
    )->paginate(10);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('id', 'ID#')->setReadonly(1),
            AdminFormElement::text('title', 'Title')->required(),
            AdminFormElement::text('slug', 'Slug')->required()->unique(),
            AdminFormElement::ckeditor('description', 'Description')->required(),
            AdminFormElement::text('created_at', 'Created')->setReadonly(1),


        ]);
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return AdminForm::panel()->addBody([

            AdminFormElement::text('title', 'Title')->required(),
            AdminFormElement::text('slug', 'Slug')->required()->unique(),
            AdminFormElement::ckeditor('description', 'Description')->required(),



        ]);
    }

    /**
     * @return void
     */
    public function onDelete($id)
    {
        // remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
