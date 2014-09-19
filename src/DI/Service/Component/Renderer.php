<?php
/**
 * This file is part of Vegas package
 * 
 * @author Arkadiusz Ostrycharz <arkadiusz.ostrycharz@gmail.com>
 * @copyright Amsterdam Standard Sp. Z o.o.
 * @homepage http://vegas-cmf.github.io
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Vegas\DI\Service\Component;
use Vegas\Mvc\View;

/**
 * Class Renderer
 * @package Vegas\DI\Service\Component
 */
class Renderer implements RendererInterface
{
    /**
     * View instance
     *
     * @var \Phalcon\Mvc\View
     */
    protected $view;

    /**
     * Name of module
     *
     * @var string
     */
    protected $moduleName;

    /**
     * Name of template
     *
     * @var string
     */
    protected $templateName;

    /**
     * {@inheritdoc}
     */
    public function __construct(\Phalcon\Mvc\View $view = null)
    {
        $this->view = $view;
    }

    /**
     * {@inheritdoc}
     */
    public function setModuleName($name)
    {
        $this->moduleName = $name;
        
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setTemplateName($name)
    {
        $this->templateName = $name;
        
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function render($params = array())
    {
        $currentViewsDir = $this->view->getViewsDir();
        $this->view->setViewsDir($this->getServiceViewPath());
        $this->view->disableLevel(View::LEVEL_LAYOUT);
        $content = $this->view->getRender('services', $this->templateName, $params);

        //rollback viewsDir
        $this->view->setViewsDir($currentViewsDir);
        return $content;
    }

    /**
     * {@inheritdoc}
     * @internal
     */
    private function getServiceViewPath()
    {
        $viewsDir = APP_ROOT . '/app/modules/' . $this->moduleName . '/views/';
        return $viewsDir;
    }
}