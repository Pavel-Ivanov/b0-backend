<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class TextField extends Component
{
    public $name;
    public $label;

    /**
     * @param string $name
     * @param string $label
     */
    public function __construct($name, $label)
    {
        $this->name = $name;
        $this->label = $label;
    }

    /**
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.-text-field');
    }
}
