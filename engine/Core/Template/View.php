<?php

namespace Engine\Core\Template;

use Engine\DI\DI;

class View
{
    /**
     * @var \Engine\DI\DI
     */
    public $di;

    /**
     * @var \Engine\Core\Template\Theme
     */
    protected $theme;

    /**
     * @var DaysTemplate
     */
    protected $days;

    /**
     * @var Timing
     */
    protected $timing;

    /**
     * @var CoachTemplate
     */
    protected $coach;

    /**
     * @var ConceptsTemplate
     */
    protected $concepts;

    /**
     * View constructor.
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        $this->di      = $di;
        $this->theme   = new Theme();
        $this->days    = new DaysTemplate($di);
        $this->timing    = new TimingTemplate($di);
        $this->coach    = new CoachTemplate($di);
        $this->concepts    = new ConceptsTemplate($di);
    }

    /**
     * @param $template
     * @param array $data
     * @throws \Exception
     */
    public function render($template, $data = [])
    {
        $functions = Theme::getThemePath() . '/functions.php';
        if (file_exists($functions)) {
            include_once $functions;
        }

        $templatePath = $this->getTemplatePath($template, ENV);

        if (!is_file($templatePath)) {
            throw new \InvalidArgumentException(
                sprintf('Template "%s" not found in "%s"', $template, $templatePath)
            );
        }

        // Add language in this template
        $data['lang'] = $this->di->get('language');

        $this->theme->setData($data);

        extract($data);
        ob_start();
        ob_implicit_flush(0);

        try {
            require($templatePath);
        } catch (\Exception $e){
            ob_end_clean();
            throw $e;
        }

        echo ob_get_clean();
    }


    /**
     * @param $template
     * @param null $env
     * @return string
     */
    private function getTemplatePath($template, $env = null)
    {
        if ($env === 'Cms') {
            return ROOT_DIR . '/content/themes/default/' . $template . '.php';
        }

        return path('view') . '/' . $template . '.php';
    }
}