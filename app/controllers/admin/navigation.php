<?php

namespace app\controllers\admin;

use app\config;
use \core\view;

/**
 * Navigation controller
 *
 * PHP version 7.0
 */
class navigation extends \core\controller
{
  /**
   * Shows all navigations
   *
   * @return void
   */
  public function indexAction() {
    $navigation = new \app\models\navigation();
    if ($this->route_params['navigations'] = $navigation::getNavigations()) {
      view::renderTemplate(config::DEFAULT_TEMPLATE, $this->route_params['controller'].'/'.$this->route_params['action'], $this->route_params);
    } else {
      $this->errorAction();
    }
  }

  /**
   * Edits a navigation items
   *
   * @return void
   */
  public function editAction() {

    if ( isset($this->route_params['request']) ) {
      $navigation = new \app\models\navigation();
      // If the delete form is submitted
      if (isset($_POST["deleteItem"])) {
        $this->route_params['deleteItem'] = $_POST["deleteItem"];
        view::renderTemplate(config::DEFAULT_TEMPLATE, 'navigation/delete', $this->route_params);
      }
      // If the add form is submitted
      if (isset($_POST["add_page"]) && !empty($_POST["add_page"])) {
        $this->route_params['addItem'] = $navigation::addNavigationItem($this->route_params['request'], $_POST["add_page"]);
      }
      // If the save form is submitted
      if (isset($_POST["save"])) {
        $this->route_params['navi'] = $navigation::getNavigationItems($this->route_params['request']);
        foreach ($this->route_params['navi'] as $key => $value) {
          if ($value['position'] != $_POST[$value['navi_id']]['position']) {
            $navigation::updateNavigationItem('position', $value['navi_id'], $_POST[$value['navi_id']]['position']);
          }
          if ($value['parent'] != $_POST[$value['navi_id']]['parent']) {
            $navigation::updateNavigationItem('parent', $value['navi_id'], $_POST[$value['navi_id']]['parent']);
          }
          if ($value['child_position'] != $_POST[$value['navi_id']]['child_position']) {
            $navigation::updateNavigationItem('child_position', $value['navi_id'], $_POST[$value['navi_id']]['child_position']);
          }
        }
      }
      if ($this->route_params['navi'] = $navigation::getNavigationItems($this->route_params['request'])) {
        if ($this->route_params['pages'] = $page::getPages()) {
          view::renderTemplate(config::DEFAULT_TEMPLATE, $this->route_params['controller'].'/'.$this->route_params['action'], $this->route_params);
        }
      } else {
        $this->errorAction();
      }
    }
  }

  /**
   * Deletes a navigation item
   *
   * @return void
   */
  public function deleteAction() {

    // If the delete form is submitted
    if (isset($_POST["delete"])) {
      $navigation = new \app\models\navigation();
      if ($this->route_params['delNavItem'] = $navigation::deleteNavigationItem($_POST["delete"])) {
        header("Location: ".config::ROOT_APP_DIR."navigation/edit/".$this->route_params['request']);
      } else {
        $this->errorAction();
      }
    } else if (isset($this->route_params['request'])) {
      view::renderTemplate(config::DEFAULT_TEMPLATE, 'navigation/delete', $this->route_params);
    }
  }
}
