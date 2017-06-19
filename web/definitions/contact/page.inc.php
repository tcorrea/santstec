<?php
global $systemProperties;

require_once (_ENV_COMMONS_CLASSPATH . 'config' . DIRECTORY_SEPARATOR . 'Configuration.php');
require_once (_ENV_COMMONS_CLASSPATH . 'component' . DIRECTORY_SEPARATOR . 'PageContext.class.php');

$config = new Configuration();
$pageContext = new PageContext();
$masterComponentList = array();
$pageProperties = array();

//Page Level Properties
$systemProperties['system']['page'] = array();
$systemProperties['system']['page']['id'] = '5065f84c6b21466fa725d24af90a21b4';
$systemProperties['system']['page']['name'] = 'contact.php';
$systemProperties['system']['page']['type'] = 'Page';
$systemProperties['system']['page']['protected'] = 'false';
$systemProperties['system']['page']['layout'] = 'layout_A';
$systemProperties['system']['page']['lastModified'] = '1490906775';
$systemProperties['system']['page']['etag'] = '14c1c12f9e2b3a933087e7e0cf3923a8';

            $systemProperties['properties']['body']['background-color'] = '#2f2c2a';
                $systemProperties['properties']['logo']['src'] = '';
                $systemProperties['properties']['heading']['text'] = 'santstec';
                $systemProperties['properties']['banner']['src'] = 'resources/site_em_construcao.png';
                $systemProperties['properties']['heading']['style'] = '';
                $systemProperties['properties']['banner']['display'] = 'block';
                $systemProperties['properties']['layout']['lock'] = 'false';
                $systemProperties['properties']['body']['background-attachment'] = 'fixed';
                $systemProperties['properties']['title']['text'] = 'santstec';
                $systemProperties['properties']['body']['background-position'] = 'top left';
                $systemProperties['properties']['body']['background-repeat'] = 'repeat';
                $systemProperties['properties']['logo']['background-color'] = '';
                $systemProperties['properties']['meta']['keywords'] = '';
                $systemProperties['properties']['meta']['description'] = '';
                $systemProperties['properties']['logo']['visible'] = '';
                $systemProperties['properties']['banner']['background-color'] = '';
                $systemProperties['properties']['body']['background-image'] = '';
    
$pageProperties['regions'] = array();

