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
$systemProperties['system']['page']['id'] = 'ebabb286e9044b4dab44eb193e360417';
$systemProperties['system']['page']['name'] = 'index.php';
$systemProperties['system']['page']['type'] = 'Page - Super Flat';
$systemProperties['system']['page']['protected'] = 'false';
$systemProperties['system']['page']['layout'] = 'layout_A';
$systemProperties['system']['page']['lastModified'] = '1490906775';
$systemProperties['system']['page']['etag'] = '5ffd7dcdf38dd310f2c1f43098c96bcb';

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
		$text_2_1_componentProps = array();
                        $text_2_1_componentProps['id'] = 'I1';
                        $text_2_1_componentProps['sys_displayType'] = 'block';
                        $text_2_1_componentProps['sys_layoutName'] = 'Default';
                        $text_2_1_componentProps['sys_className'] = 'Text_2_Default';
                        $text_2_1_componentProps['sys_hasCSS'] = false;
                        $text_2_1_componentProps['sys_hasDynamicCSS'] = false;


                                                                    $text_2_1_componentProps['margin'] = '0 0 0 0';
                                                                                            $text_2_1_componentProps['padding'] = '';
                                                                                            $text_2_1_componentProps['text'] = '<p>&nbsp;</p>';
                                                        	
		//Add the 'Text_2' component to the region
                require_once (_ENV_COMPONENT_CLASSPATH . "Text_2/Text_2.class.php");
		$text_2_1 = new Text_2($pageContext, $text_2_1_componentProps, $config);
		$masterComponentList[] = $text_2_1;		
		$pageProperties['regions']['sys_region_1'][] = $text_2_1;

					
		//Layout1 Component
		$layout1_3_componentProps = array();
                        $layout1_3_componentProps['id'] = 'I3';
                        $layout1_3_componentProps['sys_displayType'] = 'block';
                        $layout1_3_componentProps['sys_layoutName'] = 'Default';
                        $layout1_3_componentProps['sys_className'] = 'Layout1_Default';
                        $layout1_3_componentProps['sys_hasCSS'] = false;
                        $layout1_3_componentProps['sys_hasDynamicCSS'] = false;


                                                                    $layout1_3_componentProps['lw'] = '50%';
                                                                                            $layout1_3_componentProps['margin'] = '0 0 0 0';
                                                                                            $layout1_3_componentProps['rw'] = '50%';
                                                                                            $layout1_3_componentProps['left_column']['padding'] = '0';
                                                                                            $layout1_3_componentProps['right_column']['padding'] = '0';
                                                        		//Find regions for this component
										
				//Layout1 Component
				$layout1_5_componentProps = array();			
                                        $layout1_5_componentProps['id'] = 'I5';
                                        $layout1_5_componentProps['sys_displayType'] = 'block';
                                        $layout1_5_componentProps['sys_layoutName'] = 'Default';
                                        $layout1_5_componentProps['sys_className'] = 'Layout1_Default';
                                        $layout1_5_componentProps['sys_hasCSS'] = false;
                                        $layout1_5_componentProps['sys_hasDynamicCSS'] = false;

				                                                                                    $layout1_5_componentProps['lw'] = '50%';
                                        				                                                                                    $layout1_5_componentProps['margin'] = '';
                                        				                                                                                    $layout1_5_componentProps['rw'] = '50%';
                                        				                                                                                    $layout1_5_componentProps['left_column']['padding'] = '0';
                                        				                                                                                    $layout1_5_componentProps['right_column']['padding'] = '0';
                                        					
						//Find regions for this component
													                                
                                //Add the 'Layout1' component to the region
                                require_once (_ENV_COMPONENT_CLASSPATH . "Layout1/Layout1.class.php");
				$layout1_5 = new Layout1($pageContext, $layout1_5_componentProps, $config);
				$masterComponentList[] = $layout1_5;
				$layout1_3_componentProps['regions']['Right'][] = $layout1_5;	
													
				//Layout1 Component
				$layout1_4_componentProps = array();			
                                        $layout1_4_componentProps['id'] = 'I4';
                                        $layout1_4_componentProps['sys_displayType'] = 'block';
                                        $layout1_4_componentProps['sys_layoutName'] = 'Default';
                                        $layout1_4_componentProps['sys_className'] = 'Layout1_Default';
                                        $layout1_4_componentProps['sys_hasCSS'] = false;
                                        $layout1_4_componentProps['sys_hasDynamicCSS'] = false;

				                                                                                    $layout1_4_componentProps['lw'] = '50%';
                                        				                                                                                    $layout1_4_componentProps['margin'] = '';
                                        				                                                                                    $layout1_4_componentProps['rw'] = '50%';
                                        				                                                                                    $layout1_4_componentProps['left_column']['padding'] = '0';
                                        				                                                                                    $layout1_4_componentProps['right_column']['padding'] = '0';
                                        					
						//Find regions for this component
													                                
                                //Add the 'Layout1' component to the region
                                require_once (_ENV_COMPONENT_CLASSPATH . "Layout1/Layout1.class.php");
				$layout1_4 = new Layout1($pageContext, $layout1_4_componentProps, $config);
				$masterComponentList[] = $layout1_4;
				$layout1_3_componentProps['regions']['Left'][] = $layout1_4;	
						
		//Add the 'Layout1' component to the region
                require_once (_ENV_COMPONENT_CLASSPATH . "Layout1/Layout1.class.php");
		$layout1_3 = new Layout1($pageContext, $layout1_3_componentProps, $config);
		$masterComponentList[] = $layout1_3;		
		$pageProperties['regions']['sys_region_1'][] = $layout1_3;

	
$pageProperties['masterComponentList'] = $masterComponentList;

?>
