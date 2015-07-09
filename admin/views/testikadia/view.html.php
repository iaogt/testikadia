<?php

	class testikadiaViewtestikadia extends JViewLegacy {
		
		function display($tpl=null){
			$this->arrDatos = $this->get('list');
			$this->arrTypes = $this->get('exttypes');
			$this->addToolbar();
			parent::display($tpl);
			$this->setDocument();
		}
		/**
		 * Adds javascript
		 * */
		protected function setDocument(){
			JHtml::_('jquery.framework');   // Make sure jQuery is loaded before component JS
			JHtml::stylesheet('http://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css');
			JHtml::script('http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js');
		}
		
		/**
		 * Decorations
		 * */
		protected function addToolbar(){
			JToolBarHelper::title(JText::_('COM_TESTIKADIA_TITLE'));
		}
	}
?>