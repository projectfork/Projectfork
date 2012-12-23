<?php
/**
* @package      Projectfork
* @subpackage   Dashboard
*
* @author       Tobias Kuhn (eaxs)
* @copyright    Copyright (C) 2006-2012 Tobias Kuhn. All rights reserved.
* @license      http://www.gnu.org/licenses/gpl.html GNU/GPL, see LICENSE.txt
**/

defined('_JEXEC') or die();


$modules = &$this->modules;
$pfv     = new PFVersion();
$jv      = new JVersion();
?>
<div class="adminform row-fluid">
    <div class="cpanel-left span9 hidden-phone">
        <div class="cpanel row-fluid">

            <?php foreach ($this->buttons AS $component => $buttons) : ?>
                <?php if (PFApplicationHelper::enabled($component)) : ?>
                    <?php foreach ($buttons AS $button) : ?>
                        <div class="icon-wrapper span2" style="height: 75px; margin: 0 10px 10px 0;">
                            <div class="icon">
                                <a href="<?php echo $button['link']; ?>" class="thumbnail btn">
                                    <?php echo $button['icon']; ?>
                                    <span class="small"><?php echo JText::_($button['title']);?></span>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endforeach; ?>

            <?php if ($this->user->authorise('core.admin')) : ?>
            <div class="icon-wrapper span2" style="height: 75px; margin: 0 10px 10px 0;">
                <div class="icon">
                    <?php if (version_compare(JVERSION, '3.0.0', 'ge')) : ?>
                        <a class="thumbnail btn" href="<?php echo JRoute::_('index.php?option=com_config&view=component&component=com_projectfork');?>">
                            <?php echo JHtml::image('com_projectfork/projectfork/header/icon-48-config.png', JText::_('COM_PROJECTFORK_DASHBOARD_CONFIG'), null, true); ?>
                            <span class="small"><?php echo JText::_('COM_PROJECTFORK_DASHBOARD_CONFIG');?></span>
                        </a>
                    <?php else : ?>
                        <a class="modal thumbnail btn" rel="{handler: 'iframe', size: {x: 875, y: 550}, onClose: function() {}}" href="<?php echo JRoute::_('index.php?option=com_config&view=component&component=com_projectfork&tmpl=component');?>">
                            <?php echo JHtml::image('com_projectfork/projectfork/header/icon-48-config.png', JText::_('COM_PROJECTFORK_DASHBOARD_CONFIG'), null, true); ?>
                            <span><?php echo JText::_('COM_PROJECTFORK_DASHBOARD_CONFIG');?></span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="clr clearfix"></div>
            <?php echo $modules->render('pf-dashboard-top', array('style' => 'xhtml'), null); ?>
        </div>
        <div class="row-fluid">
        	<div class="span12">
        		<?php echo $modules->render('pf-dashboard-left', array('style' => 'xhtml'), null); ?>
        	</div>
        </div>
    </div>
    <div class="cpanel-right span3 width-40">
        <div class="well well-small">
            <h4>Projectfork 4 Beta</h4>
            <p>Consider this a preview-only version of Projectfork. We highly recommend against using in a production environment as there may be many bugs. </p>
            <p>
                <a href="https://github.com/projectfork/Projectfork/issues" class="btn btn-small" target="_blank">
                    <i aria-hidden="true" class="icon-warning"></i> Report an issue on Github*
                </a>
            </p>
            <small>* Please be sure to include the following information:</small>
            <ul>
                <li><small>Joomla Version: <?php echo JVERSION; ?> <?php echo $jv->DEV_STATUS;?></small></li>
                <li><small>Projectfork Version: <?php echo PFVERSION; ?> <?php echo $pfv->DEV_STATUS;?></small></li>
                <li><small>PHP Version: <?php echo phpversion(); ?></small></li>
            </ul>
        </div>
        <?php echo $modules->render('pf-dashboard-right', array('style' => 'xhtml'), null); ?>
    </div>
</div>
