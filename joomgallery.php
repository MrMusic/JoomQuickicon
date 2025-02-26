<?php
/******************************************************************************\
**   JoomGallery Plugin 'JoomQuickicon'                                       **
**   Copyright (C) 2012 - 2024 JoomGallery::ProjectTeam                       **
**   Copyright (C) 2025        MrMusic                                        **
**   Released under GNU GPL Public License                                    **
**   License: http://www.gnu.org/copyleft/gpl.html                            **
\******************************************************************************/

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Plugin\CMSPlugin;

/**
 * Joomgallery Plugin 'JoomQuickicon'
 *
 * This plugin integrates a JoomGallery icon into the control panel of the back end.
 *
 * @package     JoomGallery
 * @since       2.0
 */
class plgQuickiconJoomGallery extends CMSPlugin
{
  /**
   * Constructor
   *
   * @param       object  $subject The object to observe
   * @param       array   $config  An array that holds the plugin configuration
   *
   * @since       2.0
   */
  public function __construct(&$subject, $config)
  {
    parent::__construct($subject, $config);
    $this->loadLanguage();
  }

  /**
   * Returns an icon definition for a JoomGallery icon.
   *
   * @param  $context The calling context
   * @return array    A list of icon definition associative arrays, consisting of the keys link, image, text and access.
   * @since  2.0
   */
  public function onGetIcons($context)
  {
    // Check wether JoomGallery is installed
    $file = JPATH_ROOT.'/administrator/components/com_joomgallery/includes/defines.php';
    if(file_exists($file))
    {
      require_once $file;
    }
    else
    {
      return;
    }

    if($context == trim($this->params->get('cfg_context', 'mod_quickicon')) && Factory::getUser()->authorise('core.manage', _JOOM_OPTION))
    {
      return array(array(
                          'link'  => 'index.php?option='._JOOM_OPTION.'&view=control',
                          'image' => 'icon-image',
                          'text'  => Text::_('PLG_QUICKICON_JOOMGALLERY_TXT'),
                          'id'    => 'plg_quickicon_joomgallery'
                        )
                  );
    }
    else
    {
      return;
    }
  }
}