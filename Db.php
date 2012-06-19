<?php
/**
 * @category   Zx
 * @copyright  Copyright (c) 2009-2012 Bal‡zs Micskey
 * @license    New BSD License
 */
class Zx_Translate_Adapter_Db extends Zend_Translate_Adapter
{
    
    private $_data = array();

    /**
     * Load translation data
     *
     * @param  string        $data    Not used in this context
     * @param  string        $locale  Locale/Language to add data for, identical with locale identifier,
     *                                see Zend_Locale for more information
     * @param  array         $options Not used in this context
     * @return array         translation data in associative array
     */
    protected function _loadTranslationData($data, $locale, array $options = array())
    {

        $db = Zend_Registry::get('db');
        
        $_translations = new Application_Model_DbTable_Translations( array( 'db' => $db ) );
        
        if ( $this->hasCache() ){
            $translations = $_translations->getAllForCache();
        }else{
            $translations = $_translations->getListByLocale( $locale );
        }

        foreach ( $translations as $translation ){
            
            if ( $this->hasCache() ){
                $this->_data[$translation['locale']][$translation['msgid']] = $translation['msgstring'];
            }else{
                $this->_data[$locale][$translation['msgid']] = $translation['msgstring'];
            }
        }
        
        if ( !is_array( $this->_data[$locale] ) ){
            $this->_data[$locale] = array('0' => false);
        }
        

        return $this->_data;
    }

    /**
     * @desc returns the adapters name
     * @return string
     */
    public function toString()
    {
        return "Db";
    }
}
