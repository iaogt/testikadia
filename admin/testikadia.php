<?php
	require_once(JPATH_COMPONENT.'/controller.php');
	
	$controller = JControllerLegacy::getInstance('testikadia');
	$controller->execute(JFactory::getApplication()->input->getCmd('task'));
	$controller->redirect();
	
?>