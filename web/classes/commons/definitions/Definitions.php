<?php

require_once(_ENV_PROJECT_BASE . "/classes/commons/component/PageContext.class.php");
require_once(_ENV_PROJECT_BASE . "/classes/commons/definitions/models/Page.php");
require_once(_ENV_PROJECT_BASE . "/classes/commons/definitions/models/PageType.php");
require_once(_ENV_PROJECT_BASE . "/classes/commons/definitions/models/Site.php");
require_once(_ENV_PROJECT_BASE . "/classes/commons/definitions/models/SiteType.php");
require_once(_ENV_PROJECT_BASE . "/classes/commons/definitions/models/Template.php");
require_once(_ENV_PROJECT_BASE . "/classes/commons/definitions/models/User.php");
require_once(_ENV_PROJECT_BASE . "/classes/commons/definitions/PropArray.php");
require_once(_ENV_PROJECT_BASE . "/classes/commons/definitions/WidgetFactory.php");

class Definitions
{

    private $_page;
    private $_pageType;
    private $_properties;
    private $_site;
    private $_siteType;
    private $_template;
    private $_user;
    private $_disableLastModified;

    public function setSite(Site $site)
    {
        $this->_site = $site;
        $this->_siteType = SiteType::get($site->type);
        $this->updateProperties();
    }

    public function setPage(Page $page)
    {
        $this->_page = $page;
        $this->_pageType = PageType::get($page->type);
        $this->_template = Template::get($page->template);
        $this->updateProperties();
    }

    public function setUser(User $user)
    {
        $this->_user = $user;
    }

    protected function updateProperties()
    {
        if (!$this->_site || !$this->_page) {
            return;
        }

        $this->_properties = new PropArray();
        $this->_properties->merge(
            $this->_siteType->properties,
            $this->_pageType->properties,
            $this->_template->properties,
            $this->_site->properties,
            $this->_page->properties
        );
    }

    public function getWidgets($config, $context)
    {
        $wf = new WidgetFactory($config, $context);
        $this->_page->parsePageData($wf);
        $this->_disableLastModified = $wf->hasCreated("Tumblr");

        return array(
            "masterComponentList" => $wf->widgets,
            "regions" => $this->_page->regions,
        );
    }

    public function updateSystemProperties()
    {
        global $systemProperties;
        $systemProperties["properties"] = $this->_properties->toNestedArray();
        $systemProperties["system"] = array();

        // User related
        $systemProperties["system"]["isWhiteLabel"] = $this->_user->isWhiteLabel();
        $systemProperties["system"]["partnerFooterUrl"] = $this->_user->getPartnerFooterUrl();
        $systemProperties["system"]["partnerId"] = $this->_user->partner_id;
        $yolafooter = $this->_user->features["yola_footer"];
        $storeId = "";
        if (array_key_exists("ecwid_store_id", $this->_user->preferences)) {
            $storeId = $this->_user->preferences["ecwid_store_id"];
        }
        $purchased = array(
            "css_overrides" => $this->_user->features["css_overrides"],
            "custom_tracking" => $this->_user->features["custom_tracking"],
            "ecommerce" => array(
                "enabled" => $this->_user->features["ecommerce"]["enabled"],
                "storeId" => $storeId,
            ),
            "yola_footer_removal" => array("enabled" => $yolafooter["removed"]),
        );
        $systemProperties["system"]["purchased"] = $purchased;
        $systemProperties["system"]["user"] = array(
            "id" => $this->_user->id,
            "signupDate" => $this->_user->signupDate,
        );

        // Site related
        $systemProperties["system"]["facebookPageId"] = $this->_site->facebookPageId;
        $systemProperties["system"]["locale"] = $this->_site->locale;
        $systemProperties["system"]["site"] = array(
            "auth" => $this->_site->auth,
            "facebookPageId" => $this->_site->facebookPageId,
            "id" => $this->_site->id,
            "name" => $this->_site->name,
            "navigation" => $this->_site->navigation,
        );

        // Template basics
        $systemProperties["system"]["template"] = array(
            "author" => array(),
            "mobile" => array("name" => "Mobile"),
            "name" => $this->_template->id,
        );

        // Page related
        $lastModified = "-1";
        if (!$this->_disableLastModified) {
            $lastModified = substr((string)$this->_page->lastSaved, 0, 10);
        }
        $name = $this->_page->name . ".php";
        $systemProperties["system"]["page"] = array(
            "etag" => $this->_page->etag,
            "id" => $this->_page->id,
            "lastModified" => $lastModified,
            "layout" => $this->_page->getLayout(),
            "name" => $name,
            "protected" => "false",
            "type" => $this->_pageType->name,
        );
    }

    public static function parse($data)
    {
        $page = Page::deserialize($data['page']);
        $site = Site::deserialize($data['site']);
        $user = User::deserialize($data['user']);
        $d = new Definitions();
        $d->setPage($page);
        $d->setSite($site);
        $d->setuser($user);
        return $d;
    }
}
