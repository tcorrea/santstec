<?php

/**
 * @author <a href = mailto:stefan.l@incubeta.com>Stefan Lourens</a>
 */

 //error_reporting(0);

 abstract class ComponentBase {

    public $config;

    private $componentProperties = null;
    private $pageContext;
    private $styleName;
    private $templateDir;
    private $className;
    private $smarty;


    /*
     * Forces components to accept the component xml
     * as a constructor argument.c
     */
    final public function __construct(
        PageContext $pageContext,
        array $componentProperties,
        Configuration $config = null
    ) {

        global $systemProperties;

        $this->config = $config;
        $this->pageContext = $pageContext;
        $this->componentProperties = $componentProperties;

        $this->className = get_class($this);
        $this->styleName = $this->getComponentProperty('sys_layoutName');

        $this->template_dir = _ENV_COMPONENT_CLASSPATH . $this->className . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . $this->styleName;
                $this->locale_dir = _ENV_COMPONENT_CLASSPATH . $this->className . DIRECTORY_SEPARATOR . 'locale';

        //Construct & init smarty object
        $this->smarty = new Smarty();
        $this->smarty->compile_dir = _ENV_SMARTY_CACHE_PATH;

        $this->smarty->left_delimiter = '<%';
        $this->smarty->right_delimiter = '%>';

        //TODO Remove after DEV
        $this->smarty->clear_all_cache();

        //Setup smarty paths
        $this->smarty->plugins_dir[] = _ENV_COMMONS_CLASSPATH . 'lib' . DIRECTORY_SEPARATOR . 'smarty_plugins';

        //Assign variables
        $this->smarty->assign('config', $this->config);
        $this->smarty->assign('properties', $this->getComponentProperties());
        $this->smarty->assign('pageContext', $this->getPageContext());

        //Supply system info
        $systemProperties['mode'] = @_SYSTEM_MODE;
        $systemProperties['action'] = @_SYSTEM_ACTION;

        $this->smarty->assign('system', $systemProperties);

    }

    /*
     * This method should be used to prepare the component
     * for rendering, collecting data ect.
     */
    public abstract function subscriberInit();

    /*
     * This method should be used to prepare the component
     * for rendering, collecting data ect. All seeding components
     * will be instanciated and publisherInit() will be called before
     * any rendering occurs, so the exsposeProperty(String $name, $value)
     * can only be used in the publisherInit() method.
     */
    public abstract function publisherInit();

    public function render() {
        //Render default tempalte
        $this->renderTemplate($this->styleName);
    }

    /*
     * Apply the component's template
     */
    public function renderTemplate($templateName) {

        if (_SYSTEM_MODE == "DESIGN") {
            //echo _SYSTEM_ACTION;
            if (_SYSTEM_ACTION != 'REFRESH') {

                echo '  <div class="sys_wrap" id="' . $this->getComponentProperty("id") . '_wrap">';
                echo '      <div class="sys_wrap_title" id="' . $this->getComponentProperty("id") . '_title">';
                echo '          <table border="0" cellpadding="0" cellspacing="0" style="width:100%">';
                echo '              <tr>';
                echo '                  <td id="' . $this->getComponentProperty("id") . '_tools" class="sys_wrap_tools"></td>';
                echo '                  <td style="width:20px;"><span id="' . $this->getComponentProperty("id") . '_delete" class="sys_wrap_x">x</span></td>';
                echo '              </tr>';
                echo '          </table>';
                echo '      </div>';
                echo '      <div id="' . $this->getComponentProperty("id") . '_cwrap">';
            }

        }

        $this->smarty->display($this->template_dir . DIRECTORY_SEPARATOR . $templateName . '.tpl');

        if(_SYSTEM_MODE == "DESIGN") {
            if (_SYSTEM_ACTION != 'REFRESH') {
                echo '      </div>';
                echo '  </div>';
            }
        }
    }



    /*
     * Gets a spicific component property, using the given name
     */
    public final function getComponentProperty($name) {
        if (array_key_exists($name, $this->componentProperties)) {
            return $this->componentProperties[$name];
        } else {
            return null;
        }
    }

   /**
    * Print out component properties
    */
    public function debugProperties() {
        echo "<pre>";
        print_r($this->componentProperties);
        echo "</pre>";
    }

    /*
     * Returns the Array containing all the components properties
     */
    public final function getComponentProperties() {
        return $this->componentProperties;
    }

    public final function getPageContext() {
        return $this->pageContext;
    }

    public final function addTemplateVariable($name, $value) {
        //$this->templateVars[$name] = $value;
        $this->smarty->assign($name, $value);
    }

    /***************************************
     * Don't know is this is needed
     ***************************************/

    public final function getParameter($name, $checkStateVars = true) {
        $componentId = $this->getComponentProperty('id');
        $targetedName = $componentId . '_' . $name;
        //$targetedName = substr($componentId, 3);
        //$targetedName .= '_' . $name;

        if (array_key_exists($targetedName, $_REQUEST)) {
            return $_REQUEST[$targetedName];
        }
        elseif (array_key_exists($name, $_REQUEST)) {
            return $_REQUEST[$name];
        } else {
            return null;
        }
    }

}
?>
