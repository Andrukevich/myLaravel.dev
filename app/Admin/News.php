<?php

use App\News;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(News::class, function (ModelConfiguration $model) {
    $model->setTitle('News');
    // Display
    $model->onDisplay(function () {
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('id')->setLabel('ID')->setWidth('5%'),
            AdminColumn::link('title')->setLabel('Title')->setWidth('10%'),
            AdminColumn::text('slug')->setLabel('Slug')->setWidth('20%'),
            AdminColumn::text('description')->setLabel('Description')->setWidth('65%x'),
        ]);
        $display->paginate(15);
        return $display;
    });


    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::text('title', 'Title'),
            AdminFormElement::text('slug', 'Slug'),
            AdminFormElement::text('description', 'Description')
        );
        return $form;
    });


    $model->setMessageOnCreate('News created da ny');
    $model->setMessageOnDelete('News deleted vay vay vay');


})
    ->addMenuPage(News::class, 0)
    ->setIcon('fa fa-newspaper-o');