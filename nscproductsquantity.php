<?php

//verificamos si está definida la versión del prestashop por temas de seguridad
if(!defined('_PS_VERSION_')){
    exit;
}

//camelcase para la clase que es el nombre de nuestro módulo pero cada palabra en mayúsculas
class NscProductsQuantity extends Module 
{
    public function __construct()
    {
    	//identificador interno, el valor debe ser el nombre de la carpeta no usar caracteres especiales ni espacios y debe estar en minúsculas.
        $this->name = 'nscproductsquantity';
        //se indica en donde aparecerá el módulo
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Guillermo Morillo';
        //para poder utilizar bootstrap en el módulo
        $this->bootstrap = true;
        $this->ps_version_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        $this->displayName = 'NSC PRODUCTS QUANTITY';
        $this->description = 'Mostrar Cantidad de productos seleccionada';
        parent::__construct();
        //definiendo hooks para el módulo
        $this->displayName = $this->l('NSC PRODUCTS QUANTITY');
        $this->description = $this->l('Mostrar Cantidad de productos seleccionada');
    }

    //se llama al método padre INSTALL
    public function install()
    {
        // !$this->registerHook('displayProductAdditionalInfo') --> esto sirve para decirle a que hook va a pertenecer o donde se va a ver nuestro módulo
    	if(!parent::install() || 
            !Configuration::updateValue('OPCION_1', '25') || 
            !Configuration::updateValue('OPCION_2', '50') || 
            !Configuration::updateValue('OPCION_3', '75') || 
            !Configuration::updateValue('OPCION_4', '100') ||
            !Configuration::updateValue('PS_PRODUCTS_PER_PAGE', '25') ||  
            !$this->registerHook('displayProductsQuantity'))
        {
            return false;
        }else{
            return true;
        }
    }

    public function uninstall()
    {
    	if(!parent::uninstall() || 
            !Configuration::deleteByName('OPCION_1') || 
            !Configuration::deleteByName('OPCION_2') || 
            !Configuration::deleteByName('OPCION_3') || 
            !Configuration::deleteByName('OPCION_4')) 
    		return false;
    	return true;
    }

    //para boton de configurar en la parte administrativa
    public function getContent()
    {   
        //para que se muestre mensaje de error si no se guardaron los cambios exitosamente. luego se le pasa la variable "save" a configure.tpl
        $this->smarty->assign('save',false);
        //para saber si se ha hecho click enb el boton del formulario
        if(Tools::isSubmit('submitNscProductsQuantity'))
        {
            //la variable $myurl puede tener cualquier nombre, getValue es para recuperar el dato del formulario en este caso del input
            $opcion1 = Tools::getValue('opcion1');
            $opcion2 = Tools::getValue('opcion2');
            $opcion3 = Tools::getValue('opcion3');
            $opcion4 = Tools::getValue('opcion4');
            //se le indica a OPCION_1 el nuevo valor que va a tener
            Configuration::updateValue('OPCION_1', $opcion1);
            Configuration::updateValue('OPCION_2', $opcion2);
            Configuration::updateValue('OPCION_3', $opcion3);
            Configuration::updateValue('OPCION_4', $opcion4);
            Configuration::updateValue('PS_PRODUCTS_PER_PAGE', $opcion1);
            //para que se muestre mensaje de actualización correcta cuandos e actualize el módulo.luego se le pasa la variable "save" a configure.tpl
            $this->smarty->assign('save',true);
        }
        //variable que se va a mostrar en el tpl cuando se realize el guardado mediante el boton
        $opcion1 = Configuration::get('OPCION_1');
        $opcion2 = Configuration::get('OPCION_2');
        $opcion3 = Configuration::get('OPCION_3');
        $opcion4 = Configuration::get('OPCION_4');
        $this->smarty->assign('opcion1', $opcion1);
        $this->smarty->assign('opcion2', $opcion2);
        $this->smarty->assign('opcion3', $opcion3);
        $this->smarty->assign('opcion4', $opcion4);
        return $this->display(__FILE__,'configure.tpl');
    }

    // se crea la función que retornará lo que nosotros queramos que se vea en el hook
    public function hookDisplayProductsQuantity($params){
        $opcion1 = Configuration::get('OPCION_1');
        $opcion2 = Configuration::get('OPCION_2');
        $opcion3 = Configuration::get('OPCION_3');
        $opcion4 = Configuration::get('OPCION_4');
        $allProducts = 9999;
        $productperpage = Configuration::get('PS_PRODUCTS_PER_PAGE');
        $this->smarty->assign('opcion1', $opcion1);
        $this->smarty->assign('opcion2', $opcion2);
        $this->smarty->assign('opcion3', $opcion3);
        $this->smarty->assign('opcion4', $opcion4);
        $changeStringValue = ($_SERVER['QUERY_STRING'] !== '') ? '&' : '?';
        $this->smarty->assign('urlParams', $this->context->shop->getBaseURL(true, false).$_SERVER['REQUEST_URI'] . $changeStringValue);
        $this->smarty->assign('allProducts', $allProducts);
        $this->smarty->assign('productosAdmin', $productperpage);
        return $this->display(__FILE__,'displayProductsQuantity.tpl');
    }
}