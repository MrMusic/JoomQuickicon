<?php
/******************************************************************************\
**   JoomGallery Plugin 'JoomQuickicon'                                       **
**   By: JoomGallery::ProjectTeam                                             **
**   Copyright (C) 2012 - 2024 JoomGallery::ProjectTeam                       **
**   Released under GNU GPL Public License                                    **
**   License: http://www.gnu.org/copyleft/gpl.html                            **
\******************************************************************************/

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;

/**
 * Installer class for the JoomGallery Plugin 'JoomQuickicon'
 *
 * @package     JoomGallery
 * @since       2.0
 */
class plgQuickiconJoomGalleryInstallerScript
{
  function install()
  { 
     // Automatically enable the plugin during installation
    $app = Factory::getApplication();
    $db = Factory::getDbo();
    
    $query = $db->getQuery(true)
          ->update('#__extensions')
          ->set('enabled = 1')
          ->where("type = 'plugin'")
          ->where("element = 'joomgallery'")
          ->where("folder = 'quickicon'");
     
    $db->setQuery($query);
    $db->execute();
     
    echo '<p class="alert alert-info">'. Text::_('PLG_QUICKICON_PLUGIN_ENABLED') .'</p>'; 
  }
}