//Define the regions for the page
	$pageProperties['regions']['sys_region_1'] = array();
		
					
		//Text_2 Component
		$text_2_17_componentProps = array();
                        $text_2_17_componentProps['id'] = 'I17';
                        $text_2_17_componentProps['sys_displayType'] = 'block';
                        $text_2_17_componentProps['sys_layoutName'] = 'Default';
                        $text_2_17_componentProps['sys_className'] = 'Text_2_Default';
                        $text_2_17_componentProps['sys_hasCSS'] = false;
                        $text_2_17_componentProps['sys_hasDynamicCSS'] = false;


                                                                    $text_2_17_componentProps['margin'] = '';
                                                                                            $text_2_17_componentProps['padding'] = '';
                                                                                            $text_2_17_componentProps['text'] = '<p>&nbsp;</p>';
                                                        	
		//Add the 'Text_2' component to the region
                require_once (_ENV_COMPONENT_CLASSPATH . "Text_2/Text_2.class.php");
		$text_2_17 = new Text_2($pageContext, $text_2_17_componentProps, $config);
		$masterComponentList[] = $text_2_17;		
		$pageProperties['regions']['sys_region_1'][] = $text_2_17;

					
		//Layout1 Component
		$layout1_20_componentProps = array();
                        $layout1_20_componentProps['id'] = 'I20';
                        $layout1_20_componentProps['sys_displayType'] = 'block';
                        $layout1_20_componentProps['sys_layoutName'] = 'Default';
                        $layout1_20_componentProps['sys_className'] = 'Layout1_Default';
                        $layout1_20_componentProps['sys_hasCSS'] = false;
                        $layout1_20_componentProps['sys_hasDynamicCSS'] = false;


                                                                    $layout1_20_componentProps['lw'] = '50%';
                                                                                            $layout1_20_componentProps['margin'] = '';
                                                                                            $layout1_20_componentProps['rw'] = '50%';
                                                                                            $layout1_20_componentProps['left_column']['padding'] = '0 15px 0 0';
                                                                                            $layout1_20_componentProps['right_column']['padding'] = '0 0 0 15px';
                                                        		//Find regions for this component
										
				//Image Component
				$image_22_componentProps = array();			
                                        $image_22_componentProps['id'] = 'I22';
                                        $image_22_componentProps['sys_displayType'] = 'block';
                                        $image_22_componentProps['sys_layoutName'] = 'Default';
                                        $image_22_componentProps['sys_className'] = 'Image_Default';
                                        $image_22_componentProps['sys_hasCSS'] = false;
                                        $image_22_componentProps['sys_hasDynamicCSS'] = false;

				                                                                                    $image_22_componentProps['alt'] = '';
                                        				                                                                                    $image_22_componentProps['imgwidth'] = '402px';
                                        				                                                                                    $image_22_componentProps['link']['href'] = '';
                                        				                                                                                    $image_22_componentProps['link']['target'] = '';
                                        				                                                                                    $image_22_componentProps['margin'] = '0';
                                        				                                                                                    $image_22_componentProps['optimize'] = 'n';
                                        				                                                                                    $image_22_componentProps['padding'] = '';
                                        				                                                                                    $image_22_componentProps['position'] = 'left';
                                        				                                                                                    $image_22_componentProps['src'] = '//assets.yolacdn.net/template_assets/haystack/resources/bicycle.jpg';
                                        					
					                                
                                //Add the 'Image' component to the region
                                require_once (_ENV_COMPONENT_CLASSPATH . "Image/Image.class.php");
				$image_22 = new Image($pageContext, $image_22_componentProps, $config);
				$masterComponentList[] = $image_22;
				$layout1_20_componentProps['regions']['Right'][] = $image_22;	
													
				//Form Component
				$form_21_componentProps = array();			
                                        $form_21_componentProps['id'] = 'I21';
                                        $form_21_componentProps['sys_displayType'] = 'block';
                                        $form_21_componentProps['sys_layoutName'] = 'Default';
                                        $form_21_componentProps['sys_className'] = 'Form_Default';
                                        $form_21_componentProps['sys_hasCSS'] = false;
                                        $form_21_componentProps['sys_hasDynamicCSS'] = false;

				                                                                                    $form_21_componentProps['destination'] = '7m-LLhh9gLkABP24k5KBmB6q0zuc_6CqE7KFBY6KaWXx2BrXcw==:6U3BgMpLs5HJNsIA-RUgAh1o9tdSi7vgf88F_KXwJFg=';
                                        				                                                                                    $form_21_componentProps['email'] = 'vsm.valdeir@gmail.com';
                                        				                                                                                    $form_21_componentProps['json'] = '{"fields": [{"defaultValue": "", "type": "text", "id": 0, "label": "Your name"}, {"defaultValue": "", "type": "text", "id": 1, "label": "Your email"}, {"defaultValue": "", "type": "textarea", "id": 2, "label": "Message"}, {"type": "captcha", "id": 3, "label": null}], "heading": "", "submit": "Submit"}';
                                        				                                                                                    $form_21_componentProps['pageId'] = '5065f84c6b21466fa725d24af90a21b4';
                                        				                                                                                    $form_21_componentProps['siteId'] = 'c8ad2363d34541c3b52415ac7eba90cc';
                                        				                                                                                    $form_21_componentProps['successMessage'] = 'Your form has been successfully submitted! Thank you!';
                                        				                                                                                    $form_21_componentProps['userId'] = 'dc332f5e41f94759983540728d3e1743';
                                        					
					                                
                                //Add the 'Form' component to the region
                                require_once (_ENV_COMPONENT_CLASSPATH . "Form/Form.class.php");
				$form_21 = new Form($pageContext, $form_21_componentProps, $config);
				$masterComponentList[] = $form_21;
				$layout1_20_componentProps['regions']['Left'][] = $form_21;	
						
		//Add the 'Layout1' component to the region
                require_once (_ENV_COMPONENT_CLASSPATH . "Layout1/Layout1.class.php");
		$layout1_20 = new Layout1($pageContext, $layout1_20_componentProps, $config);
		$masterComponentList[] = $layout1_20;		
		$pageProperties['regions']['sys_region_1'][] = $layout1_20;

	
$pageProperties['masterComponentList'] = $masterComponentList;

?>
