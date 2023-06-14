<?php

namespace App\Containers\Indicator\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class IndicatorNav extends Component
{
    /**
     * The alert type.
     *
     * @var string
     */
    public $type;

    /**
     * The alert message.
     *
     * @var string
     */
    public $message;

    /**
     * Create the component instance.
     *
     * @param string $type
     * @param string $message
     * @return void
     */
    public function __construct()
    {
       /* $this->type = $type;
        $this->message = $message;*/
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */

    public function render()
    {
        return view('components.indicator-nav');
    }
}
