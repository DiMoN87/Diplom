<?php

namespace App\Http\Sections;

use SleepingOwl\Admin\Product\Display\DisplayInterface;
use SleepingOwl\Admin\Product\Form\FormInterface;
use SleepingOwl\Admin\Section;
use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SlepingOwn\Admin\Product\Initilizable;

/**
 * Class Product
 *
 * @property \App\Product $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Product extends Section implements  Initilizable
{

    protected  $model = "\App\Product";

    public function  initialize()
    {

        $this->addTonavigation($priority = 500, function () {
            return \App\Product:: count();

        });
        $this->creating(function ($config, \Illuminate\Database\Eloquent\Model $model) {

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
    protected $title;

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */


    public function onDisplay()
    {
        {
            return AdminDisplay::table()
                ->setHtmlAttribute('class', 'table-primary')
                ->setColumns(
                    AdminColumn::text('id', '#')->setWidth('30px'),
                    AdminColumn::text('name', 'Name')->setWidth('200px'),
                    AdminColumn::text('description', 'Описание'),
                    AdminColumn::text('price', 'Price')
                )->paginate(10);
        }
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Название настройки')->required(),
            AdminFormElement::text('value', 'Значение')->required(),
            AdminFormElement::textarea('description', 'Описание'),
            AdminFormElement::text('id', 'ID')->setReadonly(1),
            AdminFormElement::text('created_at')->setLabel('Создано')->setReadonly(1)

        ]);
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        //return $this->onEdit(null);
        return AdminForm::panel()->addBody([

            AdminFormElement::text('name', 'Title')->required(),
            AdminFormElement::text('prise', 'Price')->required()->unique(),
            AdminFormElement::ckeditor('description', 'Description')->required()



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
