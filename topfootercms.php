<?php
if (! defined ( '_PS_VERSION_' ))
	exit ();
class TopFooterCMS extends Module {
	public $html = '';
	public function __construct() {
		$this->name = 'topfootercms';
		$this->tab = 'front_office_features';
		$this->author = 'Chantouch';
		$this->version = '0.0.1';
		$this->need_instance = 0;
		
		$this->bootstrap = TRUE;
		parent::__construct ();
		$this->displayName = $this->l ( 'Top Footer CMS' );
		$this->description = $this->l ( 'Add your top footer CMS for shop info to home tab block.' );
		$this->ps_versions_compliancy = array (
				min => ('1.6'),
				max => (_PS_VERSION_) 
		);
	}
	public function install() {
		return (parent::install () && $this->registerHook ( 'home' ) && $this->registerHook ( 'displayHeader' ));
	}
	public function uninstall() {
		if (! parent::uninstall () || ! Configuration::deleteByName ( 'topfootercms' )) {
			return FALSE;
		}
		return TRUE;
	}
	public function postProcess() {
		if (Tools::isSubmit ( 'cmsSubmit' . $this->name )) {
			$cms_shop_name = Tools::getValue ( 'cms_shop_name' );
			$cms_address_name = Tools::getValue ( 'cms_address_name' );
			$cms_shipping_name = Tools::getValue ( 'cms_shipping_name' );
			$cms_payment_name = Tools::getValue ( 'cms_payment_name' );
			$cms_shop_icon = Tools::getValue ( 'cms_shop_icon' );
			$cms_address_icon = Tools::getValue ( 'cms_address_icon' );
			$cms_shipping_icon = Tools::getValue ( 'cms_shipping_icon' );
			$cms_payment_icon = Tools::getValue ( 'cms_payment_icon' );
			$cms_shop_link = Tools::getValue ( 'cms_shop_link' );
			$cms_shopaddress_link = Tools::getValue ( 'cms_shopaddress_link' );
			$cms_shipping_link = Tools::getValue ( 'cms_shipping_link' );
			$cms_payment_link = Tools::getValue ( 'cms_payment_link' );
			
			if (
					! ($cms_address_name) && empty ( $cms_address_name ) || 
					! ($cms_shipping_name) && empty ( $cms_shipping_name ) || 
					! ($cms_shop_name) && empty ( $cms_shop_name ) || 
					! ($cms_payment_name) && empty ( $cms_payment_name ) || 
					! ($cms_shop_link) && empty ( $cms_shop_link ) || 
					! ($cms_shopaddress_link) && empty ( $cms_shopaddress_link ) || 
					! ($cms_shipping_link) && empty ( $cms_shipping_link ) || 
					! ($cms_payment_link) && empty ( $cms_payment_link )
					) {
						
				return $this->displayError ( $this->l ( 'The required fields can not be blank.' ) );
				
			} elseif (isset ( $_FILES ['cms_shop_icon'] ) && isset ( $_FILES ['cms_shop_icon'] ['tmp_name'] ) && ! empty ( $_FILES ['cms_shop_icon'] ['tmp_name'] )) {
				if (ImageManager::validateUpload ( $_FILES ['cms_shop_icon'], 4000000 ))
					return $this->displayError ( $this->l ( 'Invalid image' ) );
				else {
					$ext = Tools::substr ( $_FILES ['cms_shop_icon'] ['name'], Tools::strrpos ( $_FILES ['cms_shop_icon'] ['name'], '.' ) + 1 );
					$file_name = md5 ( $_FILES ['cms_shop_icon'] ['name'] ) . '.' . $ext;
					if (! move_uploaded_file ( $_FILES ['cms_shop_icon'] ['tmp_name'], dirname ( __FILE__ ) . '/views/img/' . $file_name ))
						return $this->displayError ( $this->l ( 'An error occurred while attempting to upload the file.' ) );
					else {
						$file_path = dirname ( __FILE__ ) . '/views/img/' . Configuration::get ( 'cms_shop_icon' );
						
						if (Configuration::hasContext ( 'cms_shop_icon', null, Shop::getContext () ) && Configuration::get ( 'cms_shop_icon' ) != $file_name && file_exists ( $file_path ))
							unlink ( $file_path );
						
						Configuration::updateValue ( 'cms_shop_icon', $file_name );
						$this->_clearCache ( 'topfootercms.tpl' );
						
						Tools::redirectAdmin ( 'index.php?tab=AdminModules&conf=6&configure=' . $this->name . '&token=' . Tools::getAdminTokenLite ( 'AdminModules' ) );
					}
				}
			} elseif (isset ( $_FILES ['cms_address_icon'] ) && isset ( $_FILES ['cms_address_icon'] ['tmp_name'] ) && ! empty ( $_FILES ['cms_address_icon'] ['tmp_name'] )) {
				if (ImageManager::validateUpload ( $_FILES ['cms_address_icon'], 4000000 ))
					return $this->displayError ( $this->l ( 'Invalid image' ) );
				else {
					$ext = Tools::substr ( $_FILES ['cms_address_icon'] ['name'], Tools::strrpos ( $_FILES ['cms_address_icon'] ['name'], '.' ) + 1 );
					$file_name = md5 ( $_FILES ['cms_address_icon'] ['name'] ) . '.' . $ext;
					if (! move_uploaded_file ( $_FILES ['cms_address_icon'] ['tmp_name'], dirname ( __FILE__ ) . '/views/img/' . $file_name ))
						return $this->displayError ( $this->l ( 'An error occurred while attempting to upload the file.' ) );
					else {
						$file_path = dirname ( __FILE__ ) . '/views/img/' . Configuration::get ( 'cms_address_icon' );
						
						if (Configuration::hasContext ( 'cms_address_icon', null, Shop::getContext () ) && Configuration::get ( 'cms_address_icon' ) != $file_name && file_exists ( $file_path ))
							unlink ( $file_path );
						
						Configuration::updateValue ( 'cms_address_icon', $file_name );
						$this->_clearCache ( 'topfootercms.tpl' );
						
						Tools::redirectAdmin ( 'index.php?tab=AdminModules&conf=6&configure=' . $this->name . '&token=' . Tools::getAdminTokenLite ( 'AdminModules' ) );
					}
				}
			} elseif (isset ( $_FILES ['cms_shipping_icon'] ) && isset ( $_FILES ['cms_shipping_icon'] ['tmp_name'] ) && ! empty ( $_FILES ['cms_shipping_icon'] ['tmp_name'] )) {
				if (ImageManager::validateUpload ( $_FILES ['cms_shipping_icon'], 4000000 ))
					return $this->displayError ( $this->l ( 'Invalid image' ) );
				else {
					$ext = Tools::substr ( $_FILES ['cms_shipping_icon'] ['name'], Tools::strrpos ( $_FILES ['cms_shipping_icon'] ['name'], '.' ) + 1 );
					$file_name = md5 ( $_FILES ['cms_shipping_icon'] ['name'] ) . '.' . $ext;
					if (! move_uploaded_file ( $_FILES ['cms_shipping_icon'] ['tmp_name'], dirname ( __FILE__ ) . '/views/img/' . $file_name ))
						return $this->displayError ( $this->l ( 'An error occurred while attempting to upload the file.' ) );
					else {
						$file_path = dirname ( __FILE__ ) . '/views/img/' . Configuration::get ( 'cms_shipping_icon' );
						
						if (Configuration::hasContext ( 'cms_shipping_icon', null, Shop::getContext () ) && Configuration::get ( 'cms_shipping_icon' ) != $file_name && file_exists ( $file_path ))
							unlink ( $file_path );
						
						Configuration::updateValue ( 'cms_shipping_icon', $file_name );
						$this->_clearCache ( 'topfootercms.tpl' );
						
						Tools::redirectAdmin ( 'index.php?tab=AdminModules&conf=6&configure=' . $this->name . '&token=' . Tools::getAdminTokenLite ( 'AdminModules' ) );
					}
				}
			} elseif (isset ( $_FILES ['cms_payment_icon'] ) && isset ( $_FILES ['cms_payment_icon'] ['tmp_name'] ) && ! empty ( $_FILES ['cms_payment_icon'] ['tmp_name'] )) {
				if (ImageManager::validateUpload ( $_FILES ['cms_payment_icon'], 4000000 ))
					return $this->displayError ( $this->l ( 'Invalid image' ) );
				else {
					$ext = Tools::substr ( $_FILES ['cms_payment_icon'] ['name'], Tools::strrpos ( $_FILES ['cms_payment_icon'] ['name'], '.' ) + 1 );
					$file_name = md5 ( $_FILES ['cms_payment_icon'] ['name'] ) . '.' . $ext;
					if (! move_uploaded_file ( $_FILES ['cms_payment_icon'] ['tmp_name'], dirname ( __FILE__ ) . '/views/img/' . $file_name ))
						return $this->displayError ( $this->l ( 'An error occurred while attempting to upload the file.' ) );
					else {
						$file_path = dirname ( __FILE__ ) . '/views/img/' . Configuration::get ( 'cms_payment_icon' );
						
						if (Configuration::hasContext ( 'cms_payment_icon', null, Shop::getContext () ) && Configuration::get ( 'cms_payment_icon' ) != $file_name && file_exists ( $file_path ))
							unlink ( $file_path );
						
						Configuration::updateValue ( 'cms_payment_icon', $file_name );
						$this->_clearCache ( 'topfootercms.tpl' );
						
						Tools::redirectAdmin ( 'index.php?tab=AdminModules&conf=6&configure=' . $this->name . '&token=' . Tools::getAdminTokenLite ( 'AdminModules' ) );
					}
				}
			} else {
				Configuration::updateValue ( 'cms_shop_name', $cms_shop_name );
				Configuration::updateValue ( 'cms_address_name', $cms_address_name );
				Configuration::updateValue ( 'cms_shipping_name', $cms_shipping_name );
				Configuration::updateValue ( 'cms_payment_name', $cms_payment_name );
				Configuration::updateValue ( 'cms_shop_link', $cms_shop_link );
				Configuration::updateValue ( 'cms_shopaddress_link', $cms_shopaddress_link );
				Configuration::updateValue ( 'cms_shipping_link', $cms_shipping_link );
				Configuration::updateValue ( 'cms_payment_link', $cms_payment_link );
			}
			return $this->displayConfirmation ( $this->l ( 'The settings has been successfully updated !' ) );
			$this->_clearCache ( 'topfootercms.tpl' );
		}
	}
	public function getContent() {
		return $this->postProcess () . $this->__displayForm ();
	}
	public function __displayForm() {
		$defautl_lang = new Language ( ( int ) Configuration::get ( 'PS_LANG_DEFAULT' ) );
		
		$fields_form [0] ['form'] = array (
				'legend' => array (
						'title' => $this->l ( 'Settings' ),
						'icon' => 'icon-cogs' 
				),
				'description' => $this->l ( 'Your Shop name.' ),
				'input' => array (
						array (
								'type' => 'text',
								'label' => $this->l ( 'Title' ),
								'name' => 'cms_shop_name',
								'desc' => 'Your Title info.',
								'size' => 150,
								'required' => TRUE 
						),
						array (
								'type' => 'file',
								'label' => $this->l ( 'Your icon' ),
								'name' => 'cms_shop_icon',
								'desc' => $this->l ( 'Put your icon.' ),
								'thumb' => '../modules/' . $this->name . '/views/img/' . Configuration::get ( 'cms_shop_icon' ) 
						),
						array (
								'type' => 'text',
								'label' => 'Url / link',
								'name' => 'cms_shop_link',
								'desc' => 'Url / Link',
								'size' => 200,
								'required' => TRUE 
						) 
				),
				'submit' => array (
						'name' => 'cmsSubmit',
						'title' => $this->l ( 'Save' ) 
				) 
		);
		
		$fields_form [1] ['form'] = array (
				'description' => $this->l('Your shop address information!'),
				'input' => array (
						array (
								'type' => 'text',
								'label' => $this->l ( 'Title' ),
								'name' => 'cms_address_name',
								'desc' => 'Your title info.',
								'size' => 150,
								'required' => TRUE 
						),
						array (
								'type' => 'file',
								'label' => $this->l ( 'Your icon' ),
								'name' => 'cms_address_icon',
								'desc' => $this->l ( 'Put your icon.' ),
								'thumb' => '../modules/' . $this->name . '/views/img/' . Configuration::get ( 'cms_address_icon' ) 
						),
						array (
								'type' => 'text',
								'label' => 'Url / Link',
								'name' => 'cms_shopaddress_link',
								'desc' => 'Url / link',
								'size' => 200,
								'required' => TRUE 
						) 
				),
				'submit' => array (
						'name' => 'cmsSubmit',
						'title' => $this->l ( 'Save' ) 
				) 
		);
		
		$fields_form [2] ['form'] = array (
				'description' => $this->l('Your shipping carrier available!'),
				'input' => array (
						array (
								'type' => 'text',
								'label' => $this->l ( 'Title' ),
								'name' => 'cms_shipping_name',
								'desc' => 'Your title.',
								'size' => 150,
								'required' => TRUE 
						),
						array (
								'type' => 'file',
								'label' => $this->l ( 'Your icon' ),
								'name' => 'cms_shipping_icon',
								'desc' => $this->l ( 'Upload your icon.' ),
								'thumb' => '../modules/' . $this->name . '/views/img/' . Configuration::get ( 'cms_shipping_icon' ) 
						),
						array (
								'type' => 'text',
								'label' => 'Url / Link',
								'name' => 'cms_shipping_link',
								'desc' => 'Url / link',
								'size' => 200,
								'required' => TRUE 
						) 
				),
				'submit' => array (
						'name' => 'cmsSubmit',
						'title' => $this->l ( 'Save' ) 
				) 
		);

		
		$fields_form [3] ['form'] = array (
				'description' => $this->l('Your Payment gateways!'),
				'input' => array (
						array (
								'type' => 'text',
								'label' => $this->l ( 'Title' ),
								'name' => 'cms_payment_name',
								'desc' => 'Your Title.',
								'size' => 150,
								'required' => TRUE 
						),
						array (
								'type' => 'file',
								'label' => $this->l ( 'Your icon' ),
								'name' => 'cms_payment_icon',
								'desc' => $this->l ( 'Upload your icon.' ),
								'thumb' => '../modules/' . $this->name . '/views/img/' . Configuration::get ( 'cms_payment_icon' ) 
						),
						array (
								'type' => 'text',
								'label' => 'Url / Link',
								'name' => 'cms_payment_link',
								'desc' => 'Url / Link',
								'size' => 200,
								'required' => TRUE 
						) 
				),
				'submit' => array (
						'name' => 'cmsSubmit',
						'title' => $this->l ( 'Save' ) 
				) 
		);
		
		$helper = new HelperForm ();
		$this->fields_form = array ();
		
		// Module, token and currentIndex
		$helper->module = $this;
		$helper->name_controller = $this->name;
		$helper->token = Tools::getAdminTokenLite ( 'AdminModules' );
		$helper->currentIndex = AdminController::$currentIndex . '&configure=' . $this->name;
		
		// Language
		$helper->default_form_language = $default_lang->id;
		$helper->allow_employee_form_lang = Configuration::get ( 'PS_BO_ALLOW_EMPLOYEE_FORM_LANG' ) ? Configuration::get ( 'PS_BO_ALLOW_EMPLOYEE_FORM_LANG' ) : 0;
		// Title and toolbar
		$helper->identifier = $this->identifier;
		$helper->title = $this->displayName;
		$helper->show_toolbar = true; // false -> remove toolbar
		$helper->toolbar_scroll = true; // yes - > Toolbar is always visible on the top of the screen.
		$helper->submit_action = 'cmsSubmit' . $this->name;
		
		$helper->tpl_vars = array (
				'fields_value' => $this->getConfigFieldsValues (),
				'languages' => $this->context->controller->getLanguages (),
				'id_language' => $this->context->language->id 
		);
		return $helper->generateForm ( $fields_form );
	}
	public function getConfigFieldsValues() {
		return array(
				'cms_shop_name' => Tools::getValue ( 'cms_shop_name', Configuration::get ( 'cms_shop_name' ) ),
				'cms_address_name' => Tools::getValue ( 'cms_address_name', Configuration::get ( 'cms_address_name' ) ),
				'cms_shipping_name' => Tools::getValue ( 'cms_shipping_name', Configuration::get ( 'cms_shipping_name' ) ),
				'cms_payment_name' => Tools::getValue ( 'cms_payment_name', Configuration::get ( 'cms_payment_name' ) ),
				'cms_shop_icon' => Tools::getValue ( 'cms_shop_icon', Configuration::get ( 'cms_shop_icon' ) ),
				'cms_address_icon' => Tools::getValue ( 'cms_address_icon', Configuration::get ( 'cms_address_icon' ) ),
				'cms_shipping_icon' => Tools::getValue ( 'cms_shipping_icon', Configuration::get ( 'cms_shipping_icon' ) ),
				'cms_payment_icon' => Tools::getValue ( 'cms_payment_icon', Configuration::get ( 'cms_payment_icon' ) ),
				'cms_shop_link' => Tools::getValue ( 'cms_shop_link', Configuration::get ( 'cms_shop_link' ) ),
				'cms_shopaddress_link' => Tools::getValue ( 'cms_shopaddress_link', Configuration::get ( 'cms_shopaddress_link' ) ),
				'cms_shipping_link' => Tools::getValue ( 'cms_shipping_link', Configuration::get ( 'cms_shipping_link' ) ),
				'cms_payment_link' => Tools::getValue ( 'cms_payment_link', Configuration::get ( 'cms_payment_link' ) ),
		);
	}
	public function hookDisplayHome() {
		if (! $this->active)
			return;
		$this->context->smarty->assign ( array(
				'cms_shop_name' => Configuration::get ( 'cms_shop_name' ),
				'cms_address_name' => Configuration::get ( 'cms_address_name' ),
				'cms_shipping_name' => Configuration::get ( 'cms_shipping_name' ),
				'cms_payment_name' => Configuration::get ( 'cms_payment_name' ),
				'cms_shop_icon' => Configuration::get ( 'cms_shop_icon' ),
				'cms_shop_icon' => 'views/img/'.Configuration::get('cms_shop_icon'),
				'cms_address_icon' => Configuration::get ( 'cms_address_icon' ),
				'cms_address_icon' => 'views/img/'.Configuration::get('cms_address_icon'),
				'cms_shipping_icon' => Configuration::get ( 'cms_shipping_icon' ),
				'cms_shipping_icon' => 'views/img/'.Configuration::get('cms_shipping_icon'),
				'cms_payment_icon' => Configuration::get ( 'cms_payment_icon' ),
				'cms_payment_icon' => 'views/img/'.Configuration::get('cms_payment_icon'),
				'cms_shop_link' => Configuration::get ( 'cms_shop_link' ),
				'cms_shopaddress_link' => Configuration::get ( 'cms_shopaddress_link' ),
				'cms_shipping_link' => Configuration::get ( 'cms_shipping_link' ),
				'cms_payment_link' => Configuration::get ( 'cms_payment_link' ),
				
				'blockcmslink' => $this->context->link->getModuleLink ( 'topfootercms', 'display' ) 
		) );
		return $this->display ( __FILE__, 'topfootercms.tpl' );
	}
	public function hookDisplayHeader() {
		$this->context->controller->addCSS ( $this->_path . '/css/topfootercms.css', 'all' );
	}
	protected function getCacheId() {
		if ($name === NULL) {
			$name = 'topfootercms';
			return parent::getCacheId ( $name . '|' . date ( 'Ymd' ) );
		}
	}
	public function _clearCache($template, $cache_id = NULL, $compile_id = NULL) {
		parent::_clearCache ( 'topfootercms.tpl' );
	}
}

?>