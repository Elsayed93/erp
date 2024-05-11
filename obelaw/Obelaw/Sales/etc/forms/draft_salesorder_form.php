<?php

use Obelaw\Sales\Models\Customer;
use Obelaw\UI\Schema\Form\Fields;
use Obelaw\UI\Schema\Form\FieldType;

return new class
{
    public function form(Fields $form)
    {
        $form->addField(FieldType::SELECT, [
            'label' => 'Customer',
            'model' => 'customer_id',
            'options' => [
                'model' => Customer::class,
                'row' => [
                    'label' => 'name',
                    'value' => 'id',
                ]
            ],
            'rules' => 'required',
            'order' => 10,
            'hint' => 'You can choose the customer for whom you want to create a sales order.',
        ]);
    }
};
