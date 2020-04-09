<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class ImageField extends Component
{
    public $name;
    public $label;
    public $path;

    /**
     * @return void
     */
    public function __construct($name, $label, $path)
    {
        $this->name = $name;
        $this->label = $label;
        $this->path = $path;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.-image-field');
    }
}
