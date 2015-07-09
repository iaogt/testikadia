<?php
	/**
	 * Listado de componentes
	 * */
	class testikadiaModeltestikadia extends JModelItem {
		/**
		 * Devuelve un listado de componentes
		 * */
		public function getList(){
			$db    = JFactory::getDBO();
			$query = $db->getQuery(true);
			$query->select('extension_id,name,type,manifest_cache,enabled');
			$query->from('#__extensions');
			$query->where('protected=0');
			$db->setQuery($query); 
			$arrDatos = $db->loadRowList();
			if(!$arrDatos){
				$arrDatos= array();
			}
			return $arrDatos;
		}
		
		/**
		 * Returns different extension types
		 * */
		public function getExttypes(){
			$db    = JFactory::getDBO();
			$query = $db->getQuery(true);
			$query->select('distinct(type)');
			$query->from('#__extensions');
			$query->where('protected=0');
			$db->setQuery($query);
			$arrDatos = $db->loadRowList();
			if(!$arrDatos){
				$arrDatos= array();
			}
			return $arrDatos;
		}
		
		public function getSaludo(){
			return "Hola";
		}
	}
?>