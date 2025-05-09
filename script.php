<?php

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Installer\InstallerScript;
use Joomla\CMS\Installer\Adapter\ComponentAdapter;
use Joomla\CMS\Language\Text;

class Com_TimelineInstallerScript extends InstallerScript
{
    /**
     * Minimum Joomla version required to install this component.
     *
     * @var string
     */
    // public string $minimumJoomla = '5.0'; // Descomentar si quieres forzar una versión mínima de Joomla

    /**
     * Minimum PHP version required to install this component.
     *
     * @var string
     */
    // public string $minimumPhp = '8.1'; // Descomentar y ajustar a 8.3 si lo deseas estrictamente

    /**
     * Called before any type of action (install, update or discover_install).
     *
     * @param   string            $type    The type of change (install, update or discover_install)
     * @param   ComponentAdapter  $parent  Parent object calling object.
     *
     * @return  boolean  True on success
     */
    public function preflight($type, $parent): bool
    {
        // Ejemplo de verificación de versión de PHP (puedes añadir la de Joomla también)
        /*
        if (version_compare(PHP_VERSION, $this->minimumPhp, '<')) {
            Text::script('JLIB_INSTALLER_ABORT_PHP_VERSION_MINIMUM'); // Carga el string de idioma de Joomla
            Factory::getApplication()->enqueueMessage(
                Text::sprintf('COM_TIMELINE_ERROR_PHP_VERSION_REQUIRED', $this->minimumPhp, PHP_VERSION),
                'error'
            );
            return false;
        }
        */
        Factory::getApplication()->enqueueMessage(Text::sprintf('COM_TIMELINE_PREFLIGHT_MESSAGE', $type), 'message');
        return true;
    }

    /**
     * Called after the extension is installed.
     *
     * @param   ComponentAdapter  $parent  Parent object calling object.
     *
     * @return  boolean  True on success
     */
    public function install($parent): bool
    {
        Factory::getApplication()->enqueueMessage(Text::_('COM_TIMELINE_INSTALL_SUCCESS_MESSAGE'), 'message');
        // $parent->getParent()->setRedirectURL('index.php?option=com_timeline'); // Obsoleto
        return true;
    }

    /**
     * Called after the extension is updated.
     *
     * @param   ComponentAdapter  $parent  Parent object calling object.
     *
     * @return  boolean  True on success
     */
    public function update($parent): bool
    {
        Factory::getApplication()->enqueueMessage(Text::sprintf('COM_TIMELINE_UPDATE_SUCCESS_MESSAGE', $parent->getManifest()->version), 'message');
        return true;
    }

    /**
     * Called before the extension is uninstalled.
     *
     * @param   ComponentAdapter  $parent  Parent object calling object.
     *
     * @return  boolean  True on success
     */
    public function uninstall($parent): bool
    {
        Factory::getApplication()->enqueueMessage(Text::_('COM_TIMELINE_UNINSTALL_SUCCESS_MESSAGE'), 'message');
        return true;
    }

    /**
     * Called after any type of action (install, update or discover_install).
     *
     * @param   string            $type    The type of change (install, update or discover_install)
     * @param   ComponentAdapter  $parent  Parent object calling object.
     * @param   array|null        $results Results of the SQL actions.
     *
     * @return  boolean  True on success
     */
    public function postflight($type, $parent, $results = null): bool
    {
        // Ejemplo de redirección después de instalar si es necesario
        // if ($type === 'install') {
        //    $app = Factory::getApplication();
        //    if ($app->isClient('administrator')) {
        //        $app->redirect('index.php?option=com_timeline', Text::_('COM_TIMELINE_REDIRECT_AFTER_INSTALL_MESSAGE'));
        //    }
        // }
        Factory::getApplication()->enqueueMessage(Text::sprintf('COM_TIMELINE_POSTFLIGHT_MESSAGE', $type), 'message');
        return true;
    }
}